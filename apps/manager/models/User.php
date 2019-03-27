<?php
/**
 * provides User model entity.
 */
namespace General\Core\Manager\Models;

use Phalcon\Di as DiContainer;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\Timestampable;
use Phalcon\Mvc\Model\Relation;
use Phalcon\Mvc\Model\Resultset;
use Phalcon\Mvc\Model\ResultsetInterface;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Mvc\Model\Message;

/**
 * class for Camera model Entity.
 *
 * @package General\Core\Manager\Models
 */
class User extends ModelBase implements ModelInterface
{

  /** @var string define class name. */
  protected $className = 'User';

  /**
   * primary key.
   * @var integer
   * @Primary
   * @Identity
   * @Column(type="integer", nullable=false)
   */
  public $id;
  /**
   * role of this user.
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $role_id;
  /**
   * user name.
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $name;
  /**
   * account to login as a servicer.
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $login;
  /**
   * password to login as a servicer.
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $passwd;
  /**
   * email address #2.
   * @var string
   * @Column(type="string")
   */
  public $email;
  /**
   * flag indicating whether disabled or not.
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $disabled;


  /**
   * returns the name of table that persists this model.
   *
   * @return string
   */
  public function getSource()
  {
    return 'users';
  }


  /**
   * returns correspondence table of column names and properties.
   *
   * @return array
   */
  public function columnMap()
  {
    return [
      'id'          => 'id',
      'role_id'     => 'role_id',
      'name'        => 'name',
      'login'       => 'login',
      'passwd'      => 'passwd',
      'email'       => 'email',
      'disabled'    => 'disabled',
      'created'     => 'created',
      'updated'     => 'updated',
    ];
  }


  /**
   * override Model::find.
   *
   * @param mixed $parameters
   * @return Resultset|ResultsetInterface
   */
  public static function find($parameters = null) {
    return parent::find($parameters);
  }


  /**
   * override Model::findFirst.
   *
   * @param mixed $parameters
   * @return User|ModelBase|Model
   */
  public static function findFirst($parameters = null) {
    return parent::findFirst($parameters);
  }


  /**
   * initialization of instance.
   */
  public function initialize()
  {
    /** @var \Phalcon\Translate\Adapter\PeclGettext $l10n */
    $l10n = DiContainer::getDefault()->get('l10n');
    /* enable partial update instead of all-field update. */
    $this->useDynamicUpdate(true);
    /* configure relationship. */
    $this->belongsTo('role_id', Role::class, 'id', [
      'alias' => 'role'
    ]);
    $this->hasMany('id', ProductQuantity::class, 'user_id', [
      'alias' => 'productquantity',
      'foreignKey' => [
        'message' => $l10n->_('The User cannot be deleted because Model Member refers it.'),
        'action' => Relation::ACTION_RESTRICT,
      ]
    ]);
//    $this->hasMany('id', Member::class, 'user_id', [
//      'alias' => 'member',
//      'foreignKey' => [
//        'message' => $l10n->_('The User cannot be deleted because Model Member refers it.'),
//        'action' => Relation::ACTION_RESTRICT,
//      ]
//    ]);
    /* configure model behaviours. */
    $this->addBehavior(
      /* insert timestamp on create / update. */
      new Timestampable([
        'beforeValidationOnCreate' => [
          'field' => [
            'created',
            'updated',
          ],
          'format' => 'Y-m-d H:i:s',
        ],
        'beforeValidationOnUpdate' => [
          'field'  => 'updated',
          'format' => 'Y-m-d H:i:s',
        ],
      ])
    );
  }


  /**
   * validator implementation for version 2.0.18 and higher.
   *
   * @return boolean
   */
  protected function advancedValidation()
  {
    $validator = new Validation();
    $validator->rules('name', [
      new PresenceOf([
        'model' => $this,
      ]),
    ]);
    $validator->rules('role_id', [
      new PresenceOf([
        'model' => $this,
      ]),
    ]);
    $validator->rules('login', [
      new PresenceOf([
        'model' => $this,
      ]),
      new Uniqueness([
        'model' => $this,
        'message' => 'Value of Account Name already exists.',
      ]),
    ]);
    $validator->rules('passwd', [
      new PresenceOf([
        'model' => $this,
      ]),
    ]);
    $validator->rules('email', [
      new PresenceOf([
        'model' => $this,
      ]),
      new Email([
        'model' => $this,
      ]),
    ]);
    $this->validate($validator);
    if (true === $this->validationHasFailed()) {
      return false;
    }
    return true;
  }


  /**
   * validator implementation for version 2.0.18 or lower.
   *
   * @return boolean
   */
  protected function legacyValidation()
  {
    /** @noinspection PhpParamsInspection PhpDeprecationInspection
     *                PhpUnnecessaryFullyQualifiedNameInspection */
    $this->validate(new \Phalcon\Mvc\Model\Validator\PresenceOf([
      'field'    => 'name',
      'required' => true,
    ]));
    /** @noinspection PhpParamsInspection PhpDeprecationInspection
     *                PhpUnnecessaryFullyQualifiedNameInspection */
    $this->validate(new \Phalcon\Mvc\Model\Validator\PresenceOf([
      'field'    => 'role_id',
      'required' => true,
    ]));
    /** @noinspection PhpParamsInspection PhpDeprecationInspection
     *                PhpUnnecessaryFullyQualifiedNameInspection */
    $this->validate(new \Phalcon\Mvc\Model\Validator\PresenceOf([
      'field'    => 'login',
      'required' => true,
    ]));
    /** @noinspection PhpParamsInspection PhpDeprecationInspection
     *                PhpUnnecessaryFullyQualifiedNameInspection */
    $this->validate(new \Phalcon\Mvc\Model\Validator\Uniqueness([
      'field'    => 'login',
      'message'  => 'Value of Account Name already exists.',
    ]));
    /** @noinspection PhpParamsInspection PhpDeprecationInspection
     *                PhpUnnecessaryFullyQualifiedNameInspection */
    $this->validate(new \Phalcon\Mvc\Model\Validator\PresenceOf([
      'field'    => 'passwd',
      'required' => true,
    ]));
    /** @noinspection PhpParamsInspection PhpDeprecationInspection
     *                PhpUnnecessaryFullyQualifiedNameInspection */
    $this->validate(new \Phalcon\Mvc\Model\Validator\Email([
      'field'    => 'email',
      'required' => true,
    ]));
    if (true === $this->validationHasFailed()) {
      return false;
    }
    return true;
  }


  /**
   * returns whether the value is unique or not.
   *
   * @param string $field    the name of column. カラム名
   * @param string $new_name the name to register as login name. ログイン名
   * @return boolean
   */
  public static function isUniqueLogin($field, $new_name)
  {
    if ($field != 'login') {
      return false;
    }
    if (is_null($new_name) || $new_name == '') {
      return false;
    }
    $cond = [
      'conditions' => $field.'=:login:',
      'bind' => ['login' => $new_name]
    ];
    return (User::count($cond) == 1);
  }

}
