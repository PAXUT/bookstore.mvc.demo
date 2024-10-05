<?php 
	require_once 'Controller/Controller.php';
	session_start();

	$Controll = new Controller();

	$task = isset($_GET['task']) ? $_GET['task']:null;
	//user
	$id_user = isset($_POST['id_user'])? $_POST['id_user']:null;
	$your_name = isset($_POST['your_name'])? $_POST['your_name']:null;
	$username = isset($_POST['username'])? $_POST['username']:null;
	$password = isset($_POST['password'])? $_POST['password']:null;
	$repassword = isset($_POST['repassword'])? $_POST['repassword']:null;

	// book
	$tensach = isset($_POST['tensach'])? $_POST['tensach']:null;
	$tacgia = isset($_POST['tacgia'])? $_POST['tacgia']:null;
	$theloai = isset($_POST['theloai'])? $_POST['theloai']:null;
	$gia = isset($_POST['gia'])? $_POST['gia']:null;
	$nhaxuatban = isset($_POST['nhaxuatban'])? $_POST['nhaxuatban']:null;
	$soluong = isset($_POST['soluong'])? $_POST['soluong']:null;
	$des = isset($_POST['des'])? $_POST['des']:null;
	// tk
	$key = isset($_POST['text_search'])? $_POST['text_search']:null;
	// dang nhap
	if (isset($_POST['submit'])){
 	   $Controll->doLogin();
	}
	
	//dang ky
	if (isset($_POST['register'])){
		if (empty($username) || empty($password) || empty($repassword) || empty($your_name)){
			$message = "Không được để trống !";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}elseif ($password != $repassword){
			$message = "Mật khẩu không trùng nhau !";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}elseif (isset($your_name) && isset($username)  && isset($password) && isset($repassword) && $repassword = $password){
			$Controll->doRegister($username, $password,$your_name);
		}
	}
	//insert book
	if (isset($_POST['addbook'])){
 	   $Controll->addProduct($tensach,$tacgia,$theloai,$gia,$nhaxuatban,$soluong,$des);
	}
	//update book
	if (isset($_POST['updatebook'])){
		$Controll->UpdateBook();
	}
	
	// them vao gio hang
	if (isset($_POST['btn-cart'])){
		$Controll->addtocart();
	}
	// thanh toan
	if (isset($_POST['payment'])){
		if (isset($_SESSION['username'])){
			if (empty($_SESSION['cart'])) {
				$message = "Không có sản phảm nào trong giỏ hàng!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}else {
				header("location:index.php?task=payment");
			}
		}else{
			header("location:index.php?task=pagelogin");
		}
	}
	if (isset($_POST['ship'])){
		$Controll->payment();
	}
	if (isset($_POST['pageregister'])){
		header('location:index.php?task=pageregister');
	}
	// tim kiem san pham
	if (isset($_POST['search'])){
 	   $Controll->doSearch($key);
	}

	switch ($task) {
		case 'pagehome':
			$Controll->pagehome();
			break;
		case 'pageuser':
			$Controll->getPageUser();
			break;
		case 'deleteuser':
			$Controll->deleteuser();
			break;
		case 'pagelogin':
			$Controll->pagelogin();
			break;
		case 'pageregister':
			$Controll->register();
			break;
		case 'listbook':
			$Controll->getlistbook();
			break;
		case 'addbook':
			$Controll->getaddbook();
			break;
		case 'updatebook':
			$Controll->pageupdate();
			break;
		case 'deletebook':
			$Controll->deletebook();
			break;
        case 'pagedetail':
			$Controll->pagedetail($_GET['id']);
			break;
		case 'logout':
			session_destroy();
			header("location:index.php?task=pagehome");
			break;
		case 'cart':
			if (isset($_SESSION['username'])){
				$Controll->getPageCart();
        		break;
			}else{
				header("location:index.php?task=pagelogin");
				break;
			}
		case 'del_cart':
        	$Controll->deletecart();
        	break;
		case 'payment':
        	$Controll->getPagePayment();
        	break;
		case 'pagebill':
        	$Controll->getPageBill();
        	break;
		case 'deleteorderbill':
			$Controll->deleteorderbill();
			break;
		case 'allbook':
        	$Controll->Pageallbook();
        	break;
		default:
			$Controll->pagehome();
		break;
	}
?>