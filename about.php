<?php
session_start();
require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Easy Tutorials</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<style type="text/css">
</style>
<body background="imgpattern5.jpg">
	<nav class="navbar navbar-default default" style="margin-bottom: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#data">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="img/download.png" style="float: left">
      <a class="navbar-brand" href="mainpage.php">EasyTutorials</a>

    </div>
    <div class="collapse navbar-collapse" id="data">
    <ul class="nav navbar-nav">
      <li class="active"><a href="mainpage.php">Home</a></li>
      <li><a href="mainpage.php">Java</a></li>
      <li><a href="about.php">About Us</a></li>
      <form class="navbar-form navbar-left search" action="/action_page.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit" >
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </ul>
  <form method="post">
    <button type="submit" class="btn btn-info" name="online" >
      Online
    </button>
  </form>
    <?php
    if(isset($_POST['online']))
    {
      $query="select * from online";
      $query_run=mysqli_query($con,$query);
      $count=mysqli_num_rows($query_run);
    while ($row=mysqli_fetch_assoc($query_run)) 
      {
        //$count++;
        //echo '<label id="online">Name:'.$row['name'].' Eamil:'.$row['email'].' </label>';
      }
      echo '<button type="button" class="btn btn-info">Online <span class="badge">'.$count.'</span></button>';

    }

    ?>
    <form method="post">
    <button class="btn btn-info" name="logout">Log Out</button>
  </form>
    <?php
    if(isset($_POST['logout']))
    {
      $email=$_SESSION['email'];
      $query="delete from online where email='$email'";
      $query_run=mysqli_query($con,$query);
      if(mysqli_fetch_assoc($query_run))
      {
        echo '<script type="text/javascript"> alert("successful logout") </script>';
      }
      session_destroy();
      header('location:index.php');
    }

    ?>
  </div>
  </div>
</nav>
<br clear="all">
<div class="jumbotron" style="text-align: center; background-color: white;color: #34495e;width: 100%" >

      <h2 style="color:#00c0d7;">About Us</h2>
    <div style="height: 180px; width: 100%;background-color: #ececec;border-radius: 5px;">
      <img src="law2.png" style="height: 150px;width: 150px;border-radius: 50%;float: left;margin: 10px 150px ;border:5px solid #00c0d7;">
      <h3 style="color:#666666;text-align: left;margin-top: 20px;">Name: Lawkush Prasad</h3><br>
      <h3 style="color:#666666;text-align:left; margin: 4px  ;"> Course: Master Of Computer Applications</h3><br>
      <h3 style="color:#666666;text-align:left;margin: 4px;"> Semester: Fourth</h3><br>
    </div>


     <div style="height: 180px; width: 100%;border-radius: 5px;">
      <img src="gautam.png" style="height: 150px;width: 150px;border-radius: 50%;float: left;margin: 10px 150px ;border:5px solid #00c0d7;">
      <h3 style="color:#666666;text-align: left;margin-top: 20px;">Name: Gautam Sharma</h3><br>
      <h3 style="color:#666666;text-align:left; margin: 4px  ;"> Course: Master Of Computer Applications</h3><br>
      <h3 style="color:#666666;text-align:left;margin: 4px;"> Semester: Fourth</h3><br>
      
      
    </div>


     <div style="height: 180px; width: 100%;background-color: #ececec;border-radius: 5px;">
      <img src="geet.png" style="height: 150px;width: 150px;border-radius: 50%;float: left;margin: 10px 150px ;border:5px solid #00c0d7;">
      <h3 style="color:#666666;text-align: left;margin-top: 20px;">Name: Geetanjai Singh</h3><br>
      <h3 style="color:#666666;text-align:left; margin: 4px  ;"> Course: Master Of Computer Applications</h3><br>
      <h3 style="color:#666666;text-align:left;margin: 4px;"> Semester: Fourth</h3><br>  
    </div>


     <div style="height: 180px; width: 100%;border-radius: 5px;">
      <img src="nidhi.png" style="height: 150px;width: 150px;border-radius: 50%;float: left;margin: 10px 150px ;border:5px solid #00c0d7;">
      <h3 style="color:#666666;text-align: left;margin-top: 20px;">Name:Nidhi Tyagi</h3><br>
      <h3 style="color:#666666;text-align:left; margin: 4px  ;"> Course: Master Of Computer Applications</h3><br>
      <h3 style="color:#666666;text-align:left;margin: 4px;"> Semester: Fourth</h3><br>
      
      
    </div>
      
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>