<?php

namespace Core\Provider\Request;

use Core\Provider\AbstractProvider;
use Core\Worker\Request\Request;

class Provider extends AbstractProvider {

  public $workerName = 'request';

  public function init() {
    $instance = new Request();

    $this->di->set($this->workerName, $instance);
  }
}

?>
