<?php
    // goi class product
    $pd = new Product();
    if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        echo "<script> window.location = 'productlist.php' </script>";
        
    }else {
        $id = $_GET['productid']; // Lay productid tren host
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LAY DU LIEU TU PHUONG THUC O FORM POST
        $updatemoreProduct = $pd->updateQuantityProduct($_POST, $_FILES, $id); // ham check khi submit len
    }
  ?>