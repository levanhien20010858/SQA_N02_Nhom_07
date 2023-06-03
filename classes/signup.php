<?php
class Signup
{
  private $db;
  private $fm;
  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }
  public function check_email($email)
  {
    $email = $this->fm->validation($email);
    $query = "SELECT * FROM customer WHERE email = '$email'";
    $result = $this->db->select($query);
    if ($result != false) {
      $result = true;
      return $result;
    }
    return $result;
  }
  public function signup_email($name, $email, $password, $rpassword)
  {
    $name = $this->fm->validation($name);
    $email = $this->fm->validation($email);
    $password = $this->fm->validation($password);
    $rpassword = $this->fm->validation($rpassword);
    $err1 = [];
    if (empty($name) || empty($email) || empty($password) || empty($rpassword)) {
      if (empty($name)) {
        $err1['name'] = 'Bạn chưa nhập Username!';
      }
      if (empty($email)) {
        $err1['email'] = 'Bạn chưa nhập email!';
      }
      if (empty($password)) {
        $err1['password'] = 'Bạn chưa nhập password!';
      }
      if (empty($rpassword)) {
        $err1['rpassword'] = 'Bạn chưa nhập password xác nhận!';
      }
      return $err1;
    } else {
      if ($password == $rpassword) {
        $check = $this->check_email($email);
        if ($check != false) {
          $err1['email'] = 'Email đã được đăng ký!';
        } else {

          $pass = password_hash($password, PASSWORD_DEFAULT);
          $query = "INSERT INTO customer(fullname,email,password) VALUES ('$name','$email','$pass')";
          $result = $this->db->insert($query);
          if ($result) {
            echo '<script language="javascript">
                alert("Đăng ký thành công");
                </script>';
          }
        }
      } else {
        $err1['rpassword'] = 'Password xác nhận chưa chính xác!';
      }
      return $err1;
    }
  }
}
