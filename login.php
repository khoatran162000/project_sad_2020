<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php 
	$login_check = Session::get('customer_login');
	if ($login_check) {
		header('Location:order.php'); 
	}
?>

<?php
    // gọi class category
     
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertCustomer = $cs -> insert_customer($_POST); // hàm check catName khi submit lên
    }
 ?>
 <?php 
 	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $login_Customer = $cs -> login_customer($_POST); // hàm check catName khi submit lên
    }
 ?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Login</h3>
        	<p>Please enter email and password!</p>
        	<?php 
    		if (isset($login_Customer)) {
    			echo $login_Customer;
    		}
    		 ?>
        	<form action="" method="POST">
                	<input type="text" name="email" class="field" placeholder="Email" >
                    <input type="password" name="password" class="field" placeholder="Password" >
                 
                 <!-- <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p> -->
                    <div class="buttons"><div><input type="submit" name="login" class"grey" value="Login" style="
    background: #ffffff;
"></div></div>
                    </form>
                    </div>

    	<div class="register_account">
    		<h3>Register</h3>
    		<?php 
    		if (isset($insertCustomer)) {
    			echo $insertCustomer;
    		}
    		 ?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Enter Your Name">
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Enter your city" >
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Enter zipcode">
							</div>
							<div>
								<input type="text" name="email" placeholder="Enter your email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Enter your address">
						</div>	        
	
		           <div>
		          <input type="text" name="phone" placeholder="Enter your phone number">
		          </div>
				  
				  <div>
					<input type="password" name="password" placeholder="Enter password" style="
    width: 95%;
    height: 33px;
    margin-top: 7px;
">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit" class"grey" value="Create account" style="
    background: #ffffff;
"></div></div>
		    
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>


<?php 
	include 'inc/footer.php';
 ?>
