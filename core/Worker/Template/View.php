<?php

namespace Core\Worker\Template;

use Core\Worker\Template\Theme;

class View {

  protected $theme;
  
  public function __construct() {
    $this->theme = new Theme();
  }

  public function render($template, $vars = []) {
    $env = ENV === 'Site' ? mb_strtolower(ENV) : '';
    $templatePath = ROOT_DIR . '/' . $env .  '/View/themes/default/' . $template . '.php';

    if (!is_file($templatePath)) {
      throw new \InvalidArgumentException(
        sprintf('Template "%s" not found in "%s"', $template, $templatePath)
      );
    }

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
