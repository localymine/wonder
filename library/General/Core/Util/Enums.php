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
      0 => 'Unpaid',
      1 => 'Paid',
    ];
  }

  public function transportStatus()
  {
    return [
      0 => 'New', /* dong thung dat tai nha */
      1 => 'Transport Service', /* phia transport service dang giu hang */
      2 => 'Gathering Place', /* kien hang dang o noi tap trung */
      3 => 'On Air',  /* hang dang tren may bay */
      4 => 'Landing',  /* hang da ha canh tai diem den */
      5 => 'Delivering',  /* hang dang van chuyen ve nha */
      6 => 'Finished',  /* hang da toi tay khach hang */
    ];
  }

  public function clientType()
  {
    return [
      0 => 'Retail',
      1 => 'Wholesale',
      2 => 'Transporter',
    ];
  }

  /**
   * @return \General\Core\Manager\Models\Category
   */
  public function getCategories()
  {
    $cond = [
      'order' => 'name'
    ];
    return Category::find($cond);
  }

  /**
   * @return \General\Core\Manager\Models\Brand
   */
  public function getBrands()
  {
    $cond = [
      'order' => 'name'
    ];
    return Brand::find($cond);
  }

}