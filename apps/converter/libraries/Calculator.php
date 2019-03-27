<?php

namespace Coolrevo\Smc\Converter\Components;

use Phalcon\Di;
use Phalcon\Mvc\User\Component;
use Coolrevo\Smc\Servicer\Models\Camera;
use Coolrevo\Smc\Servicer\Models\Member;
use Coolrevo\Smc\Servicer\Models\User;

/**
 * Class Calculator
 * 事業者ページのカメラ台数管理・下り帯域管理で、各条件をもとに
 * 集計を実行、CSV用のメタデータをキャッシュする
 *
 * @package Coolrevo\Smc\Manager\Components
 *
 * @property \Phalcon\Translate\Adapter\PeclGettext $l10n
 * @property \Coolrevo\Smc\Util\QueryInjector $qi
 */
class Calculator extends Component
{

  /**
   * 条件にマッチするカメラを取得し、パラメータから計算結果を返す
   * @param mixed $postdata
   * @return mixed|boolean
   */
  public function calcNumofCameraFee($postdata)
  {
    /** @var Camera|\Phalcon\Mvc\Model\ResultsetInterface|array $cameras */
    $cameras = $this->getCameraWithConditions($postdata);
    if (!empty($cameras)) {
      $counts = $cameras->count();
      $total = 0;
      /** @var Camera $r */
      foreach ($cameras as $r) {
        /** @var Member $member */
        $member = $r->getRelated('member');
        $fee = intval($postdata['duties']);
        if ($member->usedrm == 1) {
          $fee += intval($postdata['drmfee']);
        }
        $total += $fee;
      }
      return array(
        'totalfee' => $total,
        'counts'   => $counts,
      );
    }
    return false;
  }


  /**
   * 条件にマッチするカメラを返す
   * @param $postdata
   * @return bool|Camera|null|\Phalcon\Mvc\Model\ResultsetInterface
   */
  public function getCameraWithConditions($postdata)
  {
    $retval = [];
    if ($postdata) {
      $calc_datemonth = date('Y-m-t', strtotime('-1 month'));
      if (preg_match('/^20[0-9]{2}\-[0-1][0-9]$/', $postdata['target_date'])) {
        $calc_datemonth = $postdata['target_date'];
      }
      $begin_ofmonth = date('Y-m-d 00:00:00', strtotime('first day of '.$calc_datemonth));
      $end_ofmonth   = date('Y-m-d 23:59:59', strtotime('last day of '.$calc_datemonth));

      // サービサの取得
      $users = [];
      $ucriteria = User::query()
        ->where('role_id!=:role_id:', ['role_id' => 1]);
      if ($postdata['user'] != '*') {
        if (is_numeric($postdata['user'])
        && ($postdata['user'] > 0)) {
          $ucriteria->andWhere('id=:id:', ['id' => $postdata['user']]);
        }
      }
      /** @var User|\Phalcon\Mvc\Model\ResultsetInterface $rset */
      $rset = $ucriteria->execute();
      if ($rset->count() == 0) {
        $this->flash->notice($this->l10n->_('User matches conditions cannot found.'));
        return false;
      }
      if ($rset->count() > 0) {
        foreach ($rset as $u) {
          array_push($users, $u->id);
        }
      }

      // 会員の取得()
      $members = [];
      $mcriteria = Member::query()
        ->where('joined<=:joined:', ['joined' => $begin_ofmonth])
        ->andWhere('withdraw is null or withdraw<=:withdraw:', ['withdraw' => $end_ofmonth])
        ->orderBy('id ASC');
      if (count($users) > 0) {
        if (count($users) == 1) {
          $mcriteria->andWhere('user_id=:user_id:', [
            'user_id' => $users[0]['id']
          ]);
        } else {
          $mcriteria->andWhere('user_id in ({user_ids:array})', [
            'user_ids' => $users
          ]);
        }
      }
      if ($postdata['member'] != '*') {
        if (is_numeric($postdata['member'])
        && ($postdata['member'] > 0)) {
          $mcriteria->andWhere('id=:id:', ['id' => $postdata['member']]);
        }
      }
      if ($postdata['membergroup'] != '*') {
        if (is_numeric($postdata['membergroup'])
        && ($postdata['membergroup'] > 0)) {
          $mcriteria->andWhere('membergroup_id=:membergroup_id:', [
            'membergroup_id' => $postdata['membergroup']
          ]);
        }
      }
      if ($postdata['usedrm'] != '*') {
        if (is_numeric($postdata['usedrm'])) {
          $mcriteria->andWhere('usedrm=:usedrm:', [
            'usedrm' => $postdata['usedrm']
          ]);
        }
      }
      /** @var Member|\Phalcon\Mvc\Model\ResultsetInterface $rset */
      $rset = $mcriteria->execute();
      if ($rset->count() == 0) {
        $this->flash->notice($this->l10n->_('Member matches conditions cannot found.'));
        return false;
      }
      if ($rset->count() > 0) {
        foreach ($rset as $m) {
          array_push($members, $m->id);
        }
      }

      // カメラの基本取得(請求対象)
      $criteria = Camera::query()
        ->where('nocharged=:nocharged:', ['nocharged' => 0]);

      if (count($members) > 0) {
        if (count($members) == 1) {
          $criteria->andWhere('member_id=:member_id:', [
            'member_id' => $members[0]
          ]);
        } else {
          $criteria->andWhere('member_id in ({member_ids:array})', [
            'member_ids' => $members
          ]);
        }
      }
      if ($postdata['bitrate'] != '*') {
        if (is_numeric($postdata['bitrate'])
        && ($postdata['bitrate'] > 0)) {
          $criteria->andWhere('bitrate=:bitrate:', [
            'bitrate' => $postdata['bitrate']
          ]);
        }
      }
      if ($postdata['preserve'] != '*') {
        if (is_numeric($postdata['preserve'])
        && ($postdata['preserve'] > 0)) {
          $criteria->andWhere('preserve=:preserve:', [
            'preserve' => $postdata['preserve']
          ]);
        }
      }
      /** @var Camera|\Phalcon\Mvc\Model\ResultsetInterface $rset */
      $rset = $criteria->execute();
      if ($rset->count() == 0) {
        $this->flash->notice($this->l10n->_('Camera matches conditions cannot found.'));
        return false;
      }
      if ($rset->count() > 0) {
        $retval = $rset;
      }
    }
    return $retval;
  }

  /**
   * 条件にマッチする帯域利用データを返す
   * @param mixed $postdata
   * @return mixed|boolean
   */
  public function calcSimultaneousBands($postdata)
  {
    if ($postdata) {
      $calc_datemonth = date('Y-m-t', strtotime('-1 month'));
      if (preg_match('/^20[0-9]{2}\-[0-1][0-9]$/', $postdata['target_date'])) {
        $calc_datemonth = $postdata['target_date'];
      }
      $begin_ofmonth = date('Y-m-d 00:00:00', strtotime('first day of '.$calc_datemonth));
      $end_ofmonth   = date('Y-m-d 23:59:59', strtotime('last day of '.$calc_datemonth));

      $rset = $this->modelsManager->createBuilder()
        ->columns(array(
          'Transmission.date AS date',
          'SUM(Transmission.data_bytes) AS bytes',
          'SUM(Transmission.data_bits) AS bits'))
        ->from(array(
          'Transmission'=>'\\Coolrevo\\Smc\\Servicer\\Models\\Transmission'))
        ->betweenWhere('date', $begin_ofmonth, $end_ofmonth)
        ->groupBy('date')
        ->orderBy('date ASC')
        ->getQuery()
        ->execute();
      if ($rset->count() > 0) {
        return $rset;
      }
    }
    return false;
  }
}