<?php

namespace Admin\Controller;

use Core\Controller; 
use Core\Worker\Auth\Auth;

class AdminController extends Controller {

  protected $auth;
  public $data;

  public function __construct($di) {

    parent::__construct($di);

    $this->auth = new Auth($di);

    if (!$this->auth->isRole('admin')) {
      header('Location: /admin/login/');
      exit;
    }

    $this->load->model('User');
    $this->data['user'] = $this->model->user->getUserByHash();

    // Load global language
    $this->load->language('dashboard/menu');
  }

  public function logout() {
    $this->auth->unAuthorize();
    header('Location: /admin/login/');
    exit;
  }
}

?>
