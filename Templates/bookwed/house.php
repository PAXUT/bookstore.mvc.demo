<?php include './Templates/inc/header.php'; ?>
      <!-- End Header -->

      <div id="Home" class="slider">
        <div class="slider-content">
          <h2 class="text-heading" >Sách</h2>
          <div class="text-descripsion"> Cầu nối giữa quá khứ, hiện tại và tương lai.</div>
        </div>
      </div>
      <!-- End Slide -->

      <!-- Content -->
      <div class="flashsale ">
        <div class="background">
          <h1 style="text-align: center;">Sách mới</h1>
          <!-- <h1>FLA<i class="ti-bolt-alt"></i>H SALE:</h1> -->
        </div>
      </div>
      
      <div class="sale">
        <div class="background">
          <div class="line">
          <?php 
            	while ($row = mysqli_fetch_assoc($result)){?>
            <div class="item" style="margin-left: 8px;">
              <a href="./index.php?task=pagedetail&id=<?php echo $row['id_book']; ?>">
              <img width="50px" height="200px" src="img/book/<?php echo $row['img']?>" alt="">
              <div class="item-body">
                <div class="item-title"><h3><?php echo $row['tensach']?></h3></div>
                <div class="item-text"><p>Giá:<?php echo $row['gia']?>đ</p></div>
                <div class="saled"><p>Số lượng: <?php echo $row['soluong']?></p></div></a>
                <div class="btn"><input type="submit" href="" class="btn-insert" value="Thêm Vào giỏ hàng" name="btn-cart"></div>
              </div>
            </div>
            <?php }; ?>

          </div>
        </div>
      </div>

      <div class="content">
        <div class="background">
          <div class="head">
            <a href="./index.php?task=allbook"><h2 style="text-decoration: underline;">Tất cả sản phẩm</h2></a>
          </div>
          <div class="line">
            <div class="item-container">
                <?php while ($row = mysqli_fetch_assoc($new)) { ?>
                    <div class="item" style="margin-left: 8px;">
                        <a href="./index.php?task=pagedetail&id=<?php echo $row['id_book']; ?>">
                            <img width="50px" height="200px" src="img/book/<?php echo $row['img'] ?>" alt="">
                            <div class="item-body">
                                <div class="item-title"><h3><?php echo $row['tensach'] ?></h3></div>
                                <div class="item-text"><p>Giá:<?php echo $row['gia'] ?>đ</p></div>
                                <div class="saled"><p>Số lượng: <?php echo $row['soluong'] ?></p></div>
                                <div class="btn"><input type="submit" href="#" class="btn-insert" value="Thêm Vào giỏ hàng"
                                                        name="insert_cart"></div>
                            </div>
                        </a>
                    </div>
                <?php }; ?>
            </div>
        </div>
            </div>
        </div>
      </div>
      
      <!-- End Content -->

      <!-- Footer -->
      <?php include './Templates/inc/footer.php'; ?>
      <!-- End Footer -->

    </div>    
</body>
</html>