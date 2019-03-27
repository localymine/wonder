<?php
/**
 * defines common methods all of models.
 * すべてのMVCモデルが継承するメソッドインターフェイスを定義する
 */
namespace General\Core\Manager\Models;


/**
 * Interface ModelInterface
 *
 * @package Coolrevo\Smc\Servicer\Models
 */
interface ModelInterface extends \Phalcon\Mvc\ModelInterface
{

  /**
   * returns correspondence table of column names and properties.
   * カラム名のマッピングを返す
   * @return array
   */
  public function columnMap();

}