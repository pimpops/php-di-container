<?php

namespace Core\Provider\Config;

use Core\Provider\AbstractProvider;
use Core\Worker\Config\Config;

class Provider extends AbstractProvider {

  public $workerName = 'config';

  public function init() {

    $config['main'] = Config::file('main');
    $config['database'] = Config::file('database');

    $this->di->set($this->workerName, $config);
  }
}

?>
