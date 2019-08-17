<?php

namespace Core\Provider\Plugin;

use Core\Provider\AbstractProvider;
use Core\Worker\Plugin\Plugin;

class Provider extends AbstractProvider {

  public $workerName = 'plugin';

  public function init() {

    $instance = new Plugin($this->di);

    $this->di->set($this->workerName, $instance);
    return $this;
  }
}

?>
