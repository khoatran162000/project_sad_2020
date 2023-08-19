<?php
    // goi class brand
    $brand = new Brand(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LAY DU LIEU TU PHUONG THUC O FORM POST
        $brandName = $_POST['brandName'];
        $insertBrand = $brand -> insertBrand($brandName); // ham check brandName khi submit len
    }
  ?> 