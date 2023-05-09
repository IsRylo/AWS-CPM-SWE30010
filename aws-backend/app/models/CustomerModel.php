<?php

class CustomerModel extends Database implements IModel
{
  public function getAll()
  {
    $query = $this->db->prepare("SELECT * from customers");
    $query->execute();
    return $query->fetchAll();
  }

  // Get customer detail based on username
  public function getByID($id)
  {
    $query = $this->db->prepare("SELECT * from customers WHERE customer_name=:name");
    $query->bindParam(":name", $id);
    $query->execute();
    return $query->fetchAll()[0];
  }

  public function update($data)
  {
    $query = $this->db->prepare("UPDATE customers
    SET (customer_ID=:id, customer_name=:name, customer_pass=:password, customer_email=:email, manager_assigned=:manager_ID)");
    // $query->bindParam(":id_phone", uniqid('', true));
    $query->bindParam(":id", $data['customer_id']);
    $query->bindParam(":name", $data['username']);
    $query->bindParam(":password", $data['password']);
    $query->bindParam(":email", $data['email']);
    $query->bindParam(":manager_ID", $data['manager_assgined']);
    $query->execute();
    return $query->rowCount();
  }

  public function delete($var = null)
  {
    # code...
  }

  public function insert($data)
  {
    $query = $this->db->prepare("INSERT into customers(customer_ID, customer_Name, customer_pass, customer_email)
    values (:id, :name, :password, :email)");
    $data['customer_id'] = hash("sha256", uniqid('', true));
    // var_dump($data);
    // return;
    $query->bindParam(":id", $data['customer_id'] );
    $query->bindParam(":name", $data['customer_name']);
    $query->bindParam(":password", $data['customer_pass']);
    $query->bindParam(":email", $data['customer_email']);
    $query->execute();
    return $query->rowCount();
  }
}
