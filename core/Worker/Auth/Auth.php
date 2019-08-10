<?php

namespace Core\Worker\Auth;

use Core\Helper\Cookie;

class Auth {

  protected $di;
  protected $db;
  protected $queryBuilder;

  public function __construct($di) {
    $this->di = $di;
    $this->db = $this->di->get('db');
    $this->queryBuilder = $this->di->get('queryBuilder');
  }

  public function isRole($role = 'admin') {

    $user_hash = Cookie::get('user_hash');

    if ($user_hash !== null) {

      $sql = $this->queryBuilder
        ->select()
        ->from('user')
        ->where('hash', $user_hash)
        ->limit(1)
        ->sql();

      $query = $this->db->query($sql, $this->queryBuilder->values);

      if (!empty($query)) {
        $user = $query[0];
        if ($user->role == $role) {
          return true;
        }
      }
    }

    return false;
  }

  public function authorize($hash_user) {
    Cookie::set('user_hash', $hash_user);
  }

  public function unAuthorize() {
    Cookie::delete('user_hash');
  }

  public static function salt() {
    return (string) rand(10000000, 99999999);
  }

  public static function encryptPassword($password, $salt = '') {
    return hash('sha256', $password . $salt);
  }
}

?>
