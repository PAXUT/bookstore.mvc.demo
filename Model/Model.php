<?php 
	/**
	 * 
	 */
	class Model 
	{
		public $db;
		public function __construct()
		{
			$db = mysqli_connect("localhost","root","","bookstore");
			mysqli_set_charset($db, "utf8");
			$this->db=$db;
		}
		public function doLogin(){
			$query = "SELECT * 
					  FROM user 
					  WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'";
			$result = mysqli_query($this->db, $query);
			if (mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_assoc($result);
				return $row;
			}
			return false;
			
		}
		public function doRegister($username, $password,$your_name){
			$query = "INSERT INTO user (username, password, type,your_name)
					  VALUES ('".$username."', '".$password."', '1','".$your_name."')";
			$result = mysqli_query($this->db, $query);
			return $result;
		}
		public function getDataUser(){
			$query = "SELECT * 
					  FROM user
					  WHERE type = '1'";
			$listUser = mysqli_query($this->db, $query);
			return $listUser;

		}
		public function getDataBook(){
			$query = "SELECT * 
					  FROM book 
					  order by id_book desc";
			$listbook = mysqli_query($this->db, $query);
			return $listbook;
		}
		public function getDataHome(){
			$query = "SELECT *
					  FROM book
					  order by id_book desc LIMIT 5";
			$result = mysqli_query($this->db, $query);
			return $result;
		}
		public function getDataHomenew(){
			$query = "	SELECT *
					  	FROM book
						LIMIT 8";
			$new = mysqli_query($this->db, $query);
			return $new;
		}
		public function addProduct($tensach, $tacgia,$theloai, $gia, $nhaxuatban, $soluong,$image,$des) {
			$query = "INSERT INTO book (tensach, tacgia,theloai, gia, nhaxuatban, soluong, img, des )
					  VALUES ('{$tensach}', '{$tacgia}','{$theloai}', '{$gia}', '{$nhaxuatban}', '{$soluong}','{$image}','{$des}')";
			$addbook = mysqli_query($this->db, $query);
			return $addbook;
		}
		public function pageupdate(){
			$query = "SELECT *
					  FROM book
					  WHERE id_book = '{$_GET['idbook']}'";
			$result = mysqli_query($this->db, $query);
			return $result->fetch_assoc();
		}
		public function deleteuser(){
			$query = "DELETE FROM user
					  WHERE id_user = '{$_GET['iduser']}'";
			$result = mysqli_query($this->db, $query);
			return $result;
			
		}

		public function addtocart() {
			$query = "INSERT INTO cart (id_book, id_user,quantity)
					  VALUES ('{$_POST['id']}', '{$_SESSION['id_user']}','{$_POST['quantity']}')";
			$addcart = mysqli_query($this->db, $query);
			return $addcart;
		}
		function Update() {
			$id_cart = $_POST['idc'];
			$query = "UPDATE cart
                  SET 
                  quantity = quantity +'{$_POST['quantity']}'
                  WHERE id_book = '$id_cart' and id_user = '{$_SESSION['id_user']}'";
			echo $query;
			$result = mysqli_query($this->db, $query);
			return $result;
		}
		function addcart() {
			// Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
			$query = "SELECT * FROM cart WHERE id_book = '{$_POST['id']}' AND id_user = '{$_SESSION['id_user']}'";
			$result = mysqli_query($this->db, $query);
		
			if (mysqli_num_rows($result) > 0) {
				// Nếu sản phẩm đã có, cập nhật số lượng
				$row = mysqli_fetch_assoc($result);
				$current_quantity = $row['quantity'];
				$new_quantity = $current_quantity + $_POST['quantity'];
				$update_query = "UPDATE cart SET quantity = '$new_quantity' WHERE id_book = '{$_POST['id']}' AND id_user = '{$_SESSION['id_user']}'";
				$update_result = mysqli_query($this->db, $update_query);
				header("Location: " . $_SERVER['REQUEST_URI']);//lấy toàn bộ URL hiện tại, bao gồm cả tham số truy vấn.
				if (!$update_result) {
					echo "Lỗi cập nhật số lượng: " . mysqli_error($this->db);
				}
			} else {
				// Nếu sản phẩm chưa có, thêm vào giỏ hàng
				$insert_query = "INSERT INTO cart (id_book, quantity, id_user) VALUES ('{$_POST['id']}', '{$_POST['quantity']}', '{$_SESSION['id_user']}')";
				$insert_result = mysqli_query($this->db, $insert_query);
				header("Location: " . $_SERVER['REQUEST_URI']);//lấy toàn bộ URL hiện tại, bao gồm cả tham số truy vấn.
				if (!$insert_result) {
					echo "Lỗi thêm sản phẩm vào giỏ hàng: " . mysqli_error($this->db);
				}
				
			}
		}
		
		public function deletecart() {
			$query = "DELETE
						FROM cart
						where id_cart = '{$_GET['id']}'";
			$result = mysqli_query($this->db, $query);
			return $result;
			
		}
		public function showcart() {
			$query = "SELECT *
						FROM cart,book
						where book.id_book =cart.id_book
						and id_user = '{$_SESSION['id_user']}'";
			$showcart = mysqli_query($this->db, $query);
			if ($showcart && $showcart->num_rows >= 0) {
				// Tạo mảng để lưu trữ giỏ hàng
				$_SESSION['cart'] = [];
				while($row = $showcart->fetch_assoc()) {
					$_SESSION['cart'][] = $row;
				}
			}
			return $showcart;
		}

		public function countcart() {
			if (isset($_SESSION['id_user'])) {
				$query = "SELECT COUNT(DISTINCT id_book) AS countcart from cart WHERE id_user= '{$_SESSION['id_user']}'";
	
				$countcart = mysqli_query($this->db, $query);
				return $countcart;
				
			}
			
		}

		public function UpdateBook($image) {
			$query = "UPDATE book
                  SET tensach = '{$_POST['tensach']}',
				  img = '{$image}',
                  tacgia = '{$_POST['tacgia']}',
				  theloai = '{$_POST['theloai']}',
                  gia = '{$_POST['gia']}',
                  nhaxuatban = '{$_POST['nhaxuatban']}',
				  des = '{$_POST['des']}',
                  soluong = '{$_POST['soluong']}'
                  WHERE id_book = '{$_POST['idan']}'";
        	if (mysqli_query($this->db, $query)){
            	$message = "Cập nhật thành công!";
            	echo "<script >alert('$message');</script>";
        	}else{
            	$message = "Cập nhật thất bại!";
            	echo "<script >alert('$message');</script>";
        	}
		}
		public function deletebook(){
			$query = "DELETE FROM book
					  WHERE id_book = '{$_GET['idbook']}'";
			$result = mysqli_query($this->db, $query);
			return $result;
			
		}
		public function detailbook($product_id){
			$query = "SELECT *
					  FROM book type
					  WHERE id_book = {$product_id}";
			$listProduct = mysqli_query($this->db,$query);
	
			return $listProduct;
		}
		
		public function creatDetailOrder(){
			if ($_POST['sdt']==null ||$_POST['diachi']==null) {
				$message = "Vui lòng điền đầy đủ thông tin!";
					echo "<script type='text/javascript'>alert('$message');</script>";
			}else {
				$query = "INSERT INTO tbl_order( sub_total , sdt , diachi , phuongthuc, id_user )
						  VALUES ('{$_SESSION['sub_total']}','{$_POST['sdt']}','{$_POST['diachi']}','{$_POST['payment_method']}','{$_SESSION['id_user']}')";
				if (mysqli_query($this->db, $query)){
            		return mysqli_insert_id($this->db);
        		};
        		return false;
			}
	
			
		}
		public function Bill() {
			$id_order = $this->creatDetailOrder();
			if ($id_order) {
				$user_id = $_SESSION['id_user'];
				$query = "SELECT * FROM cart,book WHERE book.id_book = cart.id_book and id_user = '$user_id'";
				$cart_items = mysqli_query($this->db, $query);
		
				while ($item = mysqli_fetch_assoc($cart_items)) {
					$query = "INSERT INTO proorder (id_book, id_order, quantity, gia)
							  VALUES ('{$item['id_book']}', '{$id_order}', '{$item['quantity']}', '{$item['gia']}')";
					if (!mysqli_query($this->db, $query)) {
						$message = "Thanh toán thất bại!";
						echo "<script type='text/javascript'>alert('$message');</script>";
						return false;
					}
				}
		
				// Xóa các mục trong giỏ hàng sau khi thanh toán thành công
				$query = "DELETE FROM cart WHERE id_user = '$user_id'";
				mysqli_query($this->db, $query);
		
				$message = "Thanh toán thành công!";
				echo "<script type='text/javascript'>alert('$message');</script>";
				header("refresh:0; url=index.php?task=pagehome");
				return true;
			}
		}
		public function getDataBill(){
			$query = "SELECT *
					  FROM tbl_order, book, user,proorder
					  where book.id_book =proorder.id_book
					  and user.id_user = tbl_order.id_user
					  and tbl_order.id_order = proorder.id_order
					  order by id_detail desc;";
			$listBill = mysqli_query($this->db, $query);
			return $listBill;
		}
		public function deleteorderbill(){
			$query = "DELETE FROM tbl_order,proorder
					  WHERE id_detail = '{$_GET['idorder']}'";
			$result = mysqli_query($this->db, $query);
			return $result;
		}
		public function doSearch(string $key){
			$query = "SELECT *
					  FROM book
					  WHERE (tensach LIKE '%$key%' OR tacgia LIKE '%$key%')
					  order by tensach desc";
			
			$result = mysqli_query($this->db, $query);
			return $result;
		}
		
	}
 ?>