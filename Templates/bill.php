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
    <div class="bg-light"style="border-top: 2px solid #C92127;">
      <div class="container">
        <div class="row " style="min-height: 300px;margin-top:30px">
          <div class="col-lg-3">
            <h1>Quản lý</h1>
            <div class="list-group">
              <a class="list-group-item" href="index.php?task=pageuser">Quản lý người dùng</a>
              <a class="list-group-item " href="index.php?task=listbook">Quản lý sách</a>
              <a class="list-group-item active" href="#">Quản lý đơn hàng</a>
            </div>
          </div>
          <div class="col-lg-9">
            <div>
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="index.php?task=listbook"
                    >Danh sách sách</a
                  >
                </li>
                
              </ul>
            </div>
            <div class="tab-content">
              <div id="listbook" class=" tab-pane active">
                <!--Danh sach thanh vien-->
                <h3 class="text-center">Danh sách sách</h3>
                <div class="text-center">
                  <table class="table text-center w-100">
                    <tr>
                      <th>ID</th>
                      <th>Tên sách</th>
                      <th>Hình ảnh</th>
                      <th>Tên khách hàng</th>
                      <th>Giá</th>
                      <th>Số lượng</th>
                      <th>SĐT</th>
                      <th>Địa chỉ</th>
                      <th>Tổng giá</th>
                      <th>phương thức thanh toán</th>
                      <th>Hủy</th>
                    </tr>
                   <?php
                   $i=1;
                                while ($row = mysqli_fetch_assoc($listBill)){ ?>
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><?php echo $row['tensach'] ?></td>
                                        <td><img width="90px" height="90px" src="img/book/<?php echo $row['img']?>" alt=""></td>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['gia'] ?>VND</td>
                                        <td><?php echo $row['quantity'];?></td>
                                        <td><?php echo $row['sdt'] ?></td>
                                        <td><?php echo $row['diachi'] ?></td>
                                        <td><?php echo $row['sub_total'] ?></td>
                                        <td><?php echo $row['phuongthuc'] ?></td>
                                        <td><a class="text-danger" onclick="return confirm('Are you want to delete?')" href="index.php?task=deleteorderbill&idorder=<?php echo $row['id_order'] ?>"><i class="bi bi-trash"></i></a></td>
                                    </tr>
                                <?php }; ?>
                  </table>
                </div>
              </div>
              <div id="addbook" class="container tab-pane fade">
                <!--Them thanh vien-->
                <h3 class="text-center">Thêm thành viên</h3>
                <form method="POST" action="" >
                  <div class="form-group">
                    <label for="">Tên Người Dùng</label>
                    <input
                      class="form-control"
                      type="text"
                      name="name"
                      placeholder="Tên người dùng"
                    />
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input
                      class="form-control"
                      type="email"
                      name="email"
                      placeholder="Email"
                    />
                  </div>
                  <div class="form-group">
                    <label for="">Số Điện Thoại</label>
                    <input
                      class="form-control"
                      type="number"
                      name="phone"
                      placeholder="Số điện thoại"
                    />
                  </div>
                  <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input
                      class="form-control"
                      type="password"
                      name="password"
                      placeholder="Mật khẩu"
                    />
                  </div>
                  <div class="form-group">
                    <label for="">Nhập Lại Mật khẩu</label>
                    <input
                      class="form-control"
                      type="password"
                      name="repassword"
                      placeholder="Nhập lại mật khẩu"
                    />
                  </div>
                  <div>
                    <input
                      type="submit"
                      class="btn btn-primary"
                      name="register"
                      value="Thêm thành viên"
                    />
                  </div>
                </form>
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
