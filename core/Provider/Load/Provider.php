<?php

namespace Core\Provider\Load;

use Core\Provider\AbstractProvider;
use Core\Worker\Load\Load;

class Provider extends AbstractProvider {

  public $workerName = 'load';

  public function init() {
    $instance = new Load();

    $this->di->set($this->workerName, $instance);
  }
}

?>
