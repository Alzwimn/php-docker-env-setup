<?php 

namespace mkx;

class Person {

  private string $name;
  private int $age;

  public function __construct (string $name, int $age) {
    $this->name = $name;
    $this->age = $age;
  }

  public function getName() {
    return $this->name;
  }

  public function getAge() {
    return $this->age;
  }
}


?>