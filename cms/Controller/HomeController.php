<?php

namespace Cms\Controller;

class HomeController extends CmsController {

  public function index() {
    echo 'Index page';
  }

  public function news($id) {
    echo $id;
  }

}

?>
