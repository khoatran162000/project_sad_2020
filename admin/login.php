<?php 
	// gọi file adminlogin
	include '../model/adminlogin.php';
 ?>
<?php include '../controllers/adminControllers/loginController.php'; ?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span><?php 
				if(isset($login_check)){
					echo $login_check;
				}
			 ?>  </span>
			<div>
				<input type="text" placeholder="Username" required="" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Admin Management Webpage</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>