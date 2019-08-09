<?php

namespace Core;

use Core\Helper\Common;
use Core\Worker\Router\DispatchedRoute;

class Starter {

  private $di;
  public $router;

  public function __construct($di) {
    $this->di = $di;
    $this->router = $this->di->get('router');
  }

  public function run() {

    try {

      require_once __DIR__ . '/../cms/Routes.php';

      $this->router->add('home', '/', 'HomeController:index');
      $this->router->add('news', '/news', 'HomeController:news');
      $this->router->add('product', '/user/12', 'ProductController:index');
      $this->router->add('news_single', '/news/(id:int)', 'HomeController:news');

      $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

      if ($routerDispatch == null) {
        $routerDispatch = new DispatchedRoute('ErrorController:page404');
      }

      list($class, $action) = explode(':', $routerDispatch->getController(), 2);

      $controller = '\\Cms\\Controller\\' . $class;
      $parameters = $routerDispatch->getParameters();

      call_user_func_array([new $controller($this->di), $action], $parameters);

    } catch (\Exception $e) {
      echo $e->getMessage();
      exit;
    }

  }
}

?>
