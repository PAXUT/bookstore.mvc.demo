<?php 
	/**
	 * 
	 */
	class View
	{
		public function pagehome($result,$new,$countcart)
		{
			include_once 'Templates/home.php';
		}
		public function pagelogin()
		{
			include_once 'Templates/login.php';
		}
		public function register()
		{
			include_once 'Templates/register.php';
		}
		public function getPageUser($listUser){
		   include_once 'Templates/pageuser.php';
		}
		public function getlistbook($listbook)
		{
			include_once 'Templates/listbook.php';
		}
		public function pageaddbook()
		{
			include_once 'Templates/addbook.php';
		}
		public function pageupdate($result)
		{
			include_once 'Templates/updatebook.php';
		}
		public function pagedetail($data,$result,$countcart)
		{
			include_once 'Templates/product.php';
		}
		public function getPageCart($showcart,$countcart){
			include "Templates/cart.php";
		}
		public function getPagePayment($countcart){
			include_once "Templates/payment.php";
		}
		public function getPageBill($listBill,$countcart){
			include_once "Templates/bill.php";
		}
		public function Pageallbook($listbook,$countcart){
			include_once "Templates/store.php";
		}
		public function getPageSearch($result,$countcart){
			include_once "Templates/formsearch.php";
		}
		// function head($countcart) {
		// 	include "Templates/inc/header.php";
		// }
	}
 ?>