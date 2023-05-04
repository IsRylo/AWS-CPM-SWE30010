<?php

class PhoneModel extends Database
{
  public function getAllPhone()
  {
    $queryPhone = $this->db->prepare("SELECT * from phone");
    $queryPhone->execute();
    return $queryPhone->fetchAll();
  }
  public function insertPhone($data)
  {
    $query = $this->db->prepare("INSERT into phone(id_phone, name_phone, brand_phone)
    values (:id_phone, :name_phone, :brand_phone)");
    $query->bindParam(":id_phone", uniqid('', true));
    $query->bindParam(":name_phone", $data['name_phone']);
    $query->bindParam(":brand_phone", $data['brand_phone']);
    $query->execute();
    return $query->rowCount();
  }
}
