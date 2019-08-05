<?php

namespace Core;

use Core\Helper\Common;

class Starter {

  private $di;
  public $router;

  public function __construct($di) {
    $this->di = $di;
    $this->router = $this->di->get('router');
  }

  public function run() {

    $this->router->add('home', '/', 'HomeController:index');
    $this->router->add('product', '/user/12', 'ProductController:index');

    $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

    print_r($routerDispatch);
  }
}

?>
