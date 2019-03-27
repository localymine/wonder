<?php

namespace General\Core\Manager\Controllers;


/**
 * Class IndexController
 * @package General\Core\Converter\Controllers
 */
class IndexController  extends ControllerBase
{

  public function indexAction()
  {
    $this->response->redirect('manager/main/index');
  }

}

