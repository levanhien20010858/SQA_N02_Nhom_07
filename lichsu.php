<?php
ini_set('display_errors', 'Off');
ini_set('error_reporting', E_ALL);
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
?>
<?php
include 'lib/session.php';
include 'classes/lichsu.php';
Session::checkSession();
$class = new Lichsu();
$data = $class->data();
if (!empty($data)) {
  if (isset($_POST['submitForm1'])) {
    $array = $_POST['mang-gia-tri'];
    $class->drop($array);
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Thuế thu nhập cá nhân</title>
  <!-- MDB icon -->
  <link rel="icon" href="https://gudlogo.com/wp-content/uploads/2019/05/logo-con-meo-24.gif" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <link rel="stylesheet" href="lichsu.css" />
  <style>
    .navbar {
      --mdb-navbar-hover-color: rgb(62, 112, 195);
    }
  </style>
</head>

<body>
  <div class="nhom7">
    <nav class="nhom7-header navbar navbar-expand-lg navbar-light bg-light">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar brand -->
          <a class="navbar-brand mt-2 mt-lg-0" href="#">
            <img src="https://gudlogo.com/wp-content/uploads/2019/05/logo-chim-cu-meo-16-300x225.jpg" height="40" alt="Logo" loading="lazy" style="transform: scale(1.5); padding-left: 15px" />
          </a>

          <!-- Left links me-auto-->
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="user.php">Trang chủ</a>
            </li>
          </ul>
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="lichsu.php" style="color: rgb(62, 112, 195)">Lịch sử</a>
            </li>
          </ul>
          <!-- Left links -->
        </div>
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fa-regular fa-user fa-beat"></i>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="?action=logout">Logout</a></li>
            <?php if (isset($_GET['action']) && $_GET['action'] == 'logout') {
              Session::destroy();
            } ?>
            <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
          </ul>
        </div>

        </ul>
      </div>
      <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
  <!-- End your project here-->
  <div class="nhom7-content">
    <div class="danhsach-header">
      <div class="aaa">
        <input type="checkbox" class="form-check-input" id="masterCheckbox" />
        <label for="masterCheckbox">Tất cả</label>
      </div>
      <form action="" method="post">
        <input type="hidden" name="mang-gia-tri" id="hidden">
        <button type="submit" name="submitForm1">Xóa</button>
      </form>

    </div>
    <div class="nhom7-content-danhsach">
      <div class="list-group list-group-light">

        <?php if (!empty($data)) { ?>
          <?php foreach ($data as $key => $value) { ?>
            <li class="list-group-item">
              <input class="form-check-input" type="checkbox" value="" id="<?php echo $value["id"] ?>" />
              <label class="form-check-label" for="<?php echo $value["id"] ?>">Thời gian:
                <?php echo $value["thoigian"] ?></label>
              <p>Tổng thu nhập: <?php echo $value["tongthunhap"] ?></p>
              <p>Số người phụ thuộc: <?php echo $value["songuoiphuthuoc"] ?></p>
              <p>Thuế phải nộp: <?php echo $value["thuephainop"] ?></p>
            </li>
          <?php } ?>
        <?php } else { ?>
          <p>Không có dữ liệu.</p>
        <?php } ?>


      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4">
      <!-- Section: Text -->
      <div class="accordion accordion-borderless" id="accordionFlushExampleX">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOneX">
            <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseOneX" aria-expanded="true" aria-controls="flush-collapseOneX">
              © 2023 Copyright: Lê Văn Hiển
            </button>
          </h2>
          <div id="flush-collapseOneX" class="accordion-collapse collapse" aria-labelledby="flush-headingOneX" data-mdb-parent="#accordionFlushExampleX">
            <div class="accordion-body">
              <!-- Section: Social media -->
              <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
              </section>
              <!-- Section: Social media -->
            </div>
          </div>
        </div>
      </div>
      <!-- <section class="mb-4">
            <p>© 2023 Copyright: Lê Văn Hiển</p>
          </section> -->

      <!-- Section: Text -->
    </div>
    <!-- Grid container -->
  </footer>
  <!-- Footer -->
  </div>
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>
<script>
  // Lấy ra checkbox trên cùng và tất cả các checkbox phụ
  const masterCheckbox = document.getElementById("masterCheckbox");
  const subCheckboxes = document.getElementsByClassName("form-check-input");
  let selectedValues = [];
  // Khi checkbox trên cùng được thay đổi trạng thái
  masterCheckbox.addEventListener("change", function() {
    // Lặp qua tất cả checkbox phụ và thiết lập trạng thái của chúng giống với checkbox trên cùng
    for (let i = 0; i < subCheckboxes.length; i++) {
      subCheckboxes[i].checked = masterCheckbox.checked;
      if (selectedValues.includes(i)) {
        // Giá trị 'giatri' tồn tại trong mảng selectedValues
        var index = selectedValues.indexOf(i);
        if (index !== -1) {
          selectedValues.splice(index, 1);
        }
      } else {
        // Giá trị 'giatri' không tồn tại trong mảng selectedValues
        selectedValues.push(i);
      }

    }

  });

  // Khi một checkbox phụ được thay đổi trạng thái
  for (let i = 0; i < subCheckboxes.length; i++) {
    subCheckboxes[i].addEventListener("change", function() {
      // Kiểm tra xem tất cả các checkbox phụ có được chọn hay không
      let allChecked = true;
      if (selectedValues.includes(i)) {
        // Giá trị 'giatri' tồn tại trong mảng selectedValues
        var index = selectedValues.indexOf(i);
        if (index !== -1) {
          selectedValues.splice(index, 1);
        }
      } else {
        // Giá trị 'giatri' không tồn tại trong mảng selectedValues
        selectedValues.push(i);
      }

      for (let j = 0; j < subCheckboxes.length; j++) {
        if (!subCheckboxes[j].checked) {
          allChecked = false;
          break;
        }
      }

      // Thiết lập trạng thái của checkbox trên cùng dựa trên kết quả trên
      masterCheckbox.checked = allChecked;
      if (masterCheckbox.checked == true) {
        for (let j = 1; j < selectedValues.length; j++) {
          if (!selectedValues.includes(j)) {
            selectedValues.push(j);
          }
        }
      }
      document.getElementById("hidden").value = selectedValues;

    });
  }
</script>