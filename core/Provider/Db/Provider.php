<?php

namespace Core\Provider\Db;

use Core\Provider\AbstractProvider;
use Core\Worker\Db\Connection;
use Core\Worker\Db\QueryBuilder;

class Provider extends AbstractProvider {

  public $workerName = 'db';
  public $queryBuilder = 'queryBuilder';

  public function init() {
    $instance = new Connection();
    $queryBuilderInstance = new QueryBuilder();

    $this->di->set($this->workerName, $instance);
    $this->di->set($this->queryBuilder, $queryBuilderInstance);
  }
}

?>
