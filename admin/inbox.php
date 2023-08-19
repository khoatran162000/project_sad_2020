<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../model/cart.php');
	include_once ($filepath.'/../helpers/format.php');
 ?>
<?php include '../controllers/adminControllers/inboxController.php'; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Orders</h2>
                <div class="block">
                <?php 
                if (isset($shifted)) {
                	echo $shifted;
                }
                 ?> 
                <?php 
                if (isset($del_shifted)) {
                	echo $del_shifted;
                }
                 ?>         
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No.</th>
							<th>Order Date</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Customer</th>
							<th>Address</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$ct = new Cart();
						$fm = new Format();
						$get_inbox_cart = $ct -> getInboxCart();
						if ($get_inbox_cart) {
							$i=0;
							while ($result = $get_inbox_cart->fetch_assoc()) {
								$i++;
							
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $fm->FormatDate($result['date_order']); ?></td>
							<td><?php echo $result['productName'] ?> </td>
							<td><?php echo $result['quantity'] ?></td>
							<td><?php echo $result['price'].' VND' ?></td>
							<td><?php echo $result['customer_id'] ?></td>
							<td><a href="customer.php?customerid=<?php echo $result['customer_id'] ?>">View Customer</a></td>
							<td>
								<?php 
								if($result['status']==0){
								 ?>

								<a href="?shiftid=<?php echo $result['id'] ?>&qty=<?php echo $result['quantity'] ?>&proid=<?php echo $result['productId'] ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['date_order'] ?>">Processing
								<?php 
								}elseif($result['status']==1) {
								 ?>

								<?php 
								echo 'Being shipped';
								 ?>
								 
								<?php 
								}elseif($result['status']==2) {

								 ?>
								<a href="?delid=<?php echo $result['id'] ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['date_order'] ?>">Delete Order</a>
								 <?php 
								}
								 ?>
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
