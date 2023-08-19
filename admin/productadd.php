<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../model/category.php';  ?>
<?php include '../model/brand.php';  ?> 
<?php include '../model/product.php';  ?>
<?php include '../controllers/adminControllers/productaddController.php'; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <?php 
            if(isset($insertProduct)){
                echo $insertProduct;
            }
         ?>   
        <div class="block">

         <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Product Name</label>
                    </td>
                    <td>
                        <input name="productName" type="text" placeholder="Enter product name" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Product Code</label>
                    </td>
                    <td>
                        <input name="product_code" type="text" placeholder="Enter product code" class="medium" />
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>Quantity</label>
                    </td>
                    <td>
                        <input name="productQuantity" type="text" placeholder="Enter quantity" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Select category</option>
                            <?php 
                            $cat = new Category();
                            $catlist = $cat->showCategory();
                            if($catlist){
                                while ($result = $catlist->fetch_assoc()){
                            
                             ?>
                            <option value=" <?php echo $result['catId'] ?> "> <?php echo $result['catName'] ?> </option>
                            
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
                            <option>Select brand</option>
                            <?php 
                            $brand = new Brand();
                            $brandlist = $brand->showBrand();
                            if($brandlist){
                                while ($result = $brandlist->fetch_assoc()){
                            
                             ?>
                            <option value=" <?php echo $result['brandId'] ?> "> <?php echo $result['brandName'] ?> </option>
                            
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
                        <textarea name="product_desc" class="tinymce"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input name="price" type="text" placeholder="Enter price" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input name="image" type="file" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Product type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select</option>
                            <option value="1">Non-featured</option>
                            <option value="0">Featured</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
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


