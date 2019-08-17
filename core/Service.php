<?php

namespace Core;

use Core\Worker\Db\Connection;
use Core\DI;

abstract class Service {

    protected $di;
    protected $db;
    protected $load;
    protected $model;

    public function __construct(DI $di) {
        $this->di    = $di;
        $this->db    = $this->di->get('db');
        $this->load  = $this->di->get('load');
        $this->model = $this->di->get('model');
    }

    public function getDI() {
        return $this->di;
    }

    public function getDb() {
        return $this->db;
    }

    public function getLoad() {
        return $this->load;
    }

    public function getModel($name) {
        $this->load->model(ucfirst($name), false, 'Admin');
        $model = $this->getDI()->get('model');
        return $model->{lcfirst($name)};
    }
}
