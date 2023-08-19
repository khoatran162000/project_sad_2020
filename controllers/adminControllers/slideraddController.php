<?php
    // goi class category
    $product = new Product(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LAY DU LIEU TU PHUONG THUC O FORM POST
        
        $insertSlider = $product -> insertSlider($_POST, $_FILES); // ham check khi submit len
    }
  ?>