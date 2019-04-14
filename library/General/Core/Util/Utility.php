<?php
/**
 * provides User model entity.
 */
namespace General\Core\Util;

use General\Core\Manager\Models\Product;
use General\Core\Manager\Models\ProductQuantity;
use Phalcon\Tag;
use Phalcon\Db\Column;
use Phalcon\Di as DependencyInjector;
use Phalcon\Mvc\User\Component;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;
use Phalcon\Mvc\ControllerInterface;


/**
 * class for Camera model Entity.
 *
 * @package General\Core\Manager\Models
 */
class Utility extends Component
{
  /** @var string define class name. */
  protected $className = 'Utility';

  public static function getQuantity($user_id, $product_id, $warehouse_id) {
    $sql  = " SELECT * ";
    $sql .= " FROM products_quantities ";
    $sql .= " WHERE user_id = $user_id AND product_id = $product_id AND warehouse_id = $warehouse_id ";

    $product_quantity = new ProductQuantity();
    $result = new Resultset(
      null,
      $product_quantity,
      $product_quantity->getReadConnection()->query($sql)
    );

    echo $result->quantity;
  }

  public static function str_pad($input, $pad_length = 7, $pad_string = 0, $pad_type = STR_PAD_LEFT) {
    echo str_pad($input, $pad_length, $pad_string, $pad_type);
  }

  public static function image($user_id, $product_id, $image, $options=null) {
    $imgPath = 'user'.DS.sprintf("%07d", $user_id).DS. 'product'.DS.sprintf("%07d", $product_id).DS.$image;
    $rawPath = SKR_UPLOAD_RAW_IMG.DS.$imgPath;
    $pubPath = DS.SKR_UPLOAD_IMG.DS.$imgPath;
    if (file_exists($rawPath)) {
      echo Tag::image([
        'src'   => $pubPath,
        'class' => 'img-responsive',
        'style' => implode(';', $options),
      ]);
    } else {
      echo Tag::image([
        'src'   => SKR_DEFAULT_NO_IMG,
        'class' => 'img-responsive',
      ]);
    }
  }

}