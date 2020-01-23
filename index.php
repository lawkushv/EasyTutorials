<?php
session_start();
require'dbconfig/config.php';
if(isset($_SESSION['email']))
    {
      header('location:mainpage.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>EasyTutorials</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body background="img/back.jpg">
	<div class="myform">
		<form  method="post" action="index.php">
		
			<h2><label>Log In</label></h2>
			<img src="img/avatar.png" class="img">
			<br>
		
		<div class="label">
			<label><b>Full Name</b></label>
			<br>
			<input type="text" name="username" class="inputvalue" placeholder="User name" required>
			<br>
			<label><b>Password</b></label>
			<br>
			<input type="password" class="inputvalue" name="password" placeholder="Password" required>
			<label><b>Email</b></label>
			<input type="email" class="inputvalue" name="email" placeholder="Email Required" pattern="[a-zA-Z0-9$&_.]{3,15}@[a-z]{3,7}[.][a-z]{2,3}" required>
		</div>
			<input type="submit" name="login" class="submit" value="Log In">
			<a href="register.php"><input type="button" name="signup" class="signup" value="Sign Up"></a>
		</form>  
	</div>
	<?php
	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$email=$_POST['email'];

		$query="select *from fileupload where name='$username' and password='$password'and email='$email'";
		$query_run=mysqli_query($con,$query);
		if(mysqli_num_rows($query_run)>0)
		{
			$row=mysqli_fetch_assoc($query_run);
			$_SESSION['username']=$row['name'];
			$_SESSION['imagelink']=$row['imagelink'];
			$_SESSION['email']=$row['email'];
			//for online
			$query="insert into online values('','$username','$password','$email')";
			$query_run=mysqli_query($con,$query);

			//end
			header('location:mainpage.php');
		}
		else
		{
			echo '<script type="text/javascript"> alert(" User Not Registered...!!!") </script>';
		}
	}

	?>

</body>
</html>