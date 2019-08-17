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

      $this->initPlugins();
      $this->initRoutes();
      
    } catch (\Exception $e) {
      echo $e->getMessage();
      exit;
    }

  }

  public function initPlugins() {

    $pluginService = $this->di->get('plugin');
    $plugins = $pluginService->getActivePlugins();

    foreach ($plugins as $plugin) {

        $pluginClass  = '\\Site\\Plugin\\' . $plugin->directory . '\\Plugin';
        $pluginObject = new $pluginClass($this->di);

        if (method_exists($pluginClass, 'init')) {
            $pluginObject->init();
        }
    }
  }

  public function initRoutes() {
      require_once __DIR__ . '/../' . mb_strtolower(ENV) . '/Routes.php';

      $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

      if ($routerDispatch == null) {
        $routerDispatch = new DispatchedRoute('ErrorController:page404');
      }

      list($class, $action) = explode(':', $routerDispatch->getController(), 2);

      $controller = '\\' . ENV .  '\\Controller\\' . $class;
      $parameters = $routerDispatch->getParameters();

      call_user_func_array([new $controller($this->di), $action], $parameters);
  }
}

?>
