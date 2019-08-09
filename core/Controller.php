<?php

namespace Core;

use Core\DI;

abstract class Controller {

  protected $di;
  protected $view;

  public function __construct(DI $di) {
    $this->di = $di;
    $this->view = $this->di->get('view');
  }
}
?>
