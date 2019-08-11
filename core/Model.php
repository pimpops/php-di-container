<?php

namespace Core;

use \Core\DI;

abstract class Model {

  protected $di;
  protected $db;
  protected $config;
  protected $queryBuilder;
  protected $model;

  public function __construct(DI $di) {
    $this->di = $di;
    $this->db = $this->di->get('db');
    $this->config = $this->di->get('config');
    $this->queryBuilder = $this->di->get('queryBuilder');
    $this->model = $this->di->get('model');
  }
}
