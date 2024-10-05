<?php 
	require_once 'Model/Model.php';
	require_once 'View/View.php';
	class Controller{
	var $model, $view;
	public function __construct()
	{
		$this->view = new View();
		$this->model = new Model();
	}
	
	public function pagehome(){
		$result = $this->model->getDataHome();
		$new = $this->model->getDataHomenew();
        $countcart = $this->model->countcart();
        $this->view->pagehome($result,$new,$countcart);
	}

	public function pagelogin(){
		$this->view->pagelogin();
	}

    public function register(){
		$this->view->register();
	}

	public function getPageUser(){
        $listUser = $this->model->getDataUser();
        $this->view->getPageUser($listUser);
    }
    public function deleteuser(){
        $this->model->deleteuser();
        header("location:index.php?task=pageuser");
    }

	public function doLogin(){
        if($result = $this->model->doLogin()) {
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['type'] = $result['type'];
            $_SESSION['your_name'] = $result['your_name'];
            if ($result['type'] == 0){
                header("location:index.php?task=pageuser");
            }elseif ($result['type'] == 1){
                header("location:index.php?task=pagehome");
            }
        }else{
            echo "Tên đăng nhập hoặc mật khẩu chưa đúng";
        }
		
    }
    public function doRegister($username, $password,$your_name){
        $result =  $this->model->doRegister($username, $password,$your_name);
        $message = "Đăng ký thành công !";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $this->view->register();
    }

	public function getlistbook() {
		$listbook = $this->model->getDataBook();
        $this->view->getlistbook($listbook);
		
	}

	public function getaddbook() {
        $this->view->pageaddbook();
		
	}
	public function addProduct($tensach, $tacgia,$theloai, $gia, $nhaxuatban, $soluong,$des) {
		if (isset($_FILES['img']['name'])){
			$path = "img/book/";
            $image = $_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'], $path.$image);
			if (!empty($tensach) && !empty($tacgia) && !empty($gia) && !empty($nhaxuatban) && !empty($soluong) && !empty($image) && !empty($theloai) && !empty($des)) {
				$insert_id = $this->model->addProduct($tensach, $tacgia,$theloai, $gia, $nhaxuatban, $soluong, $image,$des);
			if ($insert_id) {
				echo "Thêm thành công";
			} else {
				echo "Thêm sản phẩm không thành công!";
			}
			}
		} else {
			echo "Vui lòng điền đầy đủ thông tin của sản phẩm và chọn hình ảnh!";
		}
	}
	public function UpdateBook() {
        if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])){
			$path = "img/book/";
            $image = $_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'], $path.$image);
			$this->model->UpdateBook($image);
			
		} else {
            // Nếu người dùng không tải lên ảnh mới, sử dụng ảnh cũ và tiếp tục với quá trình cập nhật
            $oldImage = $_POST['oldImage']; // Đường dẫn của ảnh cũ được gửi từ form
            // Tiếp tục với quá trình cập nhật sử dụng ảnh cũ $oldImage
            $this->model->UpdateBook($oldImage);
        }
        
	}
	public function pageupdate() {
		$result = $this->model->pageupdate();
        $this->view->pageupdate($result);
		
	}
	public function deletebook(){
        $this->model->deletebook();
        header("location:index.php?task=listbook");
    }

	public function pagedetail($product_id){
		$data = [];
        $products = $this->model->detailbook($product_id);
        while($row = mysqli_fetch_assoc($products)) {
            $temp = [];
            $temp['id_book'] = $row['id_book'];
            $temp['tensach'] = $row['tensach'];
            $temp['gia'] = $row['gia'];
			$temp['nhaxuatban'] = $row['nhaxuatban'];
            $temp['tacgia'] = $row['tacgia'];
            $temp['soluong'] = $row['soluong'];
            $temp['theloai'] = $row['theloai'];
            $temp['des'] = $row['des'];
            $temp['img'] = $row['img'];
            array_push($data, $temp);
        }
		$result = $this->model->getDataHome();
        $countcart = $this->model->countcart();
		$this->view->pagedetail($data,$result,$countcart);
	}



	function add_to_cart($info)
    {
        if (count($_SESSION['cart']) > 0) {
            $this->merge($info);
        } else {
            array_push($_SESSION['cart'], $info);
        }
    }
	function merge($new_added)
    {
        $ids = array_column($_SESSION['cart'], 'id');
        if(in_array($new_added['id'], $ids)) {
            for($i = 0; $i < count($_SESSION['cart']); $i++) {
                if($_SESSION['cart'][$i]['id'] == $new_added['id']) {
                    $total_quantity = $_SESSION['cart'][$i]['quantity'] + $new_added['quantity'];
                    if($total_quantity < 11) {
                        $_SESSION['cart'][$i]['quantity'] = $total_quantity;
                    } else {
                        $_SESSION['cart'][$i]['quantity'] = 10;
                    }
                }
            }
        } else {
            array_push($_SESSION['cart'], $new_added);
        }
    }
    

    // lấy dữ liệu giỏ hàng
    public function getPageCart(){
        $showcart = $this->model->showcart();
        $countcart = $this->model->countcart();
        $this->view->getPageCart($showcart,$countcart);
    }

    public function addtocart() {
        $this->model->addcart();
    }

    public function deletecart(){
        $this->model->deletecart();
        header("location:index.php?task=cart");
        echo "đã xóa";
    }
    
	public function getPagePayment(){
        $countcart = $this->model->countcart();
        $this->view->getPagePayment($countcart);
    }
	public function payment(){
        $this->model->Bill();
    }
    public function deleteorderbill(){
        $this->model->deleteorderbill();
        header("location:index.php?task=pagebill");
    }
	public function getPageBill(){
        $listBill = $this->model->getDataBill();
        $countcart = $this->model->countcart();
        $this->view->getPageBill($listBill,$countcart);
    }
	public function Pageallbook(){
		$listbook = $this->model->getDataBook();
        $countcart = $this->model->countcart();
        $this->view->Pageallbook($listbook,$countcart);
    }
	public function doSearch($key){
        $result = $this->model->doSearch($key);
        $countcart = $this->model->countcart();
        $this->view->getPageSearch($result,$countcart);
    }
}
 ?>