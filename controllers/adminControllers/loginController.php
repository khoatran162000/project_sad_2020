 <?php
 	// goi class adminlogin
 	$class = new AdminLogin(); 
 	if($_SERVER['REQUEST_METHOD'] == 'POST'){
 		// LAY DU LIEU TU PHUONG THUC O FORM POST
 		$adminUser = $_POST['adminUser'];
 		$adminPass = md5($_POST['adminPass']);

 		$login_check = $class -> loginAdmin($adminUser,$adminPass); // ham check adminUser and adminPass khi submit len

 	}
  ?>