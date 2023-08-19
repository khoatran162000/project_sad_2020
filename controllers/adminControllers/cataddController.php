<?php
    // gọi class category
    $cat = new Category(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $catName = $_POST['catName'];
        $insertCat = $cat -> insertCategory($catName);
    }
  ?>