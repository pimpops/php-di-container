<?php

namespace Admin\Controller;

use \Core\Controller;
use \Core\DI;
use \Core\Worker\Auth\Auth;

class LoginController extends Controller {

  protected $auth;

  public function __construct(DI $di) {

    parent::__construct($di);

    $this->auth = new Auth($di);

    if ($this->auth->isRole('admin')) {
      header('Location: /admin/');
      exit;
    }
  }

  public function form() {
    $this->view->render('login');
  }

  public function authAdmin() {

    $params = $this->request->post;

    $query = $this->db->query('
      SELECT *
      FROM `user`
      WHERE email="' . $params['email'] . '"
      AND password="' . md5($params['password']) . '"
      LIMIT 1
    ');

    if (!empty($query)) {

      $user = $query[0];

      if ($user->role == 'admin') {

        $hash = md5($user->id . $user->email . $user->password . $this->auth->salt()); 

        $this->db->execute('
          UPDATE user
          SET hash="' . $hash . '"
          WHERE id=' . $user->id . '
        ');

        $this->auth->authorize($hash);
      }

    } 
  
    header('Location: /admin/login/');
    exit;
  }
}

?>
