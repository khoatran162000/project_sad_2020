<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>



<?php 
	/**
	* 
	*/
	class Brand
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insertBrand($brandName){
			$brandName = $this->fm->validation($brandName); //goi ham validation de kiem tra co rong hay khong
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);
			 //mysqli goi 2 bien. (brandName and link) bien link -> goi connect db tu file database
			
			if(empty($brandName)){
				$alert = "<span class='error'>Brand must not be empty!</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert brand Successfully!</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Insert brand Failed!</span>";
					return $alert;
				}
			}
		}
		public function showBrand()
		{
			$query = "SELECT * FROM tbl_brand order by brandId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function getBrandbyId($id)
		{
			$query = "SELECT * FROM tbl_brand where brandId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function updateBrand($brandName,$id)
		{
			$brandName = $this->fm->validation($brandName); //goi ham validation tu file Format đe kiem tra
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);
			$id = mysqli_real_escape_string($this->db->link, $id);
			if(empty($brandName)){
				$alert = "<span class='error'>Brand must not be empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_brand SET brandName= '$brandName' WHERE brandId = '$id' ";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Brand Update Successfully!</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Brand Update Failed!</span>";
					return $alert;
				}
			}

		}
		public function delBrand($id)
		{
			$query = "DELETE FROM tbl_brand where brandId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Brand Deleted Successfully!</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Brand Deleted Failed!</span>";
				return $alert;
			}
		}
		
	}
 ?>