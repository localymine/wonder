<?php
/**
 * provides functions to parse and set query parameters to Paginator.
 */
namespace General\Core\Util;

use General\Core\Manager\Models\Invoice;
use General\Core\Manager\Models\ProductQuantity;
use General\Core\Manager\Models\TransportInvoice;
use General\Core\Manager\Models\Warehouse;
use Phalcon\Db\Column;
use Phalcon\Di as DependencyInjector;
use Phalcon\Mvc\User\Component;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;
use Phalcon\Mvc\ControllerInterface;
use General\Core\Manager\Components\Helper;
use General\Core\Manager\Models\Client;
use General\Core\Manager\Models\Country;

/**
 * parses query string and filters result of pagination.
 * クエリパラメータを解析し、一覧表示の結果を絞り込んで表示する
 *
 * @package Coolrevo\Smc\Util
 */
class FilterInjector extends Component
{

  /**
   * manipulate query conditions.
   * クエリ条件を操作する
   *
   * add a field name / parameter that matches the filter
   * which cannot be resolved with Criteria::fromInput.
   *
   * Criteria::fromInputだけでは解決できない、フィルタに合致する
   * フィールド名・パラメータを追加する。
   *
   * returns false if illegal condition was built.
   * 不正な検索条件がビルドされた場合は偽を返す。
   *
   * @param DependencyInjector $di        Di instance. DIコンテナ
   * @param string             $ModelName model name to paginate. 検索対象のModel
   * @param array              $posts     query/post params. queryまたはPOSTされたパラメータ
   * @return Criteria|bool
   */
  public static function applyFilter(DependencyInjector $di, $ModelName, $posts = [])
  {
    /* if $_SESSION['auth'] not found, returns false. */
    $identity = $di->get('auth')->getIdentity();
    if (!$identity) {
      return false;
    }

    /* create fully qualified class name. */
    $Model = 'General\Core\Manager\Models\\'.$ModelName;
    /* create Model instance. */
    /** @var \General\Core\Manager\Models\ModelInterface $instance */
    $instance = new $Model;
    /** @var \Phalcon\Mvc\Model\Metadata\Memory $metadata */
    $metadata = $di->getShared('modelsMetadata');
    $dataType = $metadata->getDataTypes($instance);
    $colmap   = $instance->columnMap();

    /* initialize query condition. */
    $criteria = new Criteria();
    $criteria->setModelName($Model);
    /* translate parameters to PHQL(Phalcon Query Language). */
    $namedparams = [];
    foreach ($posts as $key => $val) {
      $cond = '';
      $bind = null;
      if ('_url' !== $key && 'page' !== $key && 'limit' !== $key) {
        if (in_array($key, $colmap)) {
          $namedparams[$Model.'.'.$key] = $val;
          if ((Column::TYPE_VARCHAR == $dataType[$key])
          ||  (Column::TYPE_CHAR    == $dataType[$key])
          ||  (Column::TYPE_TEXT    == $dataType[$key])) {
            $cond = '['.$Model."].$key LIKE :$key:";
            $bind = [$key => '%'.$val.'%'];
          } else {
          }
        }
        if (0 < strlen($cond)) {
          if (0 < count($namedparams)) {
            $criteria->andWhere($cond, $bind);
          } else {
            $criteria->where($cond, $bind);
          }
          if ($key == 'status') {
            $criteria->andWhere('['.$Model.'].disabled=:disabled:', ['disabled' => 0]);
          }
        }
      }
    }
    /* add relationships that requires select/sort in SQL.
     * ソート・検索に必要なリレーションの追加 */
    $alias = strtolower($ModelName);
    switch ($alias) {
      case 'client':
        $criteria->leftJoin(Country::class, '['.$Model.'].country_id=[Country].id ', 'Country');
        break;
      case 'transport':
//        $criteria->leftJoin(Client::class, '['.$Model.'].client_id=[Client].id', 'Client');
//        $criteria->leftJoin(TransportInvoice::class, '['.$Model.'].id=[TransportInvoice].transport_id ', 'TransportInvoice');
        break;
      default:
        break;
    }

    if (isset($posts['target'])) {
      $t = '([Client].name LIKE :freea: ';
      $c = '%'.trim($posts['target']).'%';
      $criteria->andWhere($t,
        ['freea' => $c]
      );
    }

    /* filter by user roles.
     * 権限により、検索可能範囲を限定する */
    if (1 == $identity['role_id']) {
      /* privileged administrator is not restricted.
       * 特権管理者は制限しない */
    } else if (2 == $identity['role_id']) {
      /* anonymous user is restricted all requests.
       * 匿名ユーザは拒否 */
      return false;
    } else if (3 == $identity['role_id']) {
      /* bussiness owner is not restricted.
       * 事業者は制限しない */
    } else if (4 == $identity['role_id']) {
      /* servicers can display only their own data.
       * サービサは自身に紐づくデータのみ */
      switch ($alias) {
        case 'client':
        case 'invoice':
        case 'transport':
          $criteria->andWhere('['.$Model.'].user_id=:user_id:',
            ['user_id' => $identity['id']]
          );
          break;
        case 'product':
          break;
        default:
          return false;
          break;
      }
    } else if (5 == $identity['role_id']) {
      /* end users can display only data related to their own group/lower group.
       * 視聴ユーザは自グループ・下位グループに紐づくデータのみ */
      switch ($alias) {
        case 'client':
          break;
        default:
          return false;
          break;
      }
    }

    /* sort order */
    $orderby   = '['.$Model.'].id';
    $direction = 'ASC';
    if (isset($posts['order'])) {
      if (isset($posts['direction'])) {
        if (0 == strcmp(strtoupper($posts['direction']), 'DESC')) {
          $direction = strtoupper($posts['direction']);
        }
      }
      switch ($posts['order']) {
        case 'country_id':
          $orderby = '[Country].id';
          break;
        default:
          break;
      }
    }

    $criteria->orderBy("$orderby $direction");
//    print_r($criteria);exit;
    return $criteria;
  }


  /**
   * prepare filter form for pagination.
   * フィルタ用フォームを準備する
   *
   * prepare filters according to the model,
   * and add the form default value when query/post parameters exist.
   *
   * モデルに応じた絞り込みフィルタを準備し、queryやPOSTパラメータが
   * 存在したらフォームデフォルト値として追加する。
   *
   * @param DependencyInjector  $di         Di instance. DIコンテナ
   * @param ControllerInterface $controller Controller to be paginated. ページャを表示するコントローラ
   * @param string              $ModelName  model name to paginate. 検索対象のModel
   * @param array               $posts      query/post params. queryまたはPOSTされたパラメータ
   */
  public static function buildFilterForm(DependencyInjector $di,
                                         ControllerInterface $controller,
                                         $ModelName,
                                         $posts = [])
  {

    /* if $_SESSION['auth'] not found, returns false.
     * session情報がない場合は偽 */
    $identity = $di->get('auth')->getIdentity();
    if (!$identity) {
      return;
    }
    /* remove unnecessary elements.
     * フォームに不要な要素を除去 */
    if (isset($posts['_url'])) {
      unset($posts['_url']);
    }
    /* set form elements.
     * フォーム要素を設定 */
    $alias = strtolower($ModelName);
    switch ($alias) {
      case 'agentbox':
      case 'wondergate':
      case 'camera':
      case 'campaign':
      case 'recorder':
      case 'livemonitor':
        $cond1 = [
          'conditions' => 'layer=:layer:',
          'bind' => ['layer' => 1],
          'order' => 'name ASC',
        ];
        $cond2 = [
          'conditions' => 'layer=:layer:',
          'bind' => ['layer' => 2],
          'order' => 'name ASC',
        ];
        $cond3 = [
          'conditions' => 'layer=:layer:',
          'bind' => ['layer' => 3],
          'order' => 'name ASC',
        ];
        $layer1 = [];
        $layer2 = [];
        $layer3 = [];

        if (1 == $identity['role_id']
        ||  3 == $identity['role_id']) {

          if (isset($posts['group_id'])) {
            $cond2['conditions'] .= ' AND parent_id=:parent_id:';
            $cond2['bind']['parent_id'] = $posts['area_id'];

            if (!isset($posts['area_id'])) {
              $g3 = Group::findFirst(['id='.$posts['group_id']]);
              if ($g3 && $g3->user_id == $identity['id']) {
                $posts['area_id'] = $g3->parent_id;
              }
            }
          }
          if (isset($posts['area_id'])) {
            $cond3['conditions'] .= ' AND parent_id=:parent_id:';
            $cond3['bind']['parent_id'] = $posts['area_id'];

            if (!isset($posts['root_id'])) {
              $g2 = Group::findFirst(['id='.$posts['area_id']]);
              if ($g2 && $g2->user_id == $identity['id']) {
                $posts['root_id'] = $g2->parent_id;
              }
            }
          }
          if (isset($posts['root_id'])) {
            $cond2['conditions'] .= ' AND parent_id=:parent_id:';
            $cond2['bind']['parent_id'] = $posts['root_id'];
          }
          $layer1 = Group::find($cond1);
          $layer2 = Group::find($cond2);
          $layer3 = Group::find($cond3);

        } else if (4 == $identity['role_id']) {

          $cond3['conditions'] .= ' AND user_id=:user_id:';
          $cond3['bind']['user_id'] = $identity['id'];
          if (isset($posts['group_id'])) {
            if (!isset($posts['area_id'])) {
              $g3 = Group::findFirst(['id='.$posts['group_id']]);
              if ($g3 && $g3->user_id == $identity['id']) {
                $posts['area_id'] = $g3->parent_id;
              }
            }
          }

          $cond2['conditions'] .= ' AND user_id=:user_id:';
          $cond2['bind']['user_id'] = $identity['id'];
          if (isset($posts['area_id'])) {
            $cond3['conditions'] .= ' AND parent_id=:parent_id:';
            $cond3['bind']['parent_id'] = $posts['area_id'];
            if (!isset($posts['root_id'])) {
              $g2 = Group::findFirst(['id='.$posts['area_id']]);
              if ($g2 && $g2->user_id == $identity['id']) {
                $posts['root_id'] = $g2->parent_id;
              }
            }
          }

          $cond1['conditions'] .= ' AND user_id=:user_id:';
          $cond1['bind']['user_id'] = $identity['id'];
          if (isset($posts['root_id'])) {
            $cond2['conditions'] .= ' AND parent_id=:parent_id:';
            $cond2['bind']['parent_id'] = $posts['root_id'];
          }

          $layer1 = Group::find($cond1);
          $layer2 = Group::find($cond2);
          $layer3 = Group::find($cond3);

        } else if (5 == $identity['role_id']) {

          switch ($identity['layer']) {
            case 3:
              $cond3['conditions'] .= ' AND id=:id:';
              $cond3['bind']['id'] = $identity['id'];
              $mygrp = Group::findFirst($cond3);
              /** @var Group $myparent */
              $myparent = $mygrp->getRelated('parent');
              $cond2['conditions'] .= ' AND parent_id=:parent_id:';
              $cond2['bind']['parent_id'] = $myparent->id;
              $cond1['conditions'] .= ' AND parent_id=:parent_id:';
              $cond1['bind']['parent_id'] = $myparent->parent_id;
              $layer1 = Group::find($cond1);
              $layer2 = Group::find($cond2);
              $layer3 = Group::find($cond3);
              break;
            case 2:
              $cond2['conditions'] .= ' AND id=:id:';
              $cond2['bind']['id'] = $identity['id'];
              $mygrp = Group::findFirst($cond2);
              $layer1 = Group::find($cond2);
              $layer2 = $mygrp->getRelated('children');
              $layer3 = $mygrp->getRelated('parent');
              break;
            case 1:
              $cond1['conditions'] .= ' AND id=:id:';
              $cond1['bind']['id'] = $identity['id'];
              $mygrp = Group::findFirst($cond1);
              $layer1 = Group::find($cond1);
              $layer2 = $mygrp->getRelated('children');
              $gchild = [];
              foreach ($layer2 as $grp) {
                $gchild[] = $grp->id;
              }
              $cond3['conditions'] .= ' AND parent_id IN (:parent_ids:)';
              $cond3['bind']['parent_ids'] = implode(',', $gchild);
              $layer3 = Group::find($cond3);
              break;
            default:
              break;
          }

        }
        $controller->{'view'}->setVar('layer1', $layer1);
        $controller->{'view'}->setVar('layer2', $layer2);
        $controller->{'view'}->setVar('layer3', $layer3);
        break;
      case 'member':
        break;
      case 'membergroup':
      default:
        break;
    }
    $controller->{'tag'}->setDefaults($posts);
  }

  public static function getInvoiceNotInTransportInvoice(DependencyInjector $di, $client_id)
  {
    /* if $_SESSION['auth'] not found, returns false.
     * session情報がない場合は偽 */
    $identity = $di->get('auth')->getIdentity();
    if (!$identity) {
      return;
    }

    /* create fully qualified class name. */
    $Model = 'General\Core\Manager\Models\Invoice';
    /* create Model instance. */
    /** @var \General\Core\Manager\Models\ModelInterface $instance */
    $instance = new $Model;
    /** @var \Phalcon\Mvc\Model\Metadata\Memory $metadata */
    $metadata = $di->getShared('modelsMetadata');
    $dataType = $metadata->getDataTypes($instance);
    $colmap   = $instance->columnMap();

    /* initialize query condition. */
    $criteria = new Criteria();
    $criteria->setModelName($Model);

    $criteria->leftJoin(TransportInvoice::class, '['.$Model.'].id=[TransportInvoice].invoice_id', 'TransportInvoice');

    $criteria->andWhere('['.$Model.'].disabled=:disabled:', ['disabled' => 0]);
    $criteria->andWhere('['.$Model.'].user_id=:user_id:', ['user_id' => $identity['id']]);
    $criteria->andWhere('['.$Model.'].client_id=:client_id:', ['client_id' => $client_id]);
    $criteria->andWhere('[TransportInvoice].invoice_id IS NULL');

    return $criteria;
  }

  public function getInvoiceNotInTransportInvoiceAndSelectedInvoice(DependencyInjector $di, $client_id, $transport_id){
    /* if $_SESSION['auth'] not found, returns false.
     * session情報がない場合は偽 */
    $identity = $di->get('auth')->getIdentity();
    if (!$identity) {
      return;
    }

    $user_id = $identity['id'];

//    $sql  = " SELECT *, 'id1' as OrderKey ";
    $sql  = " SELECT iv.id, user_id, client_id, name, price, status, disabled ";
    $sql .= " FROM invoices as iv ";
    $sql .= " LEFT JOIN transport_invoices as ti ON ti.invoice_id = iv.id ";
    $sql .= " WHERE ";
    $sql .= "    iv.disabled = 0 AND ";
    $sql .= "    iv.user_id = $user_id AND ";
    $sql .= "    iv.client_id = $client_id AND ";
    $sql .= "    ti.invoice_id IS NULL ";
    $sql .= " UNION ALL ";
//    $sql .= " SELECT *, 'id2' as OrderKey ";
    $sql .= " SELECT iv.id, user_id, client_id, name, price, status, disabled ";
    $sql .= " FROM invoices as iv ";
    $sql .= " LEFT JOIN transport_invoices as ti ON ti.invoice_id = iv.id ";
    $sql .= " WHERE ";
    $sql .= "    iv.client_id = $client_id AND ";
    $sql .= "    ti.transport_id = $transport_id ";
//    $sql .= " ORDER BY OrderKey ";

    $invoice = new Invoice();
    return new Resultset(
      null,
      $invoice,
      $invoice->getReadConnection()->query($sql)
    );
  }


  public static function getProductsByKeyword(DependencyInjector $di, $keyword, $warehouse='') {
    /* if $_SESSION['auth'] not found, returns false.
     * session情報がない場合は偽 */
    $identity = $di->get('auth')->getIdentity();
    if (!$identity) {
      return false;
    }

    $user_id = $identity['id'];

    /* create fully qualified class name. */
    $Model = 'General\Core\Manager\Models\Product';
    /* create Model instance. */
    /** @var \General\Core\Manager\Models\ModelInterface $instance */
    $instance = new $Model;
    /** @var \Phalcon\Mvc\Model\Metadata\Memory $metadata */
    $metadata = $di->getShared('modelsMetadata');
    $dataType = $metadata->getDataTypes($instance);

    /* initialize query condition. */
    $criteria = new Criteria();
    $criteria->setModelName($Model);

    $criteria->leftJoin(ProductQuantity::class, '['.$Model.'].id=[PQ].product_id ', 'PQ');
    $criteria->leftJoin(Warehouse::class, '[WH].id=[PQ].warehouse_id ', 'WH');

    if ($warehouse != '') {
      $criteria->andWhere('[PQ].warehouse_id=:warehouse_id:', [
        'warehouse_id'  => $warehouse
      ]);
    }

    $criteria->andWhere('['.$Model.'].user_id=:user_id:', ['user_id' => $user_id]);
    $criteria->andWhere('['.$Model.'].disabled=:disabled:', ['disabled' => 0]);

    $t = '['.$Model.'].name LIKE :keyword: OR ['.$Model.'].remarks LIKE :keyword:';
    $c = '%'.trim($keyword).'%';
    $criteria->andWhere($t,
      ['keyword' => $c]
    );

    $criteria->columns(
      [
        '['.$Model.'].id',
        '['.$Model.'].name',
        'price',
        'image',
        '['.$Model.'].quantity as qty',
        '[PQ].quantity',
        '[PQ].warehouse_id',
        '[WH].name as warehouse',
      ]
    );

    return $criteria->execute();
  }

}
