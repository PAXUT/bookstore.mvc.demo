
	<?php foreach ($data as $product) { ?>
		<title>Sách <?php echo $product['tensach']?></title>

 		

		<?php include './Templates/inc/header.php'; ?>
	<body>
		

		
		
		<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 ">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="./img/book/<?php echo $product['img']?>" alt="">
							</div>

							
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  ">
						
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<form action="" method="post">
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name" style="font-size: 30px;"><?php echo $product['tensach']?></h2>
							
							<div>
								<h3 class="product-price">Giá: <?php echo $product['gia']?>đ</h3><br>
								<span class="product-available" style="margin-left: 0;">Còn trong kho: <?php echo $product['soluong']?></span>
							</div>
							

							

							<div class="add-to-cart">
								<div class="qty-label">
									Số lượng
									<div class="input-number">
                    				<input type="hidden" value="<?php echo $product['id_book'] ?>" name="id">
									<!-- <input type="hidden" value="<?php echo $_SESSION['id_user'] ?>" name="iduser"> -->
									<input id="quantity" type="number" class="buyfield" name="quantity" value="1" min="1" />
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
									</div>
								</div>
								<button class="add-to-cart-btn" name="btn-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
								
							</div>

							

							<ul class="product-links" >
								<li style="font-size: 15px;">Tác giả:</li>
								<li><a href="#"><?php echo $product['tacgia']?></a></li><br>
								<li style="font-size: 15px;">Thể loại:</li>
								<li><a href="#"><?php echo $product['theloai']?></a></li><br>
								<li style="font-size: 15px;">Nhà xuất bản:</li>
								<li><a href="#"><?php echo $product['nhaxuatban']?></a></li><br>
							</ul>

							

						</div>
					</div>
					
					<!-- /Product details -->
					<div class="col-md-12">
						<div id="product-tab">
						<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Giới thiệu</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
										<p><?php echo $product['des']?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><?php } ?>

					</form>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
			<!-- container -->
			<div class="ad"style="background-color: #26BA7E;padding: 30px ;">
			<div class="container" style="padding-bottom: 40px;background-color: white;border-radius: 30px; width:auto">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title" style="text-decoration: underline">Liên quan</h3>
						</div>
					</div>
					<!-- product -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<?php 
                    					while ($row = mysqli_fetch_assoc($result)){?>
										<div class="product" style="height: 400px;">
											<a href="./index.php?task=pagedetail&id=<?php echo $row['id_book']; ?>">
											<div class="product-img">
												<img width="50px" height="230px" src="img/book/<?php echo $row['img']?>" alt="">
												<div class="product-label">
													<!-- <span class="sale">-30%</span> -->
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body" >
												<h3 class="product-name" ><a href="./index.php?task=pagedetail&id=<?php echo $row['id_book']; ?>"><?php echo $row['tensach']?></a></h3>
												<h4 class="product-price">Giá: <?php echo $row['gia']?>đ</h4>
												<h4 class="">Số lượng: <?php echo $row['soluong']?>đ</h4>
											</div>
											</a>
										</div>
										
									<?php }; ?>
										<!-- /product -->

									</div>
					
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /product -->
				
				<!-- /row -->
			</div></div>
			<!-- /container -->
		</div>
		<!-- /Section -->


		<!-- FOOTER -->
		<?php include './Templates/inc/footer.php'; ?>
