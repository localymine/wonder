<?php
/**
 * provides Role model entity.
 */
namespace General\Core\Manager\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\Timestampable;
use Phalcon\Mvc\Model\Relation;
use Phalcon\Mvc\Model\Resultset;
use Phalcon\Mvc\Model\ResultsetInterface;


/**
 * class for Camera model Entity.
 *
 * @package General\Core\Manager\Models
 */
class Role extends ModelBase implements ModelInterface
{

  /** @var string define class name. */
  protected $className = 'Role';

  /**
   * primary key.
   * @var integer
   * @Primary
   * @Identity
   * @Column(type="integer", nullable=false)
   */
  public $id;
  /**
   * a name used by system.
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $name;
  /**
   * display name used for human readable.
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $display;
  /**
   * flag indicating whether enabled or not.
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $active;


  /**
   * returns the name of table that persists this model.
   *
   * @return string
   */
  public function getSource()
  {
    return 'roles';
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
      'name'    => 'name',
      'display' => 'display',
      'active'  => 'active',
      'created' => 'created',
      'updated' => 'updated'
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
   * @return Role|ModelBase|Model
   */
  public static function findFirst($parameters = null) {
    return parent::findFirst($parameters);
  }


  /**
   * initialization of instance.
   */
  public function initialize()
  {
    /* enable partial update instead of all-field update. */
    $this->useDynamicUpdate(true);
    /* configure relationship. */
    $this->hasMany('id', User::class, 'role_id', [
      'alias' => 'user',
      'foreignKey' => [
        'message' => 'The Role cannot be deleted because Model User refers it.',
        'action' => Relation::ACTION_RESTRICT,
      ]
    ]);
    $this->hasMany('id', Permission::class, 'role_id', [
      'alias' => 'permission',
      'foreignKey' => [
        'action' => Relation::ACTION_CASCADE
      ]
    ]);
    /* configure model behaviours. */
    $this->addBehavior(
      /* insert timestamp on create / update.*/
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

}
