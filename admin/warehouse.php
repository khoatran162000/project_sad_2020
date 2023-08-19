<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../model/category.php';  ?>
<?php include '../model/cart.php';  ?>
<?php include '../model/brand.php';  ?> 
<?php include '../model/product.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php include '../controllers/adminControllers/warehouseController.php'; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Warehouse Management</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Code</th>
					<th>Product Name</th>
				
					<th>First Quantity</th>
					<th>Sold</th>
				
					<th>Before Import</th>
					<th>Import Quantity</th>
					<th>After Import</th>
					
					<th>Import Date</th>

					
					
				</tr>
			</thead>
			<tbody>
				<?php 
				
				$pdlist = $pd->showProductWarehouse();
				$i = 0;
				
				
					if($pdlist){
					
							while ($result = $pdlist->fetch_assoc()){
								$i++;
									
									
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['product_code'] ?></td>
					<td><?php echo $result['productName'] ?></td>
					
					<td>
						<?php echo $result['productQuantity'] ?>

					</td>
					<td>
						<?php echo $result['product_soldout'] ?>

					</td>
					
					<td>
						<?php echo $result['product_remain'] - $result['sl_nhap'] ?>

					</td>
					<td>
						<?php echo $result['sl_nhap'] ?>

					</td>
					<td>
						<?php echo $result['product_remain'] ?>

					</td>
					<td>
						<?php echo $result['sl_ngaynhap'] ?>

					</td>
					
					
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
