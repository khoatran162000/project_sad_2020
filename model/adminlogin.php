<?php 
	include '../lib/session.php';
	Session::checkLogin();
	include '../lib/database.php';
	include '../helpers/format.php';
 ?>

<?php 
	/**
	* 
	*/
	class AdminLogin
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function loginAdmin($adminUser,$adminPass){
			$adminUser = $this->fm->validation($adminUser); //goi ham validation tu file Format đe kiem tra
			$adminPass = $this->fm->validation($adminPass);

			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, $adminPass); //mysqli goi 2 bien (adminUser/adminPass and link) bien link -> goi connect db tu file database
			
			if(empty($adminUser) || empty($adminPass)){
				$alert = "Username and Password cannot be null!";
				return $alert;
			}else{
				$query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' LIMIT 1 ";
				$result = $this->db->select($query);

				if($result != false){
					//session_start();
					// $_SESSION['login'] = 1;
					//$_SESSION['user'] = $user;
					$value = $result->fetch_assoc();
					Session::set('adminlogin', true); // set adminlogin da ton tai
					// goi function checklogin de kiem tra
					Session::set('adminId', $value['adminId']);
					Session::set('adminUser', $value['adminUser']);
					Session::set('adminName', $value['adminName']);
					header("Location:index.php");
				}else {
					$alert = "Username and Password not match!";
					return $alert;
				}
			}


		}
	}
 ?>