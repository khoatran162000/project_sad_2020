<?php 
	$login_check = Session::get('customer_login');
	if ($login_check) {
		header('Location:order.php'); 
	}
?>

<?php
    // goi class customer
     
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LAY DU LIEU TU PHUONG THUC O FORM POST
        $insertCustomer = $cs -> insertCustomer($_POST); // ham check khi submit len
    }
 ?>
 <?php 
 	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        // LAY DU LIEU TU PHUONG THUC O FORM POST
        $login_Customer = $cs -> loginCustomer($_POST); // ham check khi submit len
    }
 ?>