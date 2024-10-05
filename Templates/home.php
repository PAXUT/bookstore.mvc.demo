<?php include_once './Templates/inc/header.php'; ?>
<!-- NAVIGATION -->
<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Trang chủ</a></li>
						<li><a href="./index.php?task=allbook">Tất cả sản phẩm >></a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
			<nav id="navigation">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 400px;">
				
			  <ol class="carousel-indicators" >
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			  </ol>
			  <div class="carousel-inner" >
				<div class="item active">
				  <img class="w-100" src="img/book/image1.png" alt="First slide">
				</div>
				<div class="item">
				  <img class="w-100" src="img/book/image3.png" alt="Second slide">
				</div>
				<div class="item">
				  <img class="w-100" src="img/book/image2.png" alt="Third slide">
				</div>
			  </div>
			  </nav>
			</div>
			<style>
			.w-100 {
			width: 100% !important;
			height: 400px !important;
			}
			</style>

		<!-- SECTION -->
		
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img width="200" height="200" src="./img/book/butlongjpg.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Bộ Sưu Tập<br>Sách</h3>
								<a href="./index.php?task=allbook" class="cta-btn">now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img width="200" height="200" src="./img/book/slide2.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Sách<br>Giáo Khoa</h3>
								<a href="./index.php?task=allbook" class="cta-btn">now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img width="200" height="200" src="./img/book/pexels-pixabay-267586.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Kho Sách<br>Cho Bé</h3>
								<a href="./index.php?task=allbook" class="cta-btn"> now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>

	<div class="red" style="background-color: #C92127;padding: 30px;">
		<div class="section" style="background-color: white;border-radius: 30px;">
    	
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12" id="navigation">
						<div class="section-title">
							<h3 class="title">Sách mới</h3>
							
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12 ">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
									<?php 
                    					while ($row = mysqli_fetch_assoc($result)){?>
										<div class="product" style="height: 380px;">
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
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	</div>
		<!-- /SECTION -->

		<!-- SECTION -->
	<div class="green" style="background-color: #26BA7E;padding: 30px;">
		<div class="section" style="background-color: white;border-radius: 30px;">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12" id="navigation">
						<div class="section-title">
							<a href="./index.php?task=allbook"><h3 style="text-decoration: underline" class="title">Tất cả</h3></a>
							
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<?php 
                    					while ($row = mysqli_fetch_assoc($new)){?>
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
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
	<div class="gray" style="background-color: #795548;padding: 30px;">
		<div id="newsletter" class="section" style="background-color: white;border-radius: 30px; margin-top:0">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="https://www.facebook.com/profile.php?id=100021886125871"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<?php include './Templates/inc/footer.php'; ?>
