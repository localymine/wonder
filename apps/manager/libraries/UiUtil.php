<?php

namespace General\Core\Manager\Components;

use Phalcon\Di;
use Phalcon\Tag;
use General\Core\Paginator\BootstrapPaginator;


/**
 * draw navigation and other UI elements.
 * ナビゲーションその他UIエレメントを表示する
 *
 * @package Coolrevo\Smc\Servicer\Components
 */
class UiUtil extends BootstrapPaginator
{

  /**
   * navigation elements for "Custom".
   * セットアップメニュー用配列
   * @var array
   */

  private $settings = [
    'brands' => [
      'link'  => 'manager/brands/index',
      'label' => '<i class="fa fa-trademark"></i><span>Brands</span>',
      'controller' => ['brands'],
    ],
    'categories' => [
      'link'  => 'manager/categories/index',
      'label' => '<i class="fa fa-tree"></i><span>Categories</span>',
      'controller' => ['categories'],
    ],
  ];

  private $clients = [
    'clients' => [
      'link'  => 'manager/clients/index',
      'label' => '<i class="fa fa-address-book"></i><span>Clients</span>',
      'controller' => ['clients'],
    ],
    'members' => [
      'link'  => 'manager/members/index',
      'label' => '<i class="fa fa-user"></i><span>Members</span>',
      'controller' => ['members'],
    ],
  ];

  private $goods = [
    'products' => [
      'link'  => 'manager/products/index',
      'label' => '<i class="fa fa-product-hunt"></i><span>Products</span>',
      'controller' => ['products'],
    ],
    'inventory' => [
      'link'  => 'manager/inventory/index',
      'label' => '<i class="fa fa-archive"></i><span>Inventory</span>',
      'controller' => ['inventory'],
    ],
    'invoices' => [
      'link'  => 'manager/invoices/index',
      'label' => '<i class="fa fa-sticky-note"></i><span>Invoices</span>',
      'controller' => ['invoices'],
    ],
    'transport' => [
      'link'  => 'manager/transports/index',
      'label' => '<i class="fa fa-plane"></i><span>Transport</span>',
      'controller' => ['transports'],
    ],
  ];


  /**
   * draw hierarchical menu in sidebar.
   * サイドバーナビゲーションを出力する
   *
   * add "active" class to current controller or action.
   * 現在アクティブなコントローラにはactiveクラスを付与する
   *
   */
  public function getNav()
  {
    $out = '';
    $l10n = Di::getDefault()->get('l10n');
    $controllerName = $this->view->getControllerName();
    $actionName = $this->view->getActionName();
    $clientsCtrls = ['clients'];
    $goodsCtrls   = ['products','invoices','transports'];

    // Header
    $out .= '<li class="header">'.$l10n->_('Manager Menu').'</li>'."\n";

    // Dashboard
    $label = $l10n->_('<i class="fa fa-dashboard"></i><span>DashBoard</span>');
    $li = Tag::linkTo('manager/main/dashboard', $label);
    if ($actionName == 'dashboard') {
      $out .= '<li class="active">'.$li.'</li>'."\n";
    } else {
      $out .= '<li>'.$li.'</li>'."\n";
    }

    // Settings
    $label = $l10n->_('<i class="fa fa-cog"></i><span>Settings</span>').
      '<i class="fa fa-angle-right pull-right"></i>';
    $li = Tag::linkTo('manager/brands/index', $label);
    if (in_array($controllerName, $clientsCtrls)) {
      $out .= '<li class="treeview active">'.$li."\n";
    } else {
      $out .= '<li class="treeview">'.$li."\n";
    }
    $out .= '<ul class="treeview-menu">'."\n";

    // Settings submenu
    foreach ($this->settings as $menu) {
      $li = Tag::linkTo($menu['link'], $l10n->_($menu['label']));
      if (in_array($controllerName, $menu['controller'])) {
        $out .= '<li class="active">'.$li.'</li>'."\n";
      } else {
        $out .= '<li>'.$li.'</li>'."\n";
      }
    }
    $out .= '</ul></li>'."\n";

    // Clients
    $label = $l10n->_('<i class="fa fa-users"></i><span>Users</span>').
      '<i class="fa fa-angle-right pull-right"></i>';
    $li = Tag::linkTo('manager/clients/index', $label);
    if (in_array($controllerName, $clientsCtrls)) {
      $out .= '<li class="treeview active">'.$li."\n";
    } else {
      $out .= '<li class="treeview">'.$li."\n";
    }
    $out .= '<ul class="treeview-menu">'."\n";

    // Clients submenu
    foreach ($this->clients as $menu) {
      $li = Tag::linkTo($menu['link'], $l10n->_($menu['label']));
      if (in_array($controllerName, $menu['controller'])) {
        $out .= '<li class="active">'.$li.'</li>'."\n";
      } else {
        $out .= '<li>'.$li.'</li>'."\n";
      }
    }
    $out .= '</ul></li>'."\n";

    // Goods
    $label = $l10n->_('<i class="fa fa-cubes"></i><span>Goods</span>').
      '<i class="fa fa-angle-right pull-right"></i>';
    $li = Tag::linkTo('manager/invoices/index', $label);
    if (in_array($controllerName, $goodsCtrls)) {
      $out .= '<li class="treeview active">'.$li."\n";
    } else {
      $out .= '<li class="treeview">'.$li."\n";
    }
    $out .= '<ul class="treeview-menu">'."\n";

    // Goods submenu
    foreach ($this->goods as $menu) {
      $li = Tag::linkTo($menu['link'], $l10n->_($menu['label']));
      if (in_array($controllerName, $menu['controller'])) {
        $out .= '<li class="active">'.$li.'</li>'."\n";
      } else {
        $out .= '<li>'.$li.'</li>'."\n";
      }
    }
    $out .= '</ul></li>'."\n";


    echo $out;
  }

}