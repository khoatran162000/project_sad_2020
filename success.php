<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
    include 'controllers/successController.php';
 ?>

 <style type="text/css">
	.box_left {
    width: 50%;
    border: 1px solid #666;
    float: left;
    padding: 4px;	

	}
 	.box_right {
    width: 47%;
    border: 1px solid #666;
    float: right;
    padding: 4px;
	}
	.a_order {
    background: #653092;
    color: aliceblue;
    padding: 10px;
    font-size: 25px;
    border-radius: none;
    cursor: pointer;
	}
}
</style>

<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<h2>Order Successful</h2>
            <?php
                $customer_id = Session::get('customer_id'); 
                $get_amount = $ct->getAmountPrice($customer_id);
                if ($get_amount) {
                    $amount = 0;
                    while ($result = $get_amount->fetch_assoc()) {
                        $price = $result['price'];
                        $amount += $price;
                    }
                }
             ?>
            <p class="success_note">Total money you have paid: <?php 
                $vat = $amount * 0.1;
                $total = $vat + $amount;
                echo $total.' VND';
             ?></p>
            <p class="success_note">We will contact with you as soon as possible, for more details, <a href="orderdetails.php">click here</a></p>
 		</div>
 	</div>
 	
 </div>
</form>
<?php 
	include 'inc/footer.php';
 ?>