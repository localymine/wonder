<?php
/**
 * provides validation for new servicer.
 * サービサ登録のためのバリデーションを提供する
 */
namespace Coolrevo\Smc\Manager\Components;

use Coolrevo\Smc\Servicer\Models\User;
use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Callback;


/**
 * Validation for new servicer.
 * 新規サービサのバリデーション
 * @package Coolrevo\Smc\Manager\Components
 */
class ValidationCreate extends Validation
{

  /**
   * initialize validation classes
   * バリデータの初期化
   */
  public function initialize()
  {

    $this->add(
      'name',
      new PresenceOf(
        [
          'message' => $this->l10n->_('Servicer Name is required')
        ]
      )
    );

    $this->add(
      'servicename',
      new PresenceOf(
        [
          'message' => $this->l10n->_('Service Name is required')
        ]
      )
    );

    $this->add(
      'login',
      new PresenceOf(
        [
          'message' => $this->l10n->_('Login for Servicer is required')
        ]
      )
    );

    $this->add(
      'login',
      new Callback(
        [
          'callback' => function($data) {
            $checkfirst = User::count(array(
              'login LIKE LOWER(:login:)',
              'bind' => array(
                'login' => mb_strtolower(trim($data['login']))
              )
            ));

            if (!$checkfirst) {
              return true;
            } else {
              return false;
            }
          },
          'message' => $this->l10n->_('Login for Servicer existed')
        ]
      )
    );

    $this->add(
      'passwd',
      new PresenceOf(
        [
          'message' => $this->l10n->_('Password is required')
        ]
      )
    );

    $this->add(
      'domainname',
      new PresenceOf(
        [
          'message' => $this->l10n->_('Domain Name is required')
        ]
      )
    );

    $this->add(
      'domainname',
      new Callback(
        [
          'callback' => function($data) {
            $checkfirst = User::count(array(
              'domainname LIKE LOWER(:domainname:)',
              'bind' => array(
                'domainname' => trim($data['domainname'])
              )
            ));

            if (!$checkfirst) {
              return true;
            } else {
              return false;
            }
          },
          'message' => $this->l10n->_('Domain Name existed')
        ]
      )
    );

    $this->add(
      'email1',
      new PresenceOf(
        [
          'message' => $this->l10n->_('Email Address1 is required')
        ]
      )
    );

    $this->add(
      'email1',
      new Email(
        [
          'message' => $this->l10n->_('Email Address1 is not valid')
        ]
      )
    );

    $this->add(
      'email1',
      new Callback(
        [
          'callback' => function($data) {
            $checkfirst = User::count(array(
              'email1 LIKE LOWER(:email1:)',
              'bind' => array(
                'email1' => mb_strtolower(trim($data['email1']))
              )
            ));

            if (!$checkfirst) {
              return true;
            } else {
              return false;
            }
          },
          'message' => $this->l10n->_('Email Address1 existed')
        ]
      )
    );

  }

}