<?php

namespace Admin\Model\User;

use \Core\Model;

class UserRepository extends Model {

  public function getUsers() {

    $sql = $this->queryBuilder
      ->select()
      ->from('user')
      ->orderBy('id', 'DESC')
      ->sql();

    return $this->db->query($sql);
  }

  public function test() {
    $user = new User(1);
    $user->setEmail('admin@admin.com');
    $user->save();
  }

  public function newUser() {
    $user = new User;
    $user->setEmail('admin2@admin.com');
    $user->setPassword(md5(2222));
    $user->setRole('user');
    $user->setHash('new');
    $user->save();
  }
}

?>
