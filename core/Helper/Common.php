<?php

namespace Core\Helper;

class Common {

  public static function getMethod() {
    return $_SERVER['REQUEST_METHOD'];
  }

  public static function getPathUrl() {
    $pathUrl = $_SERVER['REQUEST_URI'];

    if ($position = strpos($pathUrl, '?')) {
      $pathUrl = substr($pathUrl, 0, $position);
    }

    return $pathUrl;
  }

}

?>
