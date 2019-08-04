<?php

namespace Core\Provider\Db;

use Core\Provider\AbstractProvider;
use Core\Worker\Db\Connection;

class Provider extends AbstractProvider {

  public $workerName = 'db';

  public function init() {
    $instance = new Connection();

    $this->di->set($this->workerName, $instance);
  }
}

?>
