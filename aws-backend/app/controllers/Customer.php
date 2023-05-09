<?php

class Customer extends Controller
{  
  public function __construct() {
  }

  public function authenticate($username, $password)
  {
    $this->setModel("CustomerModel");
    $data = $this->model->getByID($username);
    if (!isset($data)) return false;
    if ($data['customer_pass'] == $password) {
      $_SESSION["id"] = $data['customer_ID'];
    }
  }

  public function register($data)
  {
    $this->setModel("CustomerModel");
    $this->model->insert($data);
  }

  public function getTransactionRecord()
  {
    $this->model;
  }
}
