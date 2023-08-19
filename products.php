<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
 ?>

 <div class="main">
    <div class="content">
	      <div class="section group">
				<?php 
	      	$product_show = $product->showProduct();
	      	if($product_show){
	      		while ($result = $product_show->fetch_assoc()) {
	      			      	
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'] ?>"><img src="admin/upload/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p>
					 <p><span class="price"><?php echo $fm->formatCurrency($result['price'])." "."VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
				</div>
				<?php 
				}
				}
				 ?>
			</div>		
    </div>
 </div>
<?php 
	include 'inc/footer.php';
 ?>

