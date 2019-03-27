<?php

namespace General\Core\Converter\Controllers;


use Phalcon\Mvc\Controller;
use Phalcon\Tag;
/**
 * @package General\Core\Controllers
 *
 * @property \Phalcon\Translate\Adapter\PeclGettext $l10n
 */

class ControllerBase extends Controller
{
  public function initialize(){
    // set DOCTYPE HTML5
    Tag::setDocType(Tag::HTML5);
    // initialize parameters
    $this->persistent->{'parameters'} = null;
    Tag::setTitle($this->l10n->_(SKR_APPNAME));
  }

}