<?php
include 'lib/session.php';
Session::checkSession();
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
  <link rel="stylesheet" href="user.css" />
  <style>
  .navbar {
    --mdb-navbar-hover-color: rgb(62, 112, 195);
  }
  </style>
</head>

<body>
  <div class="nhom7">
    <!-- Modal -->

    <!-- Navbar -->
    <nav class="nhom7-header navbar navbar-expand-lg navbar-light bg-light">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
          data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar brand -->
          <a class="navbar-brand mt-2 mt-lg-0" href="#">
            <img src="https://gudlogo.com/wp-content/uploads/2019/05/logo-chim-cu-meo-16-300x225.jpg" height="40"
              alt="Logo" loading="lazy" style="transform: scale(1.5); padding-left: 15px" />
          </a>

          <!-- Left links me-auto-->
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="user.php" style="color: rgb(62, 112, 195)">Trang chủ</a>
            </li>
          </ul>
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="lichsu.html">Lịch sử</a>
            </li>
          </ul>
          <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->

        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
            data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fa-regular fa-user fa-beat"></i>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="?action=logout">Logout</a></li>
            <?php if (isset($_GET['action']) && $_GET['action'] == 'logout') {
              Session::destroy();
            } ?>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>
        <!-- Right elements -->
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    <!-- End your project here-->
    <div class="nhom7-content">
      <header class="nhom7-content-header">
        <h1>HỆ THỐNG TÍNH THUẾ THU NHẬP CÁ NHÂN</h1>
        <p>
          Chỉ cần điền Tổng thu nhập, bạn sẽ biết ngay mức thuế TNCN phải nộp
        </p>
      </header>
      <div class="nhom7-tinhthue">
        <div class="nhom7-tinhthue-left">
          <div class="nhom7-form-group">
            <label class="nhom7-thue-label" style="padding-right: 65px">
              <img class="nhom7-image" src="https://luatvietnam.vn/assets/images/money2.svg" alt="" />
              Tổng thu nhập:
            </label>
            <div class="nhom7-thue-input"><input type="text" /></div>
          </div>
          <div class="nhom7-form-group">
            <label class="nhom7-thue-label" style="padding-right: 30px">
              <img class="nhom7-image" src="https://luatvietnam.vn/assets/images/child.svg" alt="" />
              Số người phụ thuộc:
            </label>
            <div class="nhom7-thue-input"><input type="text" /></div>
          </div>
          <div class="nhom7-form-group">
            <label class="nhom7-thue-label">
              <img class="nhom7-image" src="https://luatvietnam.vn/assets/images/money.svg" alt="" />
              Thuế TNCN phải nộp:
            </label>
            <div class="nhom7-thue-input">
              <span id="thue-phai-nop">1000000</span>
              VNĐ
            </div>
          </div>
          <div class="nhom7-luu-kq">
            <button class="nhom7-luu-kq-p" id="ghi-ket-qua" onclick="toggleClass()">
              Ghi kết quả
            </button>
          </div>
        </div>
        <div class="nhom7-tinhthue-right">
          <p style="color: red">Ghi chú:</p>
          <p>
            -
            <span>(*)</span>
            <strong>Tổng thu nhập: </strong>
            gồm lương tháng (đã trừ bảo hiểm bắt buộc) và thưởng)
          </p>
          <p>- Áp dụng đối với tổng thu nhập từ tiền lương, tiền công</p>
          <p>
            - Áp dụng đối với người nhận lương net (lương nhận được đã trừ bảo
            hiểm 10.5%)
          </p>
        </div>
      </div>
      <div class="nhom7-ket-qua hide" id="ket-qua" style="height: 250px">
        <div class="nhom7-xacnhan-luu" style="width: 800px; height: 100%">
          &nbsp;
          <div class="nhom7-form-group1">
            <label class="nhom7-thue-label" style="padding-right: 65px">
              Tổng thu nhập:
            </label>
            <div class="nhom7-thue-input">maksvmaskm</div>
          </div>
          <div class="nhom7-form-group1">
            <label class="nhom7-thue-label" style="padding-right: 30px">
              Số người phụ thuộc:
            </label>
            <div class="nhom7-thue-input">ạdiaidj</div>
          </div>
          <div class="nhom7-form-group1">
            <label class="nhom7-thue-label"> Thuế TNCN phải nộp: </label>
            <div class="nhom7-thue-input">
              <span id="thue-phai-nop">1000000</span>
              VNĐ
            </div>
          </div>
          <button type="submit" style="width: 75px">Lưu</button>
        </div>
      </div>
      <div class="nhom7-dien-giai">
        <div class="nhom7-diengiai-title">
          <p>Diễn giải cách tính thuế TNCN:</p>
        </div>
        <div class="nhom7-diengiai-body">
          <p>
            Với tổng thu nhập <strong>0</strong> bạn chưa phải đóng thuế thu
            nhập cá nhân
          </p>
          <p>Thuế thu nhập cá nhân = <strong>0</strong></p>
        </div>
      </div>
      <div class="nhom7-table-thue-content">
        <div class="nhom7-table-thue">
          <h4 class="nhom7-table-h4">Bảng thu nhập tính thuế và thuế suất</h4>
          <div class="table-thue-body">
            <table class="nhom7-table-table">
              <thead>
                <tr>
                  <th>Bậc</th>
                  <th>Thu nhập tính thuế/tháng (triệu đồng)</th>
                  <th>Thuế suất</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Đến 05</td>
                  <td>5%</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Trên 05 đến 10</td>
                  <td>10%</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Trên 10 đến 18</td>
                  <td>15%</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Trên 18 đến 32</td>
                  <td>20%</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Trên 32 đến 52</td>
                  <td>25%</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Trên 52 đến 80</td>
                  <td>30%</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Trên 80</td>
                  <td>35%</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="nhom7-table-thue-hd">
          <strong>Văn bản căn cứ:</strong>
          <p>
            1.
            <a href="https://luatvietnam.vn/thue/luat-thue-thu-nhap-ca-nhan-2007-33914-d1.html"
              title="Luật Thuế TNCN năm 2007" target="_blank">Luật Thuế TNCN năm 2007</a>
          </p>
          <p>
            2.
            <a href="https://luatvietnam.vn/thue/luat-sua-doi-bo-sung-luat-thue-thu-nhap-ca-nhan-2012-75403-d1.html"
              title="Luật sửa đổi, bổ sung Luật thuế thu nhập cá nhân năm 2012" target="_blank">Luật sửa đổi, bổ sung
              Luật thuế thu nhập cá nhân năm 2012</a>
          </p>
          <p>
            3.
            <a href="https://luatvietnam.vn/thue/thong-tu-111-2013-tt-btc-thue-thu-nhap-ca-nhan-80846-d1.html"
              title="Thông tư 111/2013/TT-BTC" target="_blank">Thông tư 111/2013/TT-BTC</a>
          </p>
          <p>
            4.
            <a href="https://luatvietnam.vn/thue/nghi-quyet-954-2020-ubtvqh14-ve-tang-muc-giam-tru-gia-canh-184207-d1.html"
              title="Nghị quyết 954/2020/UBTVQH14" target="_blank">Nghị quyết 954/2020/UBTVQH14</a>
          </p>
        </div>
      </div>
      <div class="nhom7-title-1">
        <h6>Lưu ý:</h6>
      </div>
      <div class="nhom7-title-2">
        <p>
          Thu nhập tính thuế không phải tổng thu nhập mà người lao động nhận
          được.
        </p>
      </div>
    </div>
    <!-- Footer -->
    <footer class="bg-dark text-center text-white">
      <!-- Grid container -->
      <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
          <!-- Facebook -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
              class="fab fa-facebook-f"></i></a>

          <!-- Github -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
        </section>
        <!-- Section: Social media -->

        <!-- Section: Text -->
        <section class="mb-4">
          <p>© 2023 Copyright: Lê Văn Hiển</p>
        </section>

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
function toggleClass() {
  var element = document.querySelector(".nhom7-ket-qua");
  element.classList.toggle("hide");
}
</script>