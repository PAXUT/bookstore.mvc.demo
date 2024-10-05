
<!DOCTYPE html>
<html lang="en">

<link href="bootstrap/bootstrap.css" rel="stylesheet">
<script src="bootstrap/bootstrap.bundle.js"></script>
<script src="bootstrap/bootstrap.js"></script>
<link rel="stylesheet" href="Css/css.css">
<link rel="stylesheet" href="fontawesome/css/all.css">
<link rel="stylesheet" href="slick/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" href="slick/slick-1.8.1/slick/slick-theme.css">
<head><?php include './Templates/inc/header.php'; ?>
</head>
<body>
<nav>
</nav>
<div class="bg-light mb-5">
    <div class="container" style="height: 100%; min-height: 400px; margin-top:120px">
        <div style="border-bottom: 2px solid black;" class="mb-4">
            <p class="t-tittle">Giỏ hàng (<?php foreach($countcart as $count) {
                        echo $count['countcart'];
                } ;?> Sản phẩm)</p>
        </div>
        <form action="" method="POST">
            <div class="row mx-auto">
                <table class="table ">
                    <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Chọn</th>
                    </tr><?php {} ?>
                    <?php
                    $total = 0;$i=1;
                     ?>
                    <?php if(!empty($showcart)){ 
                            foreach($showcart as $row){
                                 
                        ?>
                        <tr>
                                <td>
                                    <?php  echo $i++ ?>
                                    <input type="hidden" name="idc" value="<?php echo $id_cart = $row['id_cart']; ?>" >
                                </td>
                                <td>
                                    <img width="auto" height="100px" src="./img/book/<?php echo $row['img']; ?>" alt="">
                                </td>
                                <td>
                                    <?php echo $row['tensach']; ?>
                                </td>
                                <td>
                                    <?php echo $row['gia']; ?>
                                </td>
                                <td>
                                    <?php echo $row['quantity']; ?>
                                </td>
                                <td>
                                    <?php
                                        $_SESSION['sub_total'] = $row['gia'] * $row['quantity'];
                                        echo number_format($_SESSION['sub_total'],0,'.','.');
                                    ?>
                                </td>
                                <td>
                                    <a class="text-danger" onclick="return confirm('Are you want to delete?')" href="?task=del_cart&id=<?php echo $row['id_cart'] ?>">Xóa</a>
                                </td>
                            </tr>
                            <?php
                        $total += $row['gia'] * $row['quantity'];
                        $_SESSION['total'] = $total;
                    }
                    } ?>
                   
                </table>
                <div class="font-weight-bold">
                    <?php
                        echo "Tổng tiền: ".number_format($total,0,'.','.')." VNĐ";
                    ?>
                </div>
            </div>
            <div><input class="btn btn-danger float-right" type="submit" name="payment" value="Thanh toán"></div>
        </form>
    </div>
</div>
<footer>
</footer>
<script>
    $("input[name='quantity']").TouchSpin({
        initval: 1,
        min: 1,
        max: 20
    });
</script>
</body>

</html><?php include './Templates/inc/footer.php'; ?>