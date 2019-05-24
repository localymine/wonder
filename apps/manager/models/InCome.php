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
use Phalcon\Validation\Validator\PresenceOf;

/**
 * class for Camera model Entity.
 *
 * @package General\Core\Manager\Models
 */
class InCome extends ModelBase implements ModelInterface
{

  /** @var string define class name. */
  protected $className = 'InCome';

  /**
   * primary key.
   * @var integer
   * @Primary
   * @Identity
   * @Column(type="integer", nullable=false)
   */
  public $id;
  /**
   * user_id
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $user_id;
  /**
   * member_id
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $member_id;
  /**
   * type_id
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $type_id;
  /**
   * client name
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $name;
  /**
   * amount
   * @var float
   * @Column(type="float", nullable=false)
   */
  public $amount;
  /**
   * remarks
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $remarks;
  /**
   * exec_date
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $exec_date;
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
    return 'incomes';
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
      'user_id'     => 'user_id',
      'member_id'   => 'member_id',
      'type_id'     => 'type_id',
      'name'        => 'name',
      'amount'      => 'amount',
      'remarks'     => 'remarks',
      'exec_date'   => 'exec_date',
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
    $this->belongsTo('user_id', User::class, 'id', [
      'alias' => 'user'
    ]);
    $this->belongsTo('member_id', Member::class, 'id', [
      'alias' => 'member'
    ]);
    $this->belongsTo('type_id', Type::class, 'id', [
      'alias' => 'type',
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
    return true;
  }


  /**
   * validator implementation for version 2.0.18 or lower.
   *
   * @return boolean
   */
  protected function legacyValidation()
  {
    return true;
  }

}
