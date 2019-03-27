<?php

namespace Coolrevo\Smc\Converter\Components;

use Phalcon\Mvc\User\Component;
use Phalcon\Acl\Adapter\Memory as AclMemory;
use Phalcon\Acl\Role as AclRole;
use Phalcon\Acl\Resource as AclResource;
use Coolrevo\Smc\Servicer\Models\Role;

/**
 * Class Acl
 *
 * アクセスコントロールリストの生成・管理、リクエストパスに対するアクセス権の検証機能を提供する。
 * DependencyInjectorにサービスとして登録し、アプリケーション内で共通利用されることを想定。
 *
 * @package \Coolrevo\Smc\Manager\Components
 */
class Acl extends Component
{

  /**
   * phalcon組込みのACLオブジェクト
   * @var \Phalcon\Acl\Adapter\Memory
   */
  private $acl;

  /**
   * 生成したACLをキャッシュするファイル・ディレクトリ
   * @var string
   */
  private $filePath;

  /**
   * 認証が必要なパスのコントローラおよびアクション
   * @var array
   */
  private $privateResources = array(
    'bandwidths'   => array('index', 'calc', 'exportcsv'),
    'cameras'      => array('index', 'calc', 'exportcsv'),
    'main'         => array('dashboard'),
    'users'        => array('index', 'new', 'create', 'show', 'edit', 'save', 'delete', 'exportcsv'),
  );

  /**
   * {@see $privateResources} の Human-readable な説明を定義
   * @var array
   */
  private $actionDescriptions = array(
    'index'   => 'Access',
    'search'  => 'Search',
    'new'     => 'New',
    'create'  => 'Create',
    'show'    => 'Show',
    'edit'    => 'Edit',
    'save'    => 'Save',
    'delete'  => 'Delete',
    'start'   => 'Login',
    'end'     => 'Logout',
    'account' => 'Account',
    'ntp'         => 'Ntp',
    'memory'      => 'Memory',
    'traffic'     => 'Traffic',
    'saveoption'  => 'Saveoption',
    'exportcsv'   => 'Export',
    'arrangement' => 'Arrangement',
    'getchildren' => 'Getchildren',
    'calc'        => 'Calculate',
  );


  /**
   * コンポーネントの初期化
   */
  public function __construct()
  {
    // キャッシュファイル名と保存先ディレクトリを指定
    $this->filePath = SMC_ROOT.'/var/tmp/acl/manager.txt';
  }


  /**
   * パスに認証が必要かどうかの真偽値を返す
   *
   * {@see $privateResources}に含まれないコントローラ・アクションは
   * パブリックなアクセスが許可されていると見なす。
   *
   * @param string $controllerName
   * @param string $actionName
   * @return boolean
   */
  public function isPrivate($controllerName, $actionName)
  {
    $pr = $this->privateResources;
    if (isset($pr[$controllerName])) {
      if (isset($pr[$controllerName][$actionName])
      ||  in_array($actionName, $pr[$controllerName])) {
        return true;
      } else {
        return false;
      }
    }
    return false;
  }


  /**
   * パスに対して、現在のセッションユーザがアクセス権を持つかどうかの真偽値を返す
   *
   * ACLで権限 $role に対し $controller/$action へのアクセスが許可されていれば真を、
   * そうでなければ偽を返す。
   *
   * @param string $role ユーザ権限を表す文字列(Role.name)
   * @param string $controller コントローラ名
   * @param string $action アクション名
   * @return boolean 権限に対しアクセス許可されているかどうかの真偽値
   */
  public function isAllowed($role, $controller, $action)
  {
    return $this->getAcl()->isAllowed($role, $controller, $action);
  }


  /**
   * ACLの一覧を返す
   *
   * @return \Phalcon\Acl\Adapter\Memory
   */
  public function getAcl()
  {
    // 作成済みのACLがあれば返す
    if (is_object($this->acl)) {
      return $this->acl;
    }
    // ファイルベースACLがなければ再生成して返す
    if (!file_exists($this->filePath)) {
      $this->acl = $this->rebuild();
      return $this->acl;
    }
    // ファイルベースACLがあれば読み込んで返す
    $data = file_get_contents($this->filePath);
    $this->acl = unserialize($data);
    return $this->acl;
  }


  /**
   * ユーザ権限に割り当てられたアクセス権を返す
   *
   * @param Role $role
   * @return array
   */
  public function getPermissions(Role $role)
  {
    $perms = array();
    foreach ($role->{'permission'} as $perm) {
      $perms[$perm->resource.'.'.$perm->action] = true;
    }
    return $perms;
  }


  /**
   * アプリケーションで利用できるすべてのACOリソース・ACOアクションを返す
   *
   * @return array
   */
  public function getResources()
  {
    return $this->privateResources;
  }


  /**
   * ACOアクションに関連付けられた Human-readable な説明文字列を返す
   *
   * 引数のアクション名が存在しない場合は引数で受けたものをそのまま返す
   *
   * @param string $action
   * @return mixed $action
   */
  public function getActionDescription($action)
  {
    if (isset($this->actionDescriptions[$action])) {
      return $this->actionDescriptions[$action];
    } else {
      // 該当するものがない場合は引数をそのまま返す
      return $action;
    }
  }


  /**
   * ACLを再構築し、ファイルとして保存する
   *
   * ACLのキャッシュ
   *
   * @return \Phalcon\Acl\Adapter\Memory
   */
  public function rebuild()
  {
    $acl = new AclMemory();
    $acl->setDefaultAction(\Phalcon\Acl::DENY);

    // アプリケーションの権限をACL上の権限(ARO)として登録
    $roles = Role::find("active = '1'");
    foreach ($roles as $role) {
      $acl->addRole(new AclRole($role->name));
    }
    // 認証を必要としたいコントローラ・アクション(ACO)をACLに登録
    foreach ($this->privateResources as $resource => $actions) {
      $acl->addResource(new AclResource($resource), $actions);
    }
    // 権限毎にACOに対するアクセス権を設定する
    foreach ($roles as $role) {
      // それぞれのユーザ権限に対して、permissionsテーブル内に保存されたアクセス許可を付与
      foreach ($role->permission as $perm) {
        $acl->allow($role->name, $perm->resource, $perm->action);
      }
      // 常に許可したいものがある場合は下記フォーマットで記入すれば許可される
      // $acl->allow($role->getName(), 'controller_name', 'action_name');
      // ワイルドカードは特権管理者
      // $acl->allow($role->getName(), '*', '*');
    }
    // キャッシュファイルが存在しない場合、シリアライズの上ファイル出力する。
    if (touch($this->filePath) && is_writable($this->filePath)) {
      file_put_contents($this->filePath, serialize($acl));
    } else {
      // キャッシュディレクトリに書き込み権限がない場合は警告を表示する。
      $this->flash->error(
        sprintf("The user does not have write permissions to create the ACL list at %s", $this->filePath)
      );
    }
    return $acl;
  }

}
