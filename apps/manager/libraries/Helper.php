<?php
/**
 * provides utility functions for Array modification.
 */
namespace General\Core\Manager\Components;


/**
 * Utility of Array modification.
 * @package General\Core\Manager\Components
 */
class Helper
{

  /**
   * Make an N-dimensional Array a 1-dimensional Array.
   *
   * returns bool if argument is not an Array.
   *
   * @param array $array An array to be converted.
   * @return array|bool
   */
  public static function array_flatten($array) {
    if (!is_array($array)) {
      return FALSE;
    }
    $result = array();
    foreach ($array as $key => $value) {
      if (is_array($value)) {
        $result = array_merge($result, self::array_flatten($value));
      }
      else {
        $result[$key] = $value;
      }
    }
    return $result;
  }
}