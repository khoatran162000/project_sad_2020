﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../model/category.php';  ?>
<?php include '../model/cart.php';  ?>
<?php include '../model/brand.php';  ?> 
<?php include '../model/product.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php include '../controllers/adminControllers/productlistController.php'; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
<!-- 					<th>Code</th> -->
					<th>Product Name</th>
					<th>Import</th>
					<th>Original Quantity</th>
					<th>Sold Quantity</th>
					<th>Remain Quantity</th>
					<th>Price</th>
					<th>Image</th>
					<th>Category</th>
					<th>Brand</th>
					
					<th>Product Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				
				$pdlist = $pd->showProduct();
				$i = 0;
				
				
					if($pdlist){
					
							while ($result = $pdlist->fetch_assoc()){
								$i++;
									
									
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
<!-- 					<td><?php echo $result['product_code'] ?></td> -->
					<td><?php echo $result['productName'] ?></td>
					<td><a href="productmorequantity.php?productid=<?php echo $result['productId'] ?>">Import Product</a></td>
					<td>
						<?php echo $result['productQuantity'] ?>

					</td>
					<td>
						<?php echo $result['product_soldout'] ?>

					</td>
					<td>
						<?php echo $result['product_remain'] ?>

					</td>
					<td><?php echo $result['price'] ?></td>
					<td><img src="upload/<?php echo $result['image'] ?>" width="80"></td>
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					
					<td><?php 
						if($result['type']==0){
							echo 'Featured';
						}else{
							echo 'Non-featured';
						}

					?></td>
					
					<td><a href="productedit.php?productid=<?php echo $result['productId'] ?>">Edit</a> || <a href="?productid=<?php echo $result['productId'] ?>">Delete</a></td>
				</tr>
				<?php
							
						
					}
				}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
