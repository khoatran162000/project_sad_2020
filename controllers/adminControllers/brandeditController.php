<?php
    $brand = new Brand(); 
    if(!isset($_GET['brandid']) || $_GET['brandid'] == NULL){
        echo "<script> window.location = 'brandlist.php' </script>";
        
    }else {
        $id = $_GET['brandid']; // Lay brandid tren host
    }
    // goi class brand
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LAY DU LIEU TU PHUONG THUC O FORM POST
        $brandName = $_POST['brandName'];
        $updateBrand = $brand -> updateBrand($brandName,$id); // ham check brandName khi submit len
    }
    
  ?>