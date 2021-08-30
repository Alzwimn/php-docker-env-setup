<?php 

namespace mkx\Modules\Payments;


class Gateway {

  private Object $conn;

  public function __construct(Object $conn = null) {
    $this->conn = $conn;
  }

}

?>