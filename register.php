<?php
 require'dbconfig/config.php';
?>   
<!DOCTYPE html>
<html>
<head>
	<title>Easy Tutorials</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body background="img/back.jpg">
	<div class="myform">
		<form class="loginform" method="post" action="register.php" enctype="multipart/form-data">
			<h2><label>Registration Page</label></h2>
			<img  id="uploadpriview" src="img/avatar.png" class="img">
			<br>
			<input type="file" id="imagelink" name="imagelink" accept=".jpeg,.jpg,.png" onchange="priview();">
		<script type="text/javascript">
			
			function priview(){
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("imagelink").files[0]);
				oFReader.onload= function(oFREvent){
					document.getElementById("uploadpriview").src=oFREvent.target.result;
				};
			};


		</script>
		<div class="label">
			<label><b>Full Name</b></label>
			<br>
			<input type="text" name="username" class="inputvalue" placeholder="User name" required>
			<br>
			<label><b>Password</b></label>
			<br>
			<input type="password" class="inputvalue" name="password" placeholder="Password" required><br>
			<label><b>Confirm Password</b></label>
			<br>
			<input type="password" class="inputvalue" name="cpassword" placeholder="Password" required>
			<label><b>Email</b></label>
			<input type="email" class="inputvalue" name="email" placeholder="Email Required" pattern="[a-zA-Z0-9$&_.]{4,15}@[a-z]{3,7}[.][a-z]{2,3}" required>
		</div>
			<br>
			<a href="register.php"><input type="submit" name="submit" class="signup" value="Submit"></a>
			<a href="index.php"><input type="button" name="signup" class="signup" value="Back"></a>
		</form>
	</div>

	<?php
		if(isset($_POST['submit']))
		{
			//echo '<script type="text/javascript"> alert("submit button is clicked") </script>';
			$username=$_POST['username'];
			$password=$_POST['password'];
			$cpassword=$_POST['cpassword'];
			$email=$_POST['email'];

			$img_name=$_FILES['imagelink']['name'];
			$img_size=$_FILES['imagelink']['size'];
			$img_tmp=$_FILES['imagelink']['tmp_name'];
			$directory='uploads/';
			$target_file=$directory.$img_name;


			if($password==$cpassword)
			{
				$query="select *from fileupload where name='$username'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
				echo '<script type="text/javascript"> alert("User already Exits") </script>';
				}
				else
				{
					move_uploaded_file($img_tmp,$target_file);
					$query="insert into fileupload values('','$username','$password','$target_file','$email')";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
					echo '<script type="text/javascript"> alert("User registered Successfully.... Go to Log In page.") </script>';
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error..!!!") </script>';
					}
				}

			}
			else
			{
				echo '<script type="text/javascript"> alert("Confirm password does not match..") </script>';
			}

		}

	?>  

</body>
</html>