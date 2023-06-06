<?php
include 'lib/database.php';
?>
<?php

class Lichsu
{
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }
  public function getid($email)
  {
    $query = "SELECT `id` FROM `customer` WHERE customer.email = '$email' ";
    $result = $this->db->select($query);
    if ($result) {
      $row = $result->fetch_assoc();
      return $row['id'];
    } else {
      return null;
    }
  }
  public function data()
  {
    $email = Session::get('customer_email');
    $id = $this->getid($email);
    $sql = "SELECT `id`, `customer_id`, `tongthunhap`, `songuoiphuthuoc`, `thuephainop`, `thoigian` FROM `history` WHERE history.customer_id = $id";
    $result = $this->db->select($sql);
    return $result;
  }
  public function drop($array)
  {
    $array = explode(",", $array);
    for ($j = 0; $j < sizeof($array); $j++) {
      $sql = "DELETE FROM `history` WHERE history.id = $array[$j]";
      $result = $this->db->delete($sql);
    }
    return $result;
  }
}
?>