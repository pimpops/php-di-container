<?php

namespace Core\Worker\ContactBook;

class ContactBook {
  
  private $contactList = [
    ["name" => "Anna", "number" => "234234234"],
    ["name" => "Gleg", "number" => "234dfdf234234"]
  ]; 

  public function getList() {
    return $this->contactList; 
  }
}

?>
