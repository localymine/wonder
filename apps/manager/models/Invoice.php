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
class Invoice extends ModelBase implements ModelInterface
{

  /** @var string define class name. */
  protected $className = 'Invoice';

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
   * remarks.
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $remarks;
  /**
   * total_price.
   * @var string
   * @Column(type="integer")
   */
  public $total_price;
  /**
   * status.
   * @var string
   * @Column(type="integer")
   */
  public $status;
  /**
   * deliver.
   * @var string
   * @Column(type="integer")
   */
  public $deliver;
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
    return 'invoices';
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
      'remarks'     => 'remarks',
      'total_price' => 'total_price',
      'status'      => 'status',
      'deliver'     => 'deliver',
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
    $this->hasMany('id', InvoiceDetail::class, 'invoice_id', [
      'alias' => 'invoicedetail',
      'foreignKey' => [
        'message' => $l10n->_('The User cannot be deleted because Model Member refers it.'),
        'action' => Relation::ACTION_RESTRICT,
      ]
    ]);
    $this->hasOne('id', TransportInvoice::class, 'invoice_id', [
      'alias'=>'transportinvoice',
      'foreignKey'=>[
        'action' => Relation::ACTION_CASCADE,
      ],
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
    $validator->rules('user_id', [
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
      'field'    => 'user_id',
      'required' => true,
    ]));
    if (true === $this->validationHasFailed()) {
      return false;
    }
    return true;
  }

}