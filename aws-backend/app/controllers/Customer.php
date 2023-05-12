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

  public function delete($id)
  {
    if (isset($_SESSION['user'])){
      $this->setModel("CustomerModel");
      $result = $this->model->delete($id);
      echo json_encode(["result" => $result]);
    }
  }
}
