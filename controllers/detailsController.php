<?php 
	if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
        echo "<script> window.location = '404.php' </script>";
        
    }else {
        $id = $_GET['proid']; // Lay productid tren host
    }
	$customer_id = Session::get('customer_id');
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])){
        // LAY DU LIEU TU PHUONG THUC O FORM POST
        $productid = $_POST['productid'];
        $insertCompare = $product -> insertCompare($productid, $customer_id); // ham check khi submit len
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])){
        // LAY DU LIEU TU PHUONG THUC O FORM POST
        $productid = $_POST['productid'];
        $insertWishlist = $product -> insertWishlist($productid, $customer_id); // ham check khi submit len
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LAY DU LIEU TU PHUONG THUC O FORM POST
        $quantity = $_POST['quantity'];
        $insertCart = $ct -> addToCart($id, $quantity); // ham check khi submit len
    }  
 ?>