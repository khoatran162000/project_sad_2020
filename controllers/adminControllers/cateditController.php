<?php
    $cat = new Category(); 
    if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
        echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['catid']; // Lay catid tren host
    }
    // goi class category
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LAY DU LIEU TU PHUONG THUC O FORM POST
        $catName = $_POST['catName'];
        $updateCat = $cat -> updateCategory($catName,$id); // ham check catName khi submit len
    }
    
  ?>