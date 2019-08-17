<?php

namespace Core;

use Core\Worker\Db\Connection;
use Core\Worker\Router\Router;
use Core\DI;

abstract class Plugin {

    protected $di;
    protected $db;
    protected $router;

    public function __construct(DI $di) {
        $this->di     = $di;
        $this->db     = $this->di->get('db');
        $this->router = $this->di->get('router');
        $this->customize = $this->di->get('customize');
    }

    abstract public function details();

    public function getDI() {
        return $this->di;
    }

    public function getDb() {
        return $this->db;
    }

    public function getRouter() {
        return $this->router;
    }
}
