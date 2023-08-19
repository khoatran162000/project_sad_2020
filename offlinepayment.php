<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
	include 'controllers/offlinepaymentController.php';
 ?>

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
    		<div class="heading">
    		     <h3>Offline Payment</h3>
    		</div>
    		<div class="clear"></div>
    		<div class="box_left">
    			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<?php 
			    	if (isset($update_quantity_Cart)) {
			    		echo $update_quantity_Cart;
			    	}
			    	 ?>
			    	<?php 
			    	if (isset($delcart)) {
			    		echo $delcart;
			    	}
			    	 ?>
			    	 <?php
			    	 if(isset($delcart)){
			    	 	echo $delcart;
			    	 }
			    	?>
						<table class="tblone">
							<tr>
								<th width="5%">No.</th>
								<th width="15%">Product Name</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								
							</tr>
							<?php 
							$get_product_cart = $ct->getProductCart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								$i=0;
								while ($result = $get_product_cart->fetch_assoc()) {
									$i++;
								
							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'] ?></td>
								
								<td><?php echo $result['price'].' VND' ?></td>
								<td>
									<?php echo $result['quantity'] ?>
								</td>
								<td>
									<?php 
									$total = $result['price'] * $result['quantity'];
									echo $total.' VND';
									 ?>
								</td>
								
							</tr>
							<?php 

							$subtotal += $total;
							$qty = $qty + $result['quantity'];
								}
							}
							 ?>
	
						</table>
						<?php
							$check_cart = $ct->checkCart();
							if ($check_cart) {

							 ?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sum price : </th>
								<td>
								<?php echo $subtotal.' VND';

									  Session::set('sum',$subtotal);
									  Session::set('qty',$qty);
								?>
								</td>
							</tr>
							<tr>
								<th>Tax : </th>
								<td>10% (<?php echo $vat = $subtotal * 0.1. ' VND';?>)</td>
							</tr>
							<tr>
								<th>Total :</th>
								<td><?php 
								$vat = $subtotal * 0.1;
								$grandTotal = $subtotal + $vat;
								echo $grandTotal.' VND';
								 ?> </td>
							</tr>
					   </table>
					   <?php 
						}else {
							echo 'Your cart is Empty! Please buy something now!';
						}
					    ?>
					</div>
					

    		</div>
    		<div class="box_right">
    			<table class="tblone">
		    		<?php 
		    		$id = Session::get('customer_id');
		    		$get_customers = $cs->showCustomers($id);
		    		if ($get_customers) {
		    			while ($result = $get_customers->fetch_assoc()) {
		    			
		    		 ?>
		    		<tr>
		    			<td>Name</td>
		    			<td>:</td>
		    			<td><?php echo $result['name']; ?></td>
		    		</tr>
		    		<tr>
		    			<td>City</td>
		    			<td>:</td>
		    			<td><?php echo $result['city']; ?></td>
		    		</tr>
		    		<tr>
		    			<td>Phone Number</td>
		    			<td>:</td>
		    			<td><?php echo $result['phone']; ?></td>
		    		</tr>
		    		<tr>
		    			<td>Zipcode</td>
		    			<td>:</td>
		    			<td><?php echo $result['zipcode']; ?></td>
		    		</tr>
		    		<tr>
		    			<td>Email</td>
		    			<td>:</td>
		    			<td><?php echo $result['email']; ?></td>
		    		</tr>
		    		<tr>
		    			<td>Address</td>
		    			<td>:</td>
		    			<td><?php echo $result['address']; ?></td>
		    		</tr>
		            <tr>
		                <td colspan="3"><a href="editprofile.php">Edit Profile</a></td>
		               
		            </tr>
		    		
		    		<?php 
		    		}
		    		}
		    		 ?>
		    	</table>	

    		</div>
 		</div>
 	</div>
 	<center style="padding-bottom: 20px;"><a href="?orderid=order" class="a_order">Order Now</a></center>
 </div>
</form>
<?php 
	include 'inc/footer.php';
 ?>