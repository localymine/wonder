<?php

namespace General\Core\Manager\Components;

use Phalcon\Mvc\User\Component;
use General\Core\Manager\Models\User;
use General\Core\Manager\Models\Role;
use General\Core\Auth\AuthDbException;

/**
 * Class Auth
 *
 * ユーザ認証と権限付与、セッション管理の機能を提供する。
 * DependencyInjectorにサービスとして登録し、モジュール内で利用されることを想定。
 *
 * @package General\Core\Manager\Components
 *
 * @property \Phalcon\Translate\Adapter\PeclGettext $l10n
 * @property \General\Core\Manager\Components\Acl $acl
 */
class Auth extends Component
{

  /**
   * 管理ユーザのログイン処理
   *
   * ユーザ入力を受けて認証処理を実行し、成功時にはセッション情報の登録を行う。失敗時は例外を投げる。
   *
   * @param array $cred ユーザがPOSTした情報。
   * @return boolean
   * @throws AuthDbException ユーザ入力にマッチするレコードがない場合は例外を発生させる。
   */
  public function check($cred)
  {
    // activeなユーザが存在し、且つ、パスワードのハッシュ値が一致すれば認証成功
    $user = User::findFirst([
      'conditions' => 'login=:login: and disabled=:disabled:',
      'bind' => ['login' => $cred['username'], 'disabled' => 0],
    ]);
    if (!$user) {
      throw new AuthDbException($this->l10n->_('Wrong username or password'));
    }
    //$passwd_verify = $this->security->checkHash($cred['password'], $user->admpasswd);
    $passwd_verify = ($cred['password'] === $user->passwd);
    if (!$passwd_verify) {
      throw new AuthDbException($this->l10n->_('Wrong username or password'));
    }
    /** @var Role $role */
    $role = $user->getRelated('role');
    $role_id     = $role->id;
    $role_name   = $role->name;
    $role_disp   = $role->display;
    $role_demote = 0;

    /* if user has domain owner role, pretend to be a manager.
     * 事業者ユーザはサービサとして認識させる */
    if ($user->role_id == 3) {
      $fallback = Role::findFirst([
        'id=:id:',
        'bind' => ['id' => 4]
      ]);
      $role_id     = $fallback->id;
      $role_name   = $fallback->name;
      $role_disp   = $fallback->display;
      $role_demote = 1;
    }

    /* store authentication informations to $_SESSION.
     * 認証成功の場合、$_SESSIONに認証情報を保存 */
    $this->session->set('auth', [
      'id'          => $user->id,
      'name'        => $user->name,
      'login'       => $user->login,
      'role_id'     => $role_id,
      'role'        => $role_name,
      'role_display'=> $role_disp,
      'role_demote' => $role_demote,
    ]);
  }


  /**
   * セッション内認証情報を返す
   *
   * @return array|boolean セッション中に保存された認証情報
   */
  public function getIdentity()
  {
    if ($this->session->has('auth')) {
      return $this->session->get('auth', false);
    }
    return false;
  }


  /**
   * セッション情報から表示名を返す
   *
   * @return string|boolean 表示用ユーザ名
   */
  public function getName()
  {
    $identity = $this->getIdentity();
    if (!$identity) {
      return false;
    }
    if (!isset($identity['name'])) {
      return false;
    }
    return $identity['name'];
  }


  /**
   * ログインセッションを削除する
   *
   */
  public function remove()
  {
    $this->session->remove('auth');
  }


  /**
   * 現在のログインセッションに紐付くユーザ情報を取得する
   *
   * @param int $id ユーザID
   * @throws AuthDbException 検索クエリーが不正、検索結果が空の時は例外を発生させる
   */
  public function authUserById($id)
  {
    /** @var \General\Core\Manager\Models\User $user */
    $user = User::findFirst([
      'conditions' => 'id=:id: and disabled=:disabled:',
      'bind' => ['id' => $id, 'disabled' => 0]
    ]);
    if (!$user) {
      throw new AuthDbException($this->l10n->_('The User does not exist.'));
    }
    /** @var Role $role */
    $role = $user->getRelated('role');
    $role_id   = $role->id;
    $role_name = $role->name;
    $role_disp = $role->display;
    $role_demote = 0;

    /* if user has domain owner role, pretend to be a manager.
     * 事業者ユーザはサービサとして認識させる */
    if ($user->role_id == 3) {
      $fallback = Role::findFirst([
        'id=:id:',
        'bind' => ['id' => 4]
      ]);
      $role_id     = $fallback->id;
      $role_name   = $fallback->name;
      $role_disp   = $fallback->display;
      $role_demote = 1;
    }

    /* store authentication informations to $_SESSION.
     * 認証成功の場合、$_SESSIONに認証情報を保存 */
    $this->session->set('auth', [
      'id'          => $user->id,
      'name'        => $user->name,
      'login'       => $user->login,
      'role_id'     => $role_id,
      'role'        => $role_name,
      'role_display'=> $role_disp,
      'role_demote' => $role_demote,
    ]);
  }


  /**
   * 現在のログインセッションに紐付くユーザ情報を取得する
   *
   * @return \General\Core\Manager\Models\User | boolean
   */
  public function getUser()
  {
    $identity = $this->session->get('auth');
    if (!$identity) {
      return false;
    }
    if (!isset($identity['id'])) {
      return false;
    }
    $user = User::findFirst([
      'id=:id:',
      'bind' => ['id' => $identity['id']]
    ]);
    if (!$user) {
      return false;
    }
    return $user;
  }

}
