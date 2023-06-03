<?php
// include '../lib/session.php';
include 'lib/session.php';
Session::checkLogin();
include 'lib/database.php';
include 'helpers/format.php';
?>
<?php
class Login
{
  private $db;
  private $fm;
  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }
  public function login_email($email, $password)
  {
    $email = $this->fm->validation($email);
    $password = $this->fm->validation($password);
    $err = [];
    if (empty($email) || empty($password)) {
      if (empty($email)) {
        $err['email'] = 'Bạn chưa nhập email';
      }
      if (empty($password)) {
        $err['password'] = 'Bạn chưa nhập password';
      }
      return $err;
    } else {
      $query = "SELECT * FROM customer WHERE email = '$email'";
      $result = $this->db->select($query);
      if ($result != false) {
        $value = $result->fetch_assoc();
        $checkPass = password_verify($password, $value['password']);
        if ($checkPass) {
          Session::set('customer', true);
          Session::set('customer_email', $value['email']);
          header('location: user.php');
        } else {
          $err['password'] = 'Mật khẩu không đúng!';
        }
      } else {
        $err['email'] = 'Email chưa được đăng ký!';
      }
      return $err;
    }
  }
}