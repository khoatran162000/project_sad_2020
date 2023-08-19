<?php 
	$pd = new Product();
	$fm = new Format();
	if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['productid']; // Lay productid tren host
        $delProduct = $pd -> delProduct($id); // ham check delete product khi submit len
    }
 ?>