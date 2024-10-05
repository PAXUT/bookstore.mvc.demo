<?php 
// if (!isset($_SESSION['username'])) {	
// 		header("location:index.php?task=pagelogin");	
//     } 

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Nhà sách trực tuyến</title>
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link rel="shortcut icon" type="image/x-icon" href="img/book/icon/books_1f4da.ico">
    
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> 0386 956 434</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> dtc21h4802010515@ictu.edu.vn</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> truong270103@gmail.com</a></li>
					</ul>
					<ul class="header-links pull-right">
						<?php if (isset($_SESSION['username'])){?>
                      
                		<li><a class="login" href="./index.php?task=logout">Đăng xuất</a></li>
                  
						<?php }?>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-search">
								<a href="./index.php?task=pagehome" class="logo">
									<h1 style="position: absolute; color: #C92127; margin: 0 !important ; font-family: 'Courier New', Courier, monospace;">BookStore<span >.</span>Demo</h1>
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search" style="text-align: center;">
								<form action="" method="post">
									<input name="text_search" class="input input-select" placeholder="Search">
									<button name="search" class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn" >
								
								<!-- Cart -->
								<div class="dropdown">
									<?php if (isset($_SESSION['username'])){
											if ($_SESSION['type'] ==0){ ?>
											
									<?php   }elseif ($_SESSION['type']==1){ ?>
											<a href="./index.php?task=cart" class="dropdown-toggle" >
											<i class="fa fa-shopping-cart"></i>
											<span>Your Cart</span>
											<div class="qty"><?php $row = mysqli_fetch_assoc($countcart); echo $row['countcart'] ?></div>
										<?php }?>
									<?php }else{ ?>
										<a href="./index.php?task=cart" class="dropdown-toggle" >
											<i class="fa fa-shopping-cart"></i>
											<span>Your Cart</span>
											<div class="qty">0</div>
									<?php }?>
									</a>
									
								</div>
								<!-- /Cart -->
								<!-- Wishlist -->
								<div >
									<?php if (isset($_SESSION['username'])){
                     				if ($_SESSION['type'] ==0){ ?>
                					<a class="login" href="./index.php?task=pageuser"><i class="fa fa-user-o"></i>ADMIN: <?php echo $_SESSION['your_name']?></a>
              						<?php }elseif ($_SESSION['type']==1){ ?>
                  					<a href="#"><i class="fa fa-user-o"></i><?php echo $_SESSION['your_name']?></a>
                  					<?php }?>
                					<?php }else{ ?>
									<a href="./index.php?task=pagelogin"><i class="fa fa-user-o"></i> Log In</a>
									<?php }?>
									
								</div>
								
								<!-- /Wishlist -->

								<!-- Menu Toogle -->
								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->