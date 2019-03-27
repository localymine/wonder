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
class Transport extends ModelBase implements ModelInterface
{

  /** @var string define class name. */
  protected $className = 'Transport';

  /**
   * primary key.
   * @var integer
   * @Primary
   * @Identity
   * @Column(type="integer", nullable=false)
   */
  public $id;
  /**
   * id of user.
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $user_id;
  /**
   * id of client.
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $client_id;
  /**
   * client name
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $name;
  /**
   * profit.
   * @var string
   * @Column(type="integer")
   */
  public $profit;
  /**
   * total.
   * @var string
   * @Column(type="integer")
   */
  public $total;
  /**
   * increment.
   * @var string
   * @Column(type="integer")
   */
  public $increment;
  /**
   * rate.
   * @var string
   * @Column(type="integer")
   */
  public $rate;
  /**
   * total of invoice with exchange rate.
   * @var string
   * @Column(type="integer")
   */
  public $total_rate;
  /**
   * remarks.
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $remarks;
  /**
   * status.
   * @var string
   * @Column(type="integer")
   */
  public $status;
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
    return 'transports';
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
      'client_id'   => 'client_id',
      'name'        => 'name',
      'profit'      => 'profit',
      'total'       => 'total',
      'increment'   => 'increment',
      'rate'        => 'rate',
      'total_rate'  => 'total_rate',
      'remarks'     => 'remarks',
      'status'      => 'status',
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
    $this->belongsTo('client_id', Client::class, 'id', [
      'alias' => 'client'
    ]);
    $this->hasMany('id', OtherCost::class, 'transport_id', [
      'alias' => 'othercost',
      'foreignKey' => [
        'message' => $l10n->_('The User cannot be deleted because Model Member refers it.'),
        'action' => Relation::ACTION_RESTRICT,
      ]
    ]);
    $this->hasMany('id', TransportInvoice::class, 'transport_id', [
      'alias' => 'transportinvoice',
      'foreignKey' => [
        'message' => $l10n->_('The User cannot be deleted because Model Tranport refers it.'),
        'action' => Relation::ACTION_RESTRICT,
      ]
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
    $validator->rules('rate', [
      new PresenceOf([
        'model' => $this,
      ]),
    ]);
    $validator->rules('user_id', [
      new PresenceOf([
        'model' => $this,
      ]),
    ]);
    $validator->rules('client_id', [
      new PresenceOf([
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
      'field'    => 'rate',
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
    $this->validate(new \Phalcon\Mvc\Model\Validator\PresenceOf([
      'field'    => 'client_id',
      'required' => true,
    ]));
    if (true === $this->validationHasFailed()) {
      return false;
    }
    return true;
  }

}