<?php
    if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid']; 
        $delcart = $ct->delProductCart($cartid);
    }
        
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LAY DU LIEU TU PHUONG THUC O FORM POST
        $cartId = $_POST['cartId'];
        $proId = $_POST['proId'];
        $quantity = $_POST['quantity'];
        $update_quantity_Cart = $ct -> updateQuantityCart($proId,$cartId, $quantity); // ham check khi submit len
    	if ($quantity <= 0) {
    		$delcart = $ct->delProductCart($cartId);
    	}
    } 
 ?>
