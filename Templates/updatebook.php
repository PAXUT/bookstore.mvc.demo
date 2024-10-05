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
              <a class="list-group-item active" href="index.php?task=listbook">Quản lý sách</a>
              <a class="list-group-item" href="index.php?task=pagebill">Quản lý đơn hàng</a>
            </div>
          </div>
          <div class="col-lg-9">
            
              <div id="addbook" class=" tab-pane active">
                <!--Them thanh vien-->
                <h3 class="text-center">Cập nhật thông tin sách</h3>
                <form method="POST" action="" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="">Tên sách</label>
                    <input type="hidden" name="idan" value="<?=$result['id_book']?>">
                    <input
                      class="form-control"
                      type="text"
                      name="tensach"
                      value="<?=$result['tensach'] ?>"
                    />
                  </div>
                  <div class="form-group">
                    <label for="">Hình ảnh</label>
                    <img src="img/book/<?php echo $result['img'] ?>"width="90px">
                    <input
                      class="form-control"
                      type="file"
                      name="img"
                    />
                    <input type="hidden" name="oldImage" value="<?php echo $result['img']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Tên tác giả</label>
                    <input
                      class="form-control"
                      type="text"
                      name="tacgia"
                      value="<?=$result['tacgia'] ?>"
                    />
                  </div>
                  <div class="form-group">
                    <label for="">Thể loại</label>
                    <input
                      class="form-control"
                      type="text"
                      name="theloai"
                      value="<?=$result['theloai'] ?>"
                    />
                  </div>
                  <div class="form-group">
                    <label for="">Giá</label>
                    <input
                      class="form-control"
                      type="text"
                      name="gia"
                      value="<?=$result['gia'] ?>"
                    />
                  </div>
                  <div class="form-group">
                    <label for="">Nhà xuất bản</label>
                    <input
                      class="form-control"
                      type="text"
                      name="nhaxuatban"
                      value="<?=$result['nhaxuatban'] ?>"
                    />
                  </div>
                  <div class="form-group">
                    <label for="">Số lượng</label>
                    <input
                      class="form-control"
                      type="number"
                      name="soluong"
                      value="<?=$result['soluong'] ?>"
                      min="1"
                    />
                  </div>
                  <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="des" class="form-control" cols="10" rows="10"><?=$result['des'] ?></textarea>
                    <!-- <input
                      class="form-control"
                      type="text"
                      name="des"
                      value="<?=$result['des'] ?>"
                    /> -->
                  </div>
                  <div class="insert">
                    <input
                      type="submit"
                      class="btn btn-primary "
                      name="updatebook"
                      value="Lưu"
                      style="margin-top: 25px;"
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
    <style>
        .insert{
            text-align: center;
        }
    </style>
  </body>
</html>