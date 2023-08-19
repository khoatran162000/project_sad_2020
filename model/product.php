<?php

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php 
	/**
	* 
	*/
	class Product
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insertProduct($date,$files){
			
			$productName = mysqli_real_escape_string($this->db->link, $date['productName']);
			$product_code = mysqli_real_escape_string($this->db->link, $date['product_code']);

			$productQuantity = mysqli_real_escape_string($this->db->link, $date['productQuantity']);
			$category = mysqli_real_escape_string($this->db->link, $date['category']);
			$brand = mysqli_real_escape_string($this->db->link, $date['brand']);
			$product_desc = mysqli_real_escape_string($this->db->link, $date['product_desc']);
			$price = mysqli_real_escape_string($this->db->link, $date['price']);
			$type = mysqli_real_escape_string($this->db->link, $date['type']);
			 //mysqli goi 2 biến. (productName/... and link) bien link -> goi connect db từ file database
			
			// kiem tra hinh anh va lay hinh anh cho vao folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			
			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;

			if($product_code ='' || $productName == "" || $productQuantity == "" || $category == "" || $brand == "" || $product_desc == "" || $price == "" || $type == "" || $file_name == ""){
				$alert = "<span class='error'>Fields must not be empty!</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);

				$query = "INSERT INTO tbl_product(productName,product_code,product_remain,productQuantity,catId,brandId,product_desc,price,type,image) VALUES('$productName','$product_code','$productQuantity','$productQuantity','$category','$brand','$product_desc','$price','$type','$unique_image') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert Product Successfully!</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Insert Product Failed!</span>";
					return $alert;
				}
			}
		}
		public function insertSlider($date,$files)
		{
			$sliderName = mysqli_real_escape_string($this->db->link, $date['sliderName']);
			$type = mysqli_real_escape_string($this->db->link, $date['type']);
			 //mysqli goi 2 bien. (sliderName and link) bien link -> goi connect db tu file database
			
			// kiem tra hinh anh va lay hinh anh cho vao folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;


			if($sliderName=="" || $type==""){
				$alert = "<span class='error'>Fields must not be empty</span>";
				return $alert; 
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 10485760) {

		    		 $alert = "<span class='success'>Image size should be less then 10MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					
					$query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Slider Added Successfully!</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Slider Added Failed!</span>";
						return $alert;
					}
				}
				
				
			}

		}
		public function showSlider(){
			$query = "SELECT * FROM tbl_slider where type='1' order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function showSliderList(){
			$query = "SELECT * FROM tbl_slider order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function showProductWarehouse(){
			$query = 
			"SELECT tbl_product.*, tbl_warehouse.*

			 FROM tbl_product INNER JOIN tbl_warehouse ON tbl_product.productId = tbl_warehouse.id_sanpham
								
			 order by tbl_warehouse.sl_ngaynhap desc ";

		
			$result = $this->db->select($query);
			return $result;
		}
		public function showProduct()
		{
			$query = 
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName

			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
								INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			 order by tbl_product.productId desc ";

			// $query = "SELECT * FROM tbl_product order by productId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function updateTypeSlider($id,$type){

			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_slider SET type = '$type' where sliderId='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function delSlider($id)
		{
			$query = "DELETE FROM tbl_slider where sliderId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Slider Deleted Successfully!</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Slider Deleted Failed!</span>";
				return $alert;
			}
		}
		public function updateQuantityProduct($data,$files,$id){
			$product_more_quantity = mysqli_real_escape_string($this->db->link, $data['product_more_quantity']);
			$product_remain = mysqli_real_escape_string($this->db->link, $data['product_remain']);
			
			if($product_more_quantity == ""){

				$alert = "<span class='error'>Fields must not be empty!</span>";
				return $alert; 
			}else{
					$qty_total = $product_more_quantity + $product_remain;
					//Neu nguoi dung khong chon anh
					$query = "UPDATE tbl_product SET
					
					product_remain = '$qty_total'

					WHERE productId = '$id'";
					
					}
					$query_warehouse = "INSERT INTO tbl_warehouse(id_sanpham,sl_nhap) VALUES('$id','$product_more_quantity') ";
					$result_insert = $this->db->insert($query_warehouse);
					$result = $this->db->update($query);

					if($result){
						$alert = "<span class='success'>Quantity Added Successfully!</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Quantity Added Failed!</span>";
						return $alert;
					}
				
		}
		public function updateProduct($data,$files,$id){
	
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$product_code = mysqli_real_escape_string($this->db->link, $data['product_code']);
			$productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			//Kiem tra hinh anh va lay hinh anh cho vao folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;


			if($product_code == "" || $productName=="" || $productQuantity=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert; 
			}else{
				if(!empty($file_name)){
					//Neu nguoi dung chon anh
					if ($file_size > 10485760) {

		    		 $alert = "<span class='success'>Image Size should be less then 10MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE tbl_product SET
					productName = '$productName',
					product_code = '$product_code',
					productQuantity = '$productQuantity',
					brandId = '$brand',
					catId = '$category', 
					type = '$type', 
					price = '$price', 
					image = '$unique_image',
					product_desc = '$product_desc'
					WHERE productId = '$id'";
					
				}else{
					//Neu nguoi dung khong chon anh
					$query = "UPDATE tbl_product SET

					productName = '$productName',
					product_code = '$product_code',
					productQuantity = '$productQuantity',
					brandId = '$brand',
					catId = '$category', 
					type = '$type', 
					price = '$price', 
					
					product_desc = '$product_desc'

					WHERE productId = '$id'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'>Product Updated Successfully!</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Product Updated Failed!</span>";
						return $alert;
					}
				
			}

		}
		public function delProduct($id)
		{
			$query = "DELETE FROM tbl_product where productId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Product Deleted Successfully!</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Product Deleted Failed!</span>";
				return $alert;
			}
		}
		public function delWlist($proid,$customer_id)
		{
			$query = "DELETE FROM tbl_wishlist where productId = '$proid' AND customer_id='$customer_id' ";
			$result = $this->db->delete($query);
			return $result;
		}
		public function getproductbyId($id)
		{
			$query = "SELECT * FROM tbl_product where productId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}		
		//Ket thuc Backend

		public function getproductFeatheread()
		{
			$query = "SELECT * FROM tbl_product where type = '0' order by productId desc LIMIT 4 ";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproductNew()
		{
			$query = "SELECT * FROM tbl_product order by productId desc LIMIT 4 ";
			$result = $this->db->select($query);
			return $result;
		}
		public function getDetails($id)
		{
			$query = 
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName

			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
								INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			 WHERE tbl_product.productId = '$id'
			 ";

			$result = $this->db->select($query);
			return $result;
		}
		public function getFirstSuggestion()
		{
			$query = "SELECT * FROM tbl_product where brandId = '17' order by productId desc limit 1";
			$result = $this->db->select($query);
			return $result;	
		}
		public function getSecondSuggestion()
		{
			$query = "SELECT * FROM tbl_product where brandId = '9' order by productId desc limit 1";
			$result = $this->db->select($query);
			return $result;	
		}
		public function getThirdSuggestion()
		{
			$query = "SELECT * FROM tbl_product where brandId = '13' order by productId desc limit 1";
			$result = $this->db->select($query);
			return $result;	
		}
		public function getFourthSuggestion()
		{
			$query = "SELECT * FROM tbl_product where brandId = '19' order by productId desc limit 1";
			$result = $this->db->select($query);
			return $result;	
		}
		public function getCompare($customer_id)
		{
			$query = "SELECT * FROM tbl_compare where customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;	
		}
		public function getWishlist($customer_id)
		{
			$query = "SELECT * FROM tbl_wishlist where customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function insertCompare($productid, $customer_id)
		{
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			$check_compare = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id ='$customer_id'";
			$result_check_compare = $this->db->select($check_compare);

			if($result_check_compare){
				$msg = "<span class='error'>Product has been added to compare!</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];

			
			
			$query_insert = "INSERT INTO tbl_compare(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_compare = $this->db->insert($query_insert);

			if($insert_compare){
						$alert = "<span class='success'>Adding Product To Compare Successfully!</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Adding Product To Compare Failed!</span>";
						return $alert;
					}
			}

		}
		public function insertWishlist($productid, $customer_id)
		{
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			$check_wlist = "SELECT * FROM tbl_wishlist WHERE productId = '$productid' AND customer_id ='$customer_id'";
			$result_check_wlist = $this->db->select($check_wlist);

			if($result_check_wlist){
				$msg = "<span class='error'>Product Added To Wishlist!</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];

			
			
			$query_insert = "INSERT INTO tbl_wishlist(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_wlist = $this->db->insert($query_insert);

			if($insert_wlist){
						$alert = "<span class='success'>Adding Product To Wishlist Successfully!</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Adding Product To Wishlist Failed!</span>";
						return $alert;
					}
			}
		}
		public function searchProduct($tukhoa){
			$tukhoa = $this->fm->validation($tukhoa);
			$query = "SELECT * FROM tbl_product WHERE productName LIKE '%$tukhoa%'";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>