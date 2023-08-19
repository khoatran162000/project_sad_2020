<?php
    // gọi class category
    $brand = new Brand();     
    if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['delid']; // Lay id tren host
        $delbrand = $brand -> delBrand($id); // ham check delete brand khi submit len
    }
 ?>