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
class InvoiceDetail extends ModelBase implements ModelInterface
{

  /** @var string define class name. */
  protected $className = 'InvoiceDetail';

  /**
   * primary key.
   * @var integer
   * @Primary
   * @Identity
   * @Column(type="integer", nullable=false)
   */
  public $id;
  /**
   * id of client.
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $client_id;
  /**
   * invoice_id.
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $invoice_id;
  /**
   * id of product_id.
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $product_id;
  /**
   * client price
   * @var string
   * @Column(type="float", nullable=false)
   */
  public $price;
  /**
   * quantity.
   * @var string
   * @Column(type="integer")
   */
  public $quantity;
  /**
   * remarks.
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $remarks;


  /**
   * returns the name of table that persists this model.
   *
   * @return string
   */
  public function getSource()
  {
    return 'invoices_details';
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
      'client_id'   => 'client_id',
      'invoice_id'  => 'invoice_id',
      'product_id'  => 'product_id',
      'price'       => 'price',
      'quantity'    => 'quantity',
      'remarks'     => 'remarks',
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
    $this->belongsTo('invoice_id', Invoice::class, 'id', [
      'alias' => 'invoice'
    ]);
    $this->belongsTo('client_id', Client::class, 'id', [
      'alias' => 'client'
    ]);
    $this->belongsTo('product_id', Product::class, 'id', [
      'alias' => 'product'
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
    $validator->rules('client_id', [
      new PresenceOf([
        'model' => $this,
      ]),
    ]);
    $validator->rules('invoice_id', [
      new PresenceOf([
        'model' => $this,
      ]),
    ]);
    $validator->rules('product_id', [
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
      'field'    => 'client_id',
      'required' => true,
    ]));
    /** @noinspection PhpParamsInspection PhpDeprecationInspection
     *                PhpUnnecessaryFullyQualifiedNameInspection */
    $this->validate(new \Phalcon\Mvc\Model\Validator\PresenceOf([
      'field'    => 'invoice_id',
      'required' => true,
    ]));
    /** @noinspection PhpParamsInspection PhpDeprecationInspection
     *                PhpUnnecessaryFullyQualifiedNameInspection */
    $this->validate(new \Phalcon\Mvc\Model\Validator\PresenceOf([
      'field'    => 'product_id',
      'required' => true,
    ]));
    if (true === $this->validationHasFailed()) {
      return false;
    }
    return true;
  }

}