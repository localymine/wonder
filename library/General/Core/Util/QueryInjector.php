<?php
/**
 * provides functions to search, edit and delete more safely referring to $_SESSION.
 * セッションを参照してより安全にデータ検索、編集、削除する機能を提供する
 */
namespace General\Core\Util;

use Phalcon\Mvc\User\Component;
use General\Core\Manager\Models\Client;


/**
 * refer to $_SESSION to narrow down the data to manipulate.
 * セッションを参照して操作対象データを絞り込む
 *
 * @package Coolrevo\Smc\Util
 */
class QueryInjector extends Component
{

  /**
   * manipulate query conditions.
   * クエリ条件を操作する
   *
   * further narrow down the data that users can view based by referring to $_SESSION.
   * セッション情報をもとにサイン・イン中のユーザが表示可能なデータを更に絞る。
   *
   * returns false if illegal condition was built.
   * 不正な検索条件がビルドされた場合は偽を返す。
   *
   * @param string            $model      Model name to find. 検索対象のモデル名
   * @param array|string|null $conditions query conditions. 検索条件
   * @return array|bool
   */
  public function inject($model = '', $conditions = null)
  {
    /* if $_SESSION['auth'] not found, returns false.
     * session情報がない場合は偽 */
    $identity = $this->getDI()->get('auth')->getIdentity();
    if (!$identity) {
      return false;
    }
    /* initialize query condition.
     * 検索条件の初期化 */
    $cond = [];
    if (is_null($conditions)) {
      $cond['conditions'] = '';
    } else {
      /* if conditions contains only string, convert to array.
       * 条件が文字列のみの場合は配列に変換 */
      if (is_string($conditions) && 0 != strlen($conditions)) {
        $cond['conditions'] = $conditions;
      } else {
        $reserved = [
          'conditions','columns','bind','bindTypes',
          'order','limit','group','for_update',
          'shared_lock','cache','hydration'
        ];
        /* if conditions has reserved key, add it.
         * 予約されたキー名を持つものを追加 */
        foreach ($reserved as $key) {
          if (array_key_exists($key, $conditions)) {
            $cond[$key] = $conditions[$key];
          }
        }
        /* index zero is always 'sql condition' string.
         * 添番0は検索条件 */
        if (isset($conditions[0]) && is_string($conditions[0])) {
          $cond['conditions'] = $conditions[0];
        }
      }
      /* if nothing in conditions, add empty string.
       * 条件が空の場合は空で追加 */
      if (!isset($cond['conditions'])) {
        $cond['conditions'] = '';
      }
    }

    /* if something in conditions, concatenate the value with 'AND'.
     * 検索条件になにかの値があればANDで繋ぐ */
    $glue = (strlen($cond['conditions']) > 0 ? ' AND ' : '');

    /* initialize bind parameters.
     * bindパラメータの初期化 */
    if (!isset($cond['bind'])) {
      $cond['bind'] = [];
    }

    if (1 == $identity['role_id']) {
      /* privileged administrators
       * 特権管理者 */
      if (strtolower($model) == 'user') {
        if (preg_match('/id=:id:/', $cond['conditions'])) {
          if ($cond['bind']['id'] != $identity['id']) {
            $cond['conditions'] .= $glue.'id!=:notid:';
            $cond['bind']['notid'] = $identity['id'];
          }
        }
      } else {
        if (preg_match('/user_id=:user_id:/', $cond['conditions'])) {
          $cond['conditions'] = preg_replace('/user_id=:user_id:/', '', $cond['conditions']);
          unset($cond['bind']['user_id']);
        }
      }
    } else if (2 == $identity['role_id']) {
      /* anonymous users
       * 匿名ユーザ */
      return false;
    } else if (3 == $identity['role_id'] || 4 == $identity['role_id']) {
      /* manager
       * サービサ */
      switch(strtolower($model)) {
        case 'invoice':
          break;
        case 'othercost':
          if (!preg_match('/transport_id=:transport_id:/', $cond['conditions'])) {
            $cond['conditions'] .= $glue.'transport_id=:transport_id:';
          }
          break;
        case 'transport':
        case 'client':
          if (!preg_match('/user_id=:user_id:/', $cond['conditions'])) {
            $cond['conditions'] .= $glue.'user_id=:user_id:';
            $cond['bind']['user_id'] = $identity['id'];
          }
          break;
        case 'user':
        case 'product':
        case 'transportinvoice':
          if (!preg_match('/id=:id:/', $cond['conditions'])) {
            $cond['conditions'] .= $glue.'id=:id:';
            $cond['bind']['id'] = $identity['id'];
          }
          break;
      }
    } else if (5 == $identity['role_id']) {
      /* end users
       * 視聴ユーザ */
      switch(strtolower($model)) {
        case 'invoice':
        case 'othercost':
        case 'good':
        case 'transport':
          break;
      }
    }
    /* eliminate empty 'AND'.
     * 空のANDを除去 */
    $cond['conditions'] = preg_replace('/^\s+AND/i', '', $cond['conditions']);
    $cond['conditions'] = preg_replace('/AND\s+$/i', '', $cond['conditions']);
    if (empty($cond['bind'])) {
      unset($cond['bind']);
    }
//    print_r($cond);exit;
    return $cond;
  }


  /**
   * test whether it is editable data.
   *
   * @param string $model Model name(camelized).
   * @param mixed  $data  Model instance data.
   * @return bool
   */
  public function is_editable($model, $data)
  {
    /* initialize as false, to void unintended editing. */
    $avail = false;
    /* if $_SESSION['auth'] not found, returns false. */
    $identity = $this->getDI()->get('auth')->getIdentity();
    if (!$identity) {
      return false;
    }
    if (1 == $identity['role_id']) {
      /* privileged administrator is always true. */
      $avail = true;
    } else if (2 == $identity['role_id']) {
      /* anonymous user is always false. */
      $avail = false;
    } else if (3 == $identity['role_id']) {
      /* bussiness owner can edit almost all data except privileged user. */
      switch(strtolower($model)) {
        case 'client':
        case 'product':
          $avail = true;
          break;
        case 'invoice':
        case 'othercost':
        case 'good':
        case 'transport':
          $avail = true;
          break;
        case 'user':
          /* if data is privileged user, it cannot editable. */
          if (1 == $data->role_id) {
            $avail = false;
          } else {
            $avail = true;
          }
          break;
        default:
          $avail = false;
          break;
      }
    } else if (4 == $identity['role_id']) {
      /* servicers can edit only their own data. */
      switch(strtolower($model)) {
        case 'client':
        case 'product':
          $avail = true;
          break;
        case 'invoice':
        case 'othercost':
        case 'good':
        case 'transport':
          if ((0 != $data->user_id) && ($identity['id'] == $data->user_id)) {
            $avail = true;
          } else {
            $avail = false;
          }
          break;
        case 'user':
          if ((0 != $data->id) && ($identity['id'] == $data->id)) {
            $avail = true;
          } else {
            $avail = false;
          }
          break;
        case 'upload':
          if ($identity['id'] == $data->model_id) {
            $avail = true;
          } else {
            $avail = false;
          }
          break;
        default:
          $avail = false;
          break;
      }
    } else if (5 == $identity['role_id']) {
      /* end users can edit only data related to their own group. */
      switch(strtolower($model)) {
        default:
          $avail = false;
          break;
      }
    }
    return $avail;
  }


  /**
   * test whether it is deletable data.
   * 削除可能なデータであるかをテストする
   *
   * @param string $model Model name(camelized). モデル名
   * @param mixed  $data  Model instance data. モデルデータ
   * @return bool
   */
  public function is_deletable($model, $data)
  {
    /* initialize as false, to void unintended deleting.
     * 意図しない編集を避けるため初期は偽 */
    $avail = false;
    /* if $_SESSION['auth'] not found, returns false.
     * session情報がない場合は偽 */
    $identity = $this->getDI()->get('auth')->getIdentity();
    if (!$identity) {
      return false;
    }
    if (1 == $identity['role_id']) {
      /* privileged administrator is always true.
       * 特権管理者は常に真 */
      $avail = true;
    } else if (2 == $identity['role_id']) {
      /* anonymous user is always false.
       * 匿名ユーザは常に偽 */
      $avail = false;
    } else if (3 == $identity['role_id']) {
      /* bussiness owner can delete almost all data except privileged user.
       * 事業者は特権管理者に関するデータ以外 */
      switch(strtolower($model)) {
        case 'invoice':
        case 'othercost':
        case 'good':
        case 'transport':
        case 'upload':
          $avail = true;
          break;
        case 'user':
          /* if data is privileged user, it cannot deletable.
           * 特権管理者は削除不可 */
          if ((0 == $data->id) || (1 == $data->role_id)) {
            $avail = false;
          } else {
            $avail = true;
          }
          break;
        default:
          $avail = false;
          break;
      }
    } else if (4 == $identity['role_id']) {
      /* servicers can delete only their own data.
       * サービサは自身に紐づくデータのみ */
      switch(strtolower($model)) {
        case 'invoice':
        case 'othercost':
        case 'good':
        case 'transport':
          break;
        default:
          $avail = false;
          break;
      }
    } else if (5 == $identity['role_id']) {
      /* end users can delete only Preset data related to their own group.
       * 視聴ユーザはプリセットに関するデータのみ削除可能 */
      switch(strtolower($model)) {
        case 'preset':
          $avail = ((0 != $data->id) && ($identity['id'] == $data->id));
          break;
        default:
          $avail = false;
          break;
      }
    }
    return $avail;
  }

}
