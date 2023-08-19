<?php
    // goi class product
    $pd = new Product(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LAY DU LIEU TU PHUONG THUC O FORM POST
        $insertProduct = $pd -> insertProduct($_POST, $_FILES); // ham check khi submit len
    }
  ?>