<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


 
<?php 
	/**
	* 
	*/
	class Customer
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insertCustomer($date)
		{
			$name = mysqli_real_escape_string($this->db->link, $date['name']);
			$city = mysqli_real_escape_string($this->db->link, $date['city']);
			$zipcode = mysqli_real_escape_string($this->db->link, $date['zipcode']);
			$email = mysqli_real_escape_string($this->db->link, $date['email']);
			$address = mysqli_real_escape_string($this->db->link, $date['address']);
			// $country = mysqli_real_escape_string($this->db->link, $date['country']);
			$phone = mysqli_real_escape_string($this->db->link, $date['phone']);
			$password = mysqli_real_escape_string($this->db->link, md5($date['password']));

			if($name == "" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $phone == "" || $password == ""){
				$alert = "<span class='error'>Fields must not be empty!</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if ($result_check) {
					$alert = "<span class='error'>Email Already Exists. Please Enter Another Email! </span>";
					return $alert;
				}else {
					$query = "INSERT INTO tbl_customer(name,city,zipcode,email,address,phone,password) VALUES('$name','$city','$zipcode','$email','$address','$phone','$password') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Register Successfully!</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Register Failed!</span>";
						return $alert;
					}
				}
			}
		}
		public function loginCustomer($date)
		{
			$email =  $date['email'];
			$password = md5($date['password']);
			if($email == '' || $password == ''){
				$alert = "<span class='error'>Email And Password must not be empty!</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password' ";
				$result_check = $this->db->select($check_login);
				if ($result_check != false) {
					$value = $result_check->fetch_assoc();
					Session::set('customer_login', true);
					Session::set('customer_id', $value['id']);
					Session::set('customer_name', $value['name']);
					header('Location:order.php');
				}else {
					$alert = "<span class='error'>Email and Password not match!</span>";
					return $alert;
				}
			}
		}
		public function showCustomers($id)
		{
			$query = "SELECT * FROM tbl_customer WHERE id='$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function updateCustomers($data, $id)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			
			if($name=="" || $zipcode=="" || $email=="" || $address=="" || $phone ==""){
				$alert = "<span class='error'>Fields must not be empty!</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_customer SET name='$name',zipcode='$zipcode',email='$email',address='$address',phone='$phone' WHERE id ='$id'";
				$result = $this->db->insert($query);
				if($result){
						$alert = "<span class='success'>Update Successful!</span>";
						return $alert;
				}else{
						$alert = "<span class='error'>Update Failed!</span>";
						return $alert;
				}
				
			}
		}

	}
 ?>