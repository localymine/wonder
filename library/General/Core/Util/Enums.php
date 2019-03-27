<?php
/**
 * provides easy access to correction of Common.
 */
namespace General\Core\Util;

use General\Core\Manager\Models\Brand;
use General\Core\Manager\Models\Category;
use Phalcon\Mvc\User\Component;
use Phalcon\Mvc\Model\ResultsetInterface;


/**
 * utility class that returns specified category from Common table as a Resultset.
 *
 * @package General\Core\Util
 */
class Enums extends Component
{


  /**
   * Status of Invoice
   *
   * @return ResultsetInterface|array
   */
  public function invoiceStatus()
  {
    return [
      0 => 'New',
      1 => 'Waiting', /* hang dang o noi tap trung */
      2 => 'Received', /* noi tap trung hang da nhan duoc hang */
      3 => 'Delivering',  /* da chuyen hang ra khoi nuoc */
      4 => 'Delivered',  /* hang da van chuyen den quoc gia nhan hang va cho chuyen den khach hang */
      5 => 'DeliveringClient',  /* dang chuyen hang den tay khach hang */
      6 => 'Finished',  /* hang da toi tay khach hang */
    ];
  }

  public function transportStatus()
  {
    return [
      0 => 'New',
      1 => 'Finished',  /* hang da toi tay khach hang */
      2 => 'Waiting for Payback',  /* cho tra tien */
    ];
  }

  /**
   * @return \General\Core\Manager\Models\Category
   */
  public function getCategories()
  {
    return Category::find();
  }

  /**
   * @return \General\Core\Manager\Models\Brand
   */
  public function getBrands()
  {
    return Brand::find();
  }

}