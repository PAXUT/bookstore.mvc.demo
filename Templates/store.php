<?php include_once './Templates/inc/header.php'; ?>

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li ><a href="./index.php?task=pagehome">Trang chủ</a></li>
						<li class="active"><a href="#">Tất cả sản phẩm >></a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="re" style="background-color: #C92127;padding: 30px ;">
			<div class="container" style="background-color: white;border-radius: 30px; width:auto">
				<!-- row -->
					<!-- STORE -->
					<div id="store" class="col-md-9" style="width:100%">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									<h4 style="text-decoration: underline">Tất cả:</h4>
								</label>
							</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<!-- product --><?php 
								while ($row = mysqli_fetch_assoc($listbook)){?>
								<a href="./index.php?task=pagedetail&id=<?php echo $row['id_book']; ?>">
							<div class="col-md-4 col-xs-6" style="width: 25%">
								<div class="product" style="height: 400px;">
									<div class="product-img">
										<img width="50px" height="230px" src="img/book/<?php echo $row['img']?>" alt="">
										
									</div>
									<div class="product-body" >
										<h3 class="product-name" ><?php echo $row['tensach']?></h3>
										<h4 class="product-price">Giá: <?php echo $row['gia']?>đ</h4>
										<h4 class="">Số lượng: <?php echo $row['soluong']?>đ</h4>
									</div>
									
								</div></a>
							</div><?php }; ?>

            
							<!-- /product -->
							
							
							<!-- /product -->
						</div>
						<h4 style="text-align: center;">------Hết------</h4>
						<!-- /store products -->

						<!-- store bottom filter -->
						
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				
				<!-- /row -->
			</div></div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
	
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<?php include './Templates/inc/footer.php'; ?>
