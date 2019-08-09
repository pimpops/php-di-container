<?php

namespace Core\Worker\Template;

class View {
  
  public function __construct() {

  }

  public function render($template, $vars = []) {
    $templatePath = ROOT_DIR . '/cms/View/themes/default/' . $template . '.php';

    if (!is_file($templatePath)) {
      throw new \InvalidArgumentException(
        sprintf('Template "%s" not found in "%s"', $template, $templatePath)
      );
    }

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
