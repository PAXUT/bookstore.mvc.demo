<!DOCTYPE html>
<html lang="en">
  <link href="bootstrap/bootstrap.css" rel="stylesheet" />
  <script src="bootstrap/bootstrap.bundle.js"></script>
  <script src="bootstrap/bootstrap.js"></script>
  <link rel="stylesheet" href="Css/css.css" />
  <link rel="stylesheet" href="fontawesome/css/all.css" />
  <link rel="stylesheet" href="slick/slick-1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="slick/slick-1.8.1/slick/slick-theme.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
    crossorigin="anonymous"
  />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
  /><?php include_once './Templates/inc/header.php'; ?>
  <head> </head>
  <body>
    <div class="bg-light" style="border-top: 2px solid #C92127;">
      <div class="container" >
        <div class="row" style="min-height: 300px; margin-top:30px">
          <div class="col-lg-3">
            <h1>Quản lý</h1>
            <div class="list-group">
              <a class="list-group-item active" href="#">Quản lý người dùng</a>
              <a class="list-group-item" href="index.php?task=listbook">Quản lý sách</a>
              <a class="list-group-item" href="index.php?task=pagebill">Quản lý đơn hàng</a>
            </div>
          </div>
          <div class="col-lg-9">
            <div>
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#listuser"
                    >Danh sách thành viên</a
                  >
                </li>
                
              </ul>
            </div>
            <div class="tab-content">
              <div id="listuser" class=" tab-pane active">
                <!--Danh sach thanh vien-->
                <h3 class="text-center">Danh sách thành viên</h3>
                <div class="">
                  <table class="table">
                    <tr>
                      <th>ID</th>
                      <th>Họ tên</th>
                      <th>Tên đăng nhập</th>
                      <th>Mật khẩu</th>
                      <th>Xóa</th>
                    </tr>
                   <?php
                        while ($row = mysqli_fetch_assoc($listUser)){ ?>
                          <tr>
                            <td><?php echo $row['id_user'] ?></td>
                            <td><?php echo $row['your_name'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td><a class="text-danger" href="index.php?task=deleteuser&iduser=<?php echo $row['id_user'] ?>"><i class="bi bi-trash"></i></a></td>
                          </tr>
                  <?php }; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="bootstrap/jquery-3.3.1.min.js"></script>
    <script src="bootstrap/popper.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
  </body>
</html>
