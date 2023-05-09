<?php

class CustomerModel extends Database implements IModel
{
  public function getAll()
  {
    $queryPhone = $this->db->prepare("SELECT * from customers");
    $queryPhone->execute();
    return $queryPhone->fetchAll();
  }
  public function getByID($id)
  {
    $queryPhone = $this->db->prepare("SELECT * from customers WHERE customer_name =  " . $id);
    $queryPhone->execute();
    return $queryPhone->fetchAll();
  }

  public function update($var = null)
  {
    # code...
  }

  public function delete($var = null)
  {
    # code...
  }

  public function insert($data)
  {
    $query = $this->db->prepare("INSERT into customers(id_phone, name_phone, brand_phone)
    values (:id_phone, :name_phone, :brand_phone)");
    $query->bindParam(":id_phone", uniqid('', true));
    $query->bindParam(":name_phone", $data['name_phone']);
    $query->bindParam(":brand_phone", $data['brand_phone']);
    $query->execute();
    return $query->rowCount();
  }
}
