
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../model/category.php';  ?>
<?php include '../model/brand.php';  ?> 
<?php include '../model/product.php';  ?>
<?php include '../controllers/adminControllers/producteditController.php'; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product Information</h2>
        <?php 
            if(isset($updateProduct)){
                echo $updateProduct;
            }
         ?>
         <?php 
         $get_product_by_id = $pd->getproductbyId($id);
         if($get_product_by_id){
            while ($result_product = $get_product_by_id->fetch_assoc()) {
                
            
          ?>   
        <div class="block">

         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input name="productName" value="<?php echo $result_product['productName'] ?>" type="text" class="medium" />
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>Code</label>
                    </td>
                    <td>
                        <input name="product_code" value="<?php echo $result_product['product_code'] ?>" type="text" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Quantity</label>
                    </td>
                    <td>
                        <input name="productQuantity" value="<?php echo $result_product['productQuantity'] ?>" type="text" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Select Category</option>
                            <?php 
                            $cat = new Category();
                            $catlist = $cat->showCategory();
                            if($catlist){
                                while ($result = $catlist->fetch_assoc()){
                            
                             ?>
                            <option 
                            <?php 
                            if($result['catId']==$result_product['catId'])
                                { echo 'selected'; }
                             ?>    
                            value=" <?php echo $result['catId'] ?> "> <?php echo $result['catName'] ?></option>
                            
                            <?php 
                            }
                             }
                             ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Select Brand</option>
                            <?php 
                            $brand = new Brand();
                            $brandlist = $brand->showBrand();
                            if($brandlist){
                                while ($result = $brandlist->fetch_assoc()){
                            
                             ?>
                            <option
                            <?php 
                            if($result['brandId']==$result_product['brandId'])
                                { echo 'selected'; }
                             ?> 
                             value=" <?php echo $result['brandId'] ?> "> <?php echo $result['brandName'] ?> </option>
                            
                            <?php 
                            }
                             }
                             ?>
                        </select>
                    </td>
                </tr>
                
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce"><?php echo $result_product['product_desc'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input name="price" value="<?php echo $result_product['price'] ?>" type="text" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="upload/<?php echo $result_product['image'] ?>" width="100"><br>
                        <input name="image" type="file" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php 
                            if ($result_product['type'] ==0) {
                             ?>
                            <option selected value="0">Featured</option>
                            <option value="1">Non-Featured</option>
                            <?php 
                                }else{
                            ?>
                            <option value="1">Featured</option>
                            <option selected value="0">Non-Featured</option>    
                            <?php 
                        }
                             ?>
                             
                        
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Update" />
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
