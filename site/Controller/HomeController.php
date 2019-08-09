<?php

namespace Site\Controller;

class HomeController extends SiteController {

  public function index() {
    $data = ['name' => 'Andrii'];
    $this->view->render('index', $data);
  }

  public function news($id) {
    echo $id;
  }

}

?>
