<?php
session_start();
 require'dbconfig/config.php';
?>   
<!DOCTYPE html>
<html>
<head>
	<title>Cloud</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="myform">
			<h2><label>Home Page</label></h2>

			<?php

		echo '<img src="'.$_SESSION['imagelink'].'" class="img">';
			?>
			<br>
			<label>Welcome
			<?php
		echo $_SESSION['username'] ?>
			</label>
		<form class="loginform" method="post">
			<input type="submit" name="logout" class="signup" value="Log Out">
		</form>
		<?php
		if(isset($_POST['logout']))
		{
			session_destroy();
			header('location:index.php');
		}


		?>
	</div>

</body>
</html>