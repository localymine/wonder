<?php
/**
 * Model Adapter extended to hold filter parameters.
 * フィルタパラメータを保持可能なページネーション
 */
namespace General\Core\Paginator;

use Phalcon\Mvc\Model\Resultset;
use Phalcon\Paginator\Adapter\Model as ModelAdapter;


/**
 * class of Paginator that was extended to hold filter parameters.
 *
 * @package Coolrevo\Smc\Paginator
 */
class ModelFilter extends ModelAdapter
{

  /**
   * flag that indicates whether the data is filtered or not.
   * @var bool
   */
  protected $_filtered = false;

  /**
   * placeholder to save query string to filter.
   * @var string
   */
  protected $_queryParam = '';

  /**
   * class constructor
   *
   * @param array $config
   */
  public function __construct(array $config) {
    parent::__construct($config);
    if (isset($config['query']) && !empty($config['query'])) {
      if (isset($config['query']['_url'])) {
        unset($config['query']['_url']);
      }
      if (isset($config['query']['page'])) {
        unset($config['query']['page']);
      }
      if (isset($config['query']['limit'])) {
        unset($config['query']['limit']);
      }
      $this->_queryParam = http_build_query($config['query']);
      if (!empty($config['query'])) {
        $this->_filtered  = true;
      }
    }
  }


  /**
   * returns extended Paginator, which has extra data.
   *
   * @return \stdClass
   */
  public function getPaginate() {
    $page = parent::getPaginate();
    $page->query = $this->_queryParam;
    $page->filtered = $this->_filtered;

    return $page;
  }

}
