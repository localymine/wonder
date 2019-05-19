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
class Member extends ModelBase implements ModelInterface
{

  /** @var string define class name. */
  protected $className = 'Client';

  /**
   * primary key.
   * @var integer
   * @Primary
   * @Identity
   * @Column(type="integer", nullable=false)
   */
  public $id;
  /**
   * id of this user.
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $user_id;
  /**
   * client name
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $name;
  /**
   * first email.
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $email;
  /**
   * last phone.
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $phone;
  /**
   * login.
   * @var string
   * @Column(type="string")
   */
  public $login;
  /**
   * password.
   * @var string
   * @Column(type="string")
   */
  public $password;
  /**
   * remarks.
   * @var string
   * @Column(type="string")
   */
  public $remarks;
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
    return 'members';
  }


  /**
   * returns correspondence table of column names and properties.
   *
   * @return array
   */
  public function columnMap()
  {
    return [
      'id'      => 'id',
      'user_id' => 'user_id',
      'name'    => 'name',
      'email'   => 'email',
      'phone'   => 'phone',
      'login'   => 'login',
      'password'=> 'password',
      'remarks' => 'remarks',
      'disabled'=> 'disabled',
      'created' => 'created',
      'updated' => 'updated',
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
    $this->belongsTo('user_id', User::class, 'id', [
      'alias' => 'user'
    ]);
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
    $validator->rules('user_id', [
      new PresenceOf([
        'model' => $this,
      ]),
    ]);
    $validator->rules('email', [
      new Email([
        'model' => $this,
        'allowEmpty' => true,
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
      'field'    => 'user_id',
      'required' => true,
    ]));
    /** @noinspection PhpParamsInspection PhpDeprecationInspection
     *                PhpUnnecessaryFullyQualifiedNameInspection */
    $this->validate(new \Phalcon\Mvc\Model\Validator\Email([
      'field'    => 'email',
      'allowEmpty' => true,
    ]));
    if (true === $this->validationHasFailed()) {
      return false;
    }
    return true;
  }

}