<?php
/**
 * provides Permission model entity.
 */
namespace General\Core\Manager\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset;
use Phalcon\Mvc\Model\ResultsetInterface;


/**
 * class for Permission model Entity.
 *
 * @package General\Core\Manager\Models
 */
class Permission extends ModelBase implements ModelInterface
{

  /** @var string define class name. */
  protected $className = 'Permission';

  /**
   * primary key.
   * @var integer
   * @Primary
   * @Identity
   * @Column(type="integer", nullable=false)
   */
  public $id;
  /**
   * users role as a Access Request Object.
   * @var integer
   * @Column(type="integer", nullable=false)
   */
  public $role_id;
  /**
   * controller name as a Access Control Object.
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $resource;
  /**
   * action name as a Access Control Object.
   * ACOのアクション部分
   * @var string
   * @Column(type="string", nullable=false)
   */
  public $action;


  /**
   * returns the name of table that persists this model.
   *
   * @return string
   */
  public function getSource()
  {
    return 'permissions';
  }


  /**
   * returns correspondence table of column names and properties.
   *
   * @return array
   */
  public function columnMap()
  {
    return [
      'id'       => 'id',
      'role_id'  => 'role_id',
      'resource' => 'resource',
      'action'   => 'action'
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
   * @return Permission|ModelBase|Model
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
    $this->belongsTo('role_id', Role::class, 'id', [
      'alias' => 'role'
    ]);
  }

}
