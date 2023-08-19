<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
	include 'controllers/wishlistController.php';
 ?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Wishlist Product</h2>
			    	
						<table class="tblone">
							<tr>
								<th width="10%">No.</th>
								<th width="20%">Product Name</th>
								<th width="20%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Action</th>
	
							</tr>
							<?php 
							$customer_id = Session::get('customer_id');
							$get_wishlist = $product->getWishlist($customer_id);
							if($get_wishlist){
								$i = 0;
								while ($result = $get_wishlist->fetch_assoc()) {
								$i++;	
								
							 ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/upload/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'] ?></td>
								
								<td>
									<a href="?proid=<?php echo $result['productId'] ?>">Delete</a> ||
									<a href="details.php?proid=<?php echo $result['productId'] ?>">Buy Now</a>
								</td>
							</tr>
							<?php 

							
								}
							}
							 ?>
	
						</table>
						
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
 ?>
