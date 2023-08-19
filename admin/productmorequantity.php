
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../model/category.php';  ?>
<?php include '../model/brand.php';  ?> 
<?php include '../model/product.php';  ?>
<?php include '../controllers/adminControllers/productmorequantityController.php'; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Import Quantity</h2>
        <?php 
            if(isset($updatemoreProduct)){
                echo $updatemoreProduct;
            }
         ?>
         <?php 
         $get_product_by_id = $pd->getproductbyId($id);
         if($get_product_by_id){
            while ($result_product = $get_product_by_id->fetch_assoc()) {
                # code...
            
          ?>   
        <div class="block">

         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Product Name</label>
                    </td>
                    <td>
                        <input readonly name="productName" value="<?php echo $result_product['productName'] ?>" type="text" class="medium" />
                    </td>
                </tr>
<!--                   <tr>
                    <td>
                        <label>Product Code</label>
                    </td>
                    <td>
                        <input readonly name="product_code" value="<?php echo $result_product['product_code'] ?>" type="text" class="medium" />
                    </td>
                </tr> -->
                 <tr>
                    <td>
                        <label>Remain Quantity</label>
                    </td>
                    <td>
                        <input  readonly name="product_remain" value="<?php echo $result_product['product_remain'] ?>" type="text" class="medium" />
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Import Quantity</label>
                    </td>
                    <td>
                        <input name="product_more_quantity" type="text" placeholder="Import quantity" class="medium" />
                    </td>
                </tr>  
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Thêm" />
                    </td>
                </tr>
            </table>
            </form>
            <?php 
            }
            }
             ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>
