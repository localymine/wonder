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
class ProductIn extends ModelBase implements ModelInterface
{

  /** @var string define class name. */
  protected $className = 'ProductIn';

  /**
   * primary key.
   * @var integer
   * @Primary
   * @Identity
   * @Column(type="integer", nullable=false)
   */
  public $id;
  /**
   * product_id
   * @var string
   * @Column(type="integer", nullable=false)
   */
  public $product_id;
  /**
   * warehouse_id
   * @var string
   * @Column(type="integer", nullable=false)
   */
  public $warehouse_id;
  /**
   * market_price
   * @var integer
   * @Column(type="float", nullable=true)
   */
  public $market_price;
  /**
   * purchase_price
   * @var float
   * @Column(type="float", nullable=true)
   */
  public $purchase_price;
  /**
   * saleprice
   * @var float
   * @Column(type="float", nullable=true)
   */
  public $saleprice;
  /**
   * quantity.
   * @var float
   * @Column(type="float", nullable=false)
   */
  public $quantity;
  /**
   * remarks.
   * @var string
   * @Column(type="string", nullable=true)
   */
  public $remarks;


  /**
   * returns the name of table that persists this model.
   *
   * @return string
   */
  public function getSource()
  {
    return 'product_ins';
  }


  /**
   * returns correspondence table of column names and properties.
   *
   * @return array
   */
  public function columnMap()
  {
    return [
      'id'              => 'id',
      'product_id'      => 'product_id',
      'warehouse_id'    => 'warehouse_id',
      'market_price'    => 'market_price',
      'purchase_price'  => 'purchase_price',
      'saleprice'       => 'saleprice',
      'quantity'        => 'quantity',
      'remarks'         => 'remarks',
      'created'         => 'created',
      'updated'         => 'updated',
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
    $this->belongsTo('product_id', Product::class, 'id', [
      'alias' => 'product'
    ]);
    $this->belongsTo('warehouse_id', Warehouse::class, 'id', [
      'alias' => 'warehouse'
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
    $validator->rules('product_id', [
      new PresenceOf([
        'model' => $this,
      ]),
    ]);
    $validator->rules('quantity', [
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
      'field'    => 'product_id',
      'required' => true,
    ]));
    /** @noinspection PhpParamsInspection PhpDeprecationInspection
     *                PhpUnnecessaryFullyQualifiedNameInspection */
    $this->validate(new \Phalcon\Mvc\Model\Validator\PresenceOf([
      'field'    => 'quantity',
      'required' => true,
    ]));
    if (true === $this->validationHasFailed()) {
      return false;
    }
    return true;
  }

}