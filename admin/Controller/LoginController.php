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

    $sql = $this->queryBuilder
      ->select()
      ->from('user')
      ->where('email', $params['email'])
      ->where('password', md5($params['password']))
      ->limit(1)
      ->sql();

    $query = $this->db->query($sql, $this->queryBuilder->values);

    if (!empty($query)) {

      $user = $query[0];

      if ($user->role == 'admin') {

        $hash = md5($user->id . $user->email . $user->password . $this->auth->salt());

        $sql = $this->queryBuilder
          ->update('user')
          ->set(['hash' => $hash])
          ->where('id', $user->id)
          ->sql();

        $this->db->execute($sql, $this->queryBuilder->values);

        $this->auth->authorize($hash);
      }

    }

    header('Location: /admin/login/');
    exit;
  }
}

?>
