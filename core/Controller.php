<?php

namespace Core;

use Core\DI;

abstract class Controller {

  protected $di;
  protected $db;
  protected $view;
  protected $config;
  protected $request;
  protected $queryBuilder;
  protected $load;
  protected $plugin;

  public function __construct(DI $di) {
    $this->di = $di;

    $this->initVars();
  }

  public function __get($key) {
    return $this->di->get($key);
  }

  public function initVars() {

    $vars = array_keys(get_object_vars($this));

    foreach ($vars as $var) {
      if ($this->di->has($var)) {
        $this->{$var} = $this->di->get($var);
      }
    }

    return $this;
  }

  public function getRequest() {
    return $this->request;
  }

  public function getPlugin() {
    return $this->plugin;
  }
}
?>
