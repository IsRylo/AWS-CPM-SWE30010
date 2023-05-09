<?php

class Customer extends Controller
{  
  public function __construct() {
  }

  public function authenticate($username, $password)
  {
    $this->setModel("CustomerModel");
    $data = $this->model->getByID($username);
    if (isset($data) && $data['customer_pass'] == $password) {
      $_SESSION["user"] = $data;
      return true;
    }
    return false;
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
