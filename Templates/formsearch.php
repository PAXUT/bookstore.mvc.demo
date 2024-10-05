<!DOCTYPE html>
<html lang="en">

<link href="bootstrap/bootstrap.css" rel="stylesheet">
<script src="bootstrap/bootstrap.bundle.js"></script>
<script src="bootstrap/bootstrap.js"></script>
<link rel="stylesheet" href="Css/css.css">
<link rel="stylesheet" href="fontawesome/css/all.css">
<link rel="stylesheet" href="slick/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" href="slick/slick-1.8.1/slick/slick-theme.css">

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<head>
</head><?php include_once './Templates/inc/header.php'; ?>
<body>
<nav>
</nav>
<div class="bg-light">
    <div class="container">
        <div style="text-align: center;border-bottom: 2px solid black;" class="mb-4">
            <p class="t-tittle">KẾT QUẢ TÌM KIẾM</p>
        </div>
        <div class="row mx-auto">
            
            <table class="table w-100">
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sách</th>
                        <th>Tên tác giả</th>
                        <th>Giá</th>
                    </tr>
                   <?php
                                if (isset($result) && mysqli_num_rows($result)>0){
                                    while ($row = mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                        <td><a href="index.php?task=pagedetail&id=<?php echo $row['id_book']; ?>"><img width="90px" height="90px" src="img/book/<?php echo $row['img']?>" alt=""></a></td>
                                        <td><?php echo $row['tensach'] ?></td>
                                        <td><?php echo $row['tacgia'] ?></td>
                                        <td><?php echo $row['gia']."VND";?></td>
                                    </tr>
                                <?php }; ?>
                                <?php }else{ ?>
                <p class="alert alert-danger text-center">Không tìm thấy kết quả nào !</p>
            <?php } ?>
                  </table>
        </div>
        <h4 style="text-align: center;">---------------- Hết ----------------</h4>
    </div>
</div>

</body>
</html>