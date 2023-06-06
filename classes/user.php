<?php
include 'lib/database.php';
include 'helpers/format.php';
include 'lib/session.php';
Session::checkSession();
date_default_timezone_set("Asia/Ho_Chi_Minh");
class User
{
  private $db;
  private $fm;
  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
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
  public function addh($tongthunhap, $songuoiphuthuoc, $thuephainop, $email)
  {
    $tongthunhap = $this->fm->validation($tongthunhap);
    $songuoiphuthuoc = $this->fm->validation($songuoiphuthuoc);
    $thuephainop = $this->fm->validation($thuephainop);
    $email = $this->fm->validation($email);
    $id = $this->getid($email);
    $created_at = date("Y-m-d H:i:s");
    $query = "INSERT INTO history(customer_id,tongthunhap,songuoiphuthuoc,thuephainop,thoigian) VALUES ('$id','$tongthunhap','$songuoiphuthuoc','$thuephainop','$created_at')";
    $result = $this->db->update($query);
    if ($result) {
      echo '<script language="javascript">
          alert("Lưu thành công");
          </script>';
    }
    return $id;
  }
}
