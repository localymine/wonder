<?php

namespace General\Core\Converter\Components;

use Phalcon\Di;
use Phalcon\Tag;
use General\Core\Paginator\BootstrapPaginator;

/**
 * Class UiUtil
 * @package Coolrevo\Smc\Manager\Components
 */
class UiUtil extends BootstrapPaginator
{
  /**
   * 事業者管理メニュー用配列
   * @var array
   */
  private $_domain_tree = array(
    'users' => array(
      'link'  => 'manager/users/index',
      'label' => '<i class="fa fa-user"></i><span>Manage Users</span>',
      'controller' => array('users'),
    ),
    'cameras' => array(
      'link'  => 'manager/cameras/index',
      'label' => '<i class="fa fa-video-camera"></i><span>Manage Camera for Charge</span>',
      'controller' => array('cameras'),
    ),
    'bandwidths' => array(
      'link'  => 'manager/bandwidths/index',
      'label' => '<i class="fa fa-cloud-download"></i><span>Manage Bandwidth for Charge</span>',
      'controller' => array('bandwidths'),
    ),
  );

  /**
   * システムメニュー1用配列
   * @var array
   */
  private $_system_tree = array(
    'database' => array(
      'link'  => 'manager/systems/index',
      'label' => '<i class="fa fa-database"></i><span>Manage DB Masters</span>',
      'action' => array('index'),
    ),
    'notify' => array(
      'link'  => 'manager/systems/notify',
      'label' => '<i class="fa fa-exclamation"></i><span>Maintain notice</span>',
      'action' => array('notify')
    ),
  );

  /**
   * システムメニュー2用配列
   * @var array
   */
  private $_logs_tree = array(
    'index' => array(
      'link'  => 'manager/logs/index',
      'label' => '<i class="fa fa-file-text-o"></i><span>Application logs</span>',
      'action' => array('index'),
    ),
    'agentboxes' => array(
      'link'  => 'manager/logs/agentboxes',
      'label' => '<i class="fa fa-file-text-o"></i><span>Agentboxes</span>',
      'action' => array('agentboxes')
    ),
    'cameras' => array(
      'link'  => 'manager/logs/cameras',
      'label' => '<i class="fa fa-file-text-o"></i><span>Cameras</span>',
      'action' => array('cameras')
    ),
    'accesses' => array(
      'link'  => 'manager/logs/accesses',
      'label' => '<i class="fa fa-file-text-o"></i><span>Access logs</span>',
      'action' => array('accesses')
    ),
    'errors' => array(
      'link'  => 'manager/logs/errors',
      'label' => '<i class="fa fa-file-text-o"></i><span>Error logs</span>',
      'action' => array('errors')
    ),
    'updates' => array(
      'link'  => 'manager/logs/updates',
      'label' => '<i class="fa fa-file-text-o"></i><span>Updates logs</span>',
      'action' => array('updates')
    ),
  );

  /**
   * サイドバーナビゲーションを出力する
   *
   * 現在アクティブなコントローラにはactiveクラスを付与する。
   *
   */
  public function getNav()
  {
    $out = '';
    $l10n = Di::getDefault()->get('l10n');
    $controllerName = $this->view->getControllerName();
    $actionName = $this->view->getActionName();

    // Header
    $out .= '<li class="header">'.$l10n->_('Domain Owner Menu').'</li>'."\n";
    // Dashboard
    $label = $l10n->_('<i class="fa fa-dashboard"></i><span>DashBoard</span>');
    $li = Tag::linkTo('manager/main/dashboard', $label);
    if ($actionName == 'dashboard') {
      $out .= '<li class="active">'.$li.'</li>'."\n";
    } else {
      $out .= '<li>'.$li.'</li>'."\n";
    }
    // Domain Owners menu
    foreach ($this->_domain_tree as $menu) {
      $li = Tag::linkTo($menu['link'], $l10n->_($menu['label']));
      if (in_array($controllerName, $menu['controller'])) {
        $out .= '<li class="active">'.$li.'</li>'."\n";
      } else {
        $out .= '<li>'.$li.'</li>'."\n";
      }
    }
    echo $out;
  }

  /**
   * 特権管理者用サイドバーナビゲーションを出力する
   *
   * 現在アクティブなコントローラにはactiveクラスを付与する。
   *
   */
  public function getAdminNav()
  {
    $out = '';
    $l10n = Di::getDefault()->get('l10n');
    $controllerName = $this->view->getControllerName();
    $actionName = $this->view->getActionName();

    // Header
    $out .= '<ul class="sidebar-menu">'."\n";
    $out .= '<li class="header">'.$l10n->_('System Menu for Cool-revo').'</li>'."\n";

    // systems
    $label = $l10n->_('<i class="fa fa-cogs"></i><span>Maintenance</span>').'<i class="fa fa-angle-left pull-right"></i>';
    $li = Tag::linkTo('manager/systems/index', $label);
    if ($controllerName == 'systems') {
      $out .= '<li class="treeview active">'.$li."\n";
    } else {
      $out .= '<li class="treeview">'.$li."\n";
    }
    $out .= '<ul class="treeview-menu">'."\n";

    // systems submenu
    foreach ($this->_system_tree as $menu) {
      $li = Tag::linkTo($menu['link'], $l10n->_($menu['label']));
      if (in_array($actionName, $menu['action'])) {
        $out .= '<li class="active">'.$li.'</li>'."\n";
      } else {
        $out .= '<li>'.$li.'</li>'."\n";
      }
    }
    $out .= '</ul></li>'."\n";

    // logs
    $label = $l10n->_('<i class="fa fa-files-o"></i><span>Refer Logs</span>').'<i class="fa fa-angle-left pull-right"></i>';
    $li = Tag::linkTo('manager/logs/index', $label);
    if ($controllerName == 'logs') {
      $out .= '<li class="treeview active">'.$li."\n";
    } else {
      $out .= '<li class="treeview">'.$li."\n";
    }
    $out .= '<ul class="treeview-menu">'."\n";

    // logs submenu
    foreach ($this->_logs_tree as $menu) {
      $li = Tag::linkTo($menu['link'], $l10n->_($menu['label']));
      if (in_array($actionName, $menu['action'])) {
        $out .= '<li class="active">'.$li.'</li>'."\n";
      } else {
        $out .= '<li>'.$li.'</li>'."\n";
      }
    }
    $out .= '</ul></li>'."\n";
    $out .= '</ul>'."\n";

    echo $out;
  }

}