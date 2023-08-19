<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


 
<?php 
	/**
	* 
	*/
	class Category
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insertCategory($catName){
			$catName = $this->fm->validation($catName); //goi ham validation tu file Format de kiem tra
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			 //mysqli goi 2 bien. (catName and link) bien link -> goi connect db tu file database
			
			if(empty($catName)){
				$alert = "<span class='error'>Category must not be empty!</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_category(catName) VALUES('$catName') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert Category Successfully!</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Insert Category Failed!</span>";
					return $alert;



					// can checktrung category
				}
			}
		}
		public function showCategory()
		{
			$query = "SELECT * FROM tbl_category order by catId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function updateCategory($catName,$id)
		{
			$catName = $this->fm->validation($catName); //goi ham validation tu file Format de kiem tra
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$id = mysqli_real_escape_string($this->db->link, $id);
			if(empty($catName)){
				$alert = "<span class='error'>Category must not be empty!</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_category SET catName= '$catName' WHERE catId = '$id' ";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Category Update Successfully!</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Update Category Failed!</span>";
					return $alert;
				}
			}

		}
		public function delCategory($id)
		{
			$query = "DELETE FROM tbl_category where catId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Category Deleted Successfully!</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Category Deleted Failed!</span>";
				return $alert;
			}
		}
		public function getcatbyId($id)
		{
			$query = "SELECT * FROM tbl_category where catId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function showCategoryFrontend()
		{
			$query = "SELECT * FROM tbl_category order by catId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function getProductByCat($id)
		{
			$query = "SELECT * FROM tbl_product where catId = '$id' order by catId desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		public function getNameByCat($id)
		{
			$query = "SELECT tbl_product.*,tbl_category.catName,tbl_category.catId 
					  FROM tbl_product,tbl_category 
					  WHERE tbl_product.catId = tbl_category.catId
					  AND tbl_product.catId ='$id' LIMIT 1 ";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>