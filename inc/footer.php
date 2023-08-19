</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="contact.php"><span>About Us</span></a></li>
						<li><a href="contact.php"><span>Services</span></a></li>
						<li><a href="contact.php"><span>Find Services</span></a></li>
						<li><a href="contact.php"><span>Contact</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why choose us?</h4>
						<ul>
						<li><a href="contact.php"><span>About Us</span></a></li>
						<li><a href="contact.php"><span>Services</span></a></li>
						<li><a href="contact.php"><span>Find Services</span></a></li>
						<li><a href="contact.php"><span>Policy</span></a></li>
						
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Your Cart</h4>
						<ul>
							<li><a href="login.php"><span>Login</span></a></li>
							<li><a href="cart.php"><span>Cart</span></a></li>
							<li><a href="wishlist.php"><span>Wishlist Product</span></a></li>
							<!-- <li><a href="#">Track My Order</a></li> -->
							<li><a href="contact.php"><span>Help</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>0917741703</span></li>
							<li><span>0985918973</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li class="facebook"><a href="https://www.facebook.com/tnkhoa.fit.hanu" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p>@2020 Created by Group 24 - SAD Fall 2020 - Ngoc Khoa, Van Toan, Anh Tu, Hoang Long, Khanh Nam</p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>
