<?php

namespace Core\Helper;

class Common {

  function getMethod() {
    return $_SERVER['REQUEST_METHOD'];
  }

  function getPathUrl() {
    $pathUrl = $_SERVER['REQUEST_URI'];

    if ($position = strpos($pathUrl, '?')) {
      $pathUrl = substr($pathUrl, 0, $position);
    }

    return $pathUrl;
  }

}

?>
