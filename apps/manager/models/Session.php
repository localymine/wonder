<?php
/**
 * provides Session model entity.
 */
namespace General\Core\Manager\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\Timestampable;
use Phalcon\Mvc\Model\Resultset;
use Phalcon\Mvc\Model\ResultsetInterface;


/**
 * class for Session model Entity.
 *
 * @package General\Core\Manager\Models
 */
class Session extends ModelBase implements ModelInterface
{

  /** @var string define class name. */
  protected $className = 'Session';

  /**
   * sessionid as primary key.
   * @var string
   * @Primary
   * @Identity
   * @Column(type="string", nullable=false)
   */
  public $session_id;
  /**
   * data storage for sessionid
   * @var string
   * @Column(type="string")
   */
  public $data;


  /**
   * returns the name of table that persists this model.
   *
   * @return string
   */
  public function getSource()
  {
    return 'sessions';
  }


  /**
   * returns correspondence table of column names and properties.
   *
   * @return array
   */
  public function columnMap()
  {
    return [
      'session_id' => 'session_id',
      'data'       => 'data',
      'created'    => 'created',
      'updated'    => 'updated',
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
   * @return Session|ModelBase|Model
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
    /* configure model behaviours. */
    $this->addBehavior(
      /* insert timestamp on create / update. */
      new Timestampable([
        'beforeValidationOnCreate' => [
          'field' => [
            'created',
            'updated',
          ],
          'format' => 'U',
        ],
        'beforeValidationOnUpdate' => [
          'field'  => 'updated',
          'format' => 'U',
        ],
      ])
    );
  }

}
