<?php

namespace Admin\Controller;

class DashboardController extends AdminController {

  public function index() {

    $this->load->model('User');

    print_r($this->model->user->getUsers());

    $this->view->render('dashboard');
  }
}

?>
