 <?php 

    if(isset($_GET['proid'])){
    	$customer_id = Session::get('customer_id');
     	$proid = $_GET['proid']; 
      	$delwlist = $product->delWlist($proid,$customer_id);
 	}
  ?>