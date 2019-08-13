<?php

namespace Core\Worker\Template;

use Core\Worker\Template\Theme;
use Core\DI;

class View {

  public $di;

  protected $theme;
  protected $setting;
  protected $menu;

  public function __construct(DI $di) {
    $this->di = $di;
    $this->theme = new Theme();
    $this->setting = new Setting($di);
    $this->menu = new Menu($di);
  }

  public function render($template, $vars = []) {

    $functionsFile = path('view') . '/themes/default/functions.php';
    if (file_exists($functionsFile)) {
      include $functionsFile;
    }

    $templatePath = path('view') . '/themes/default/' . $template . '.php';

    if (!is_file($templatePath)) {
      throw new \InvalidArgumentException(
        sprintf('Template "%s" not found in "%s"', $template, $templatePath)
      );
    }

    $vars['lang'] = $this->di->get('language');
    $this->theme->setData($vars);
    extract($vars);

    ob_start();
    ob_implicit_flush(0);

    try {
      require $templatePath;
    } catch(\Exception $e) {
      ob_end_clean();
      throw $e;
    }

    echo ob_get_clean();
  }
}

?>
