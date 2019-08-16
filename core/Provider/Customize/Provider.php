<?php

namespace Core\Provider\Customize;

use Core\Provider\AbstractProvider;
use Core\Worker\Customize\Customize;

class Provider extends AbstractProvider {

  public $workerName = 'customize';

  public function init() {
    $instance = new Customize($this->di);
    $this->di->set($this->workerName, $instance);
    return $this;
  }
}

?>
