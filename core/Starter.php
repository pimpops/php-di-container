<?php

namespace Core;

class Starter {

  private $di;

  public function __construct($di) {
    $this->di = $di;
  }

  public function run() {

    print_r($this->di);

    $contactBook = $this->di->get('contactBook');
    $messenger = $this->di->get('messenger');

    $list = $contactBook->getList();

    foreach ($list as $contact) {
      echo( $messenger->sendMessage($contact['number']) . '<br>' );
    }
  }
}
?>
