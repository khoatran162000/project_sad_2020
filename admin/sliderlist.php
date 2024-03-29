<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../model/product.php';?>
<?php include '../controllers/adminControllers/sliderlistController.php'; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">
        <?php 
        if (isset($del_slider)) {
        	echo $del_slider;
        }
         ?>  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Title</th>
					<th>Image</th>
					<th>On/Off Mode</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
 
				<?php
					$product = new Product();
					$get_slider = $product->showSliderList();
					if($get_slider){
						$i = 0;
						while($result_slider = $get_slider->fetch_assoc()){
							$i++;
						?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result_slider['sliderName'] ?></td>
					<td><img src="upload/<?php echo $result_slider['slider_image'] ?>" height="120px" width="500px"/></td>		
					<td>
						<?php
						if($result_slider['type']==1){
						?>
						<a href="?type_slider=<?php echo $result_slider['sliderId'] ?>&type=0">On</a> 
						<?php
						 }else{
						?>	
						<a href="?type_slider=<?php echo $result_slider['sliderId'] ?>&type=1">Off</a> 
						<?php
						}
						?>

					</td>		
				<td>
					
					<a href="?slider_del=<?php echo $result_slider['sliderId'] ?>" onclick="return confirm('Are you sure to Delete?');" >Delete</a> 
				</td>
					</tr>
				<?php
				}}
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
