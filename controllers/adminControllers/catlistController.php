<?php
    // goi class category
    $cat = new Category();     
    if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['delid']; // Lay id tren host
        $delCat = $cat -> delCategory($id); // ham check delete category khi submit len
    }
 ?>