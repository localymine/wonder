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
class ProductQuantity extends ModelBase implements ModelInterface
{

  /** @var string define class name. */
  protected $className = 'ProductQuantity';

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
   * @Identity
   * @Column(type="integer", nullable=false)
   */
  public $user_id;
  /**
   * product_id
   * @var integer
   * @Identity
   * @Column(type="integer", nullable=false)
   */
  public $product_id;
  /**
   * warehouse_id
   * @var integer
   * @Identity
   * @Column(type="integer", nullable=false)
   */
  public $warehouse_id;
  /**
   * quantity
   * @var integer
   * @Identity
   * @Column(type="integer", nullable=false)
   */
  public $quantity;


  /**
   * returns the name of table that persists this model.
   *
   * @return string
   */
  public function getSource()
  {
    return 'products_quantities';
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
      'product_id'  => 'product_id',
      'warehouse_id'=> 'warehouse_id',
      'quantity'    => 'quantity',
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
    $this->belongsTo('product_id', Product::class, 'id', [
      'alias' => 'product'
    ]);
    $this->belongsTo('warehouse_id', Warehouse::class, 'id', [
      'alias' => 'warehouse'
    ]);
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