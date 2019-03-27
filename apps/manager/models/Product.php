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
class Product extends ModelBase implements ModelInterface
{

  /** @var string define class name. */
  protected $className = 'Product';

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
   * client name
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $name;
  /**
   * price.
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $price;
  /**
   * quantity.
   * @var integer
   * @Column(type="integer")
   */
  public $quantity;
  /**
   * product size.
   * @var string
   * @Column(type="string")
   */
  public $size;
  /**
   * product unit.
   * @var string
   * @Column(type="string")
   */
  public $unit;
  /**
   * product image.
   * @var string
   * @Column(type="string")
   */
  public $image;
  /**
   * category_id.
   * @var integer
   * @Column(type="integer")
   */
  public $category_id;
  /**
   * trademark.
   * @var integer
   * @Column(type="integer")
   */
  public $brand_id;
  /**
   * remarks.
   * @var string
   * @Column(type="string", nullable=false)
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
    return 'products';
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
      'name'        => 'name',
      'size'        => 'size',
      'unit'        => 'unit',
      'price'       => 'price',
      'quantity'    => 'quantity',
      'image'       => 'image',
      'category_id' => 'category_id',
      'brand_id'    => 'brand_id',
      'remarks'     => 'remarks',
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
    $this->belongsTo('category_id', Category::class, 'id', [
      'alias' => 'category'
    ]);
    $this->belongsTo('brand_id', Brand::class, 'id', [
      'alias' => 'brand'
    ]);
    $this->hasMany('id', ProductQuantity::class, 'product_id', [
      'alias' => 'productquantity',
      'foreignKey' => [
        'message' => $l10n->_('The User cannot be deleted because Model Member refers it.'),
        'action' => Relation::ACTION_RESTRICT,
      ]
    ]);
    $this->hasMany('id', InvoiceDetail::class, 'product_id', [
      'alias' => 'invoicedetail',
      'foreignKey' => [
        'message' => $l10n->_('The User cannot be deleted because Model Member refers it.'),
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
    $validator->rules('user_id', [
      new PresenceOf([
        'model' => $this,
      ]),
    ]);
    $validator->rules('name', [
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
      'field'    => 'user_id',
      'required' => true,
    ]));
    if (true === $this->validationHasFailed()) {
      return false;
    }
    return true;
  }

}