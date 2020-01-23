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
	<nav class="navbar navbar-default default navbar-fixed-top" style="margin-bottom: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#data">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="img/download.png" style="float: left">
      <a class="navbar-brand" href="#">EasyTutorials</a>

    </div>
    <div class="collapse navbar-collapse" id="data">
    <ul class="nav navbar-nav">
      <li class="active mynav"><a href="#">Home</a></li>
      <li class="mynav"><a href="#">Java</a></li>
      <li class="mynav"><a href="#">Help</a></li>
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
      $count=0;
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
      session_destroy();
      header('location:index.php');
    }

    ?>
    <?php
    if(!isset($_SESSION['email']))
    {
      header('location:randomlogin.php');
    }
    echo '<label class="label">'.ucwords($_SESSION['username']).'</label>';
    echo '<img src="'.$_SESSION['imagelink'].'" style="border-radius:50%;" class="img">';
    ?>
  </div>
    
  </div>
</nav>
<br clear="all">
<div class="row" style="margin-left: 3px;margin-right: 3px;">
  <div class="col-sm-4 list" style="overflow-y: scroll;">
  <ul style="padding-left: 5px;">
  <h3 style="margin-top: 5px">Introduction</h3><br>
  <li class="list-item"><a target="top" href="mainpage.php"> Java Introduction</a></li><br>
  <li class="list-item"><a href="installjava.php">Installation of JDK</a></li><br>
  <li class="list-item"><a href="">History about Java</a></li><br>
  <li class="list-item"><a href="">How to set Path</a></li><br>
  <li class="list-item"><a href="var.php">Variable and Data types</li></a><br>
  <li class="list-item"><a href="operators1.php">Operators</a></li><br>
  <h3 style="margin-top: 5px">Objet Oriented Programmming</h3><br>
  <li class="list-item"><a href="Cls.php">Class & Object</a></li><br>
  <li class="list-item"><a href="Abs.php">Java Abstraction</a></li><br>
  <li class="list-item"><a href="Enc.php">Java Encapsulation</a></li><br>
  <li class="list-item"><a href="Poly.php">Java Polymorphism</a></li><br>
  <li class="list-item"><a href="Inh.php">Java Inheritance</a></li><br>
  <h3 style="margin-top: 5px">Control Statements</h3><br>
  <li class="list-item"><a href="Loo.php">Loop Statements</a></li><br>
  <li class="list-item"><a href="If.php">IF Else </a></li><br>
  <li class="list-item"><a href="Swi.php">Switch Statements</a></li><br>
  <h3 style="margin-top: 5px">Advance Java</h3><br>
  <li class="list-item"><a href="stringhandling.php">String Handling</a></li><br>
  <li class="list-item"><a href="Mul.php">Multi Threading</a></li><br>
  <li class="list-item"><a href="App.php">Applet</a></li><br>
  <li class="list-item"><a href="Jdb.php">JDBC</a></li><br>
  <li class="list-item"><a href="Ser.php">Servlet</a></li><br>

  </ul>
  </div>
  <div class="col-sm-8"">
    <div class="jumbotron" style="text-align: left; background-color: white;color: #34495e;width: 100%" >

      <h3 style="color: green">java string...</h3>
    <p style="text-align: left;">
     In java, string is basically an object that represents sequence of char values. An array of characters works same as java string.The basic aim of String Handling concept is storing the string data in the main memory (RAM), manipulating the data of the String, retrieving the part of the String etc. String Handling provides a lot of concepts that can be performed on a string such as concatenation of string, comparison of string, find sub string etc.</p>
     <p> For example:</p>

      <h3 style="color: green">charSequence:-</h3>

     <div style="width: 370px; text-align: center; margin: 0 auto;height: 251px; padding-bottom: 20px;">
  <img src="img/string.png" width="100%" height="100%"> 
  </div>     
    
    <div>
      <pre>
        
    char[] ch={'j','a','v','a','t','p','o','i','n','t'};<br>
    String s=new String(ch);<br>
    
  </pre>
  </div>
       <h3 style="color: green">How to create String object ? </h3>
       <P>
There are two ways to create String object..
         
       </P>
       <ol>
        <li>by String literal</li>
        <li>By new keyword</li>
      </ol>
         <h3 style="color: green"> 1) By String literal </h3>
         <p>Java String literal is created by using double quotes. For Example:</p>
         <pre>
          String s="welcome":
        </pre>
        <p>Each time you create a string literal, the JVM checks the string constant pool first. If the string already exists in the pool, a reference to the pooled instance is returned. If string doesn't exist in the pool, a new string instance is created and placed in the pool. For example:</p>
        <pre>
          String s1="welcome";
          string s2="welcome";// will not create new instance
        </pre>
         <h3 style="color: green"> 2) By New keyword </h3>
         <pre>
          String s= new string("welcome");//create teo object and one refrence variable;
         </pre>
         <p>
          In such case, JVM will create a new string object in normal(non pool) heap memory and the literal "Welcome" will be placed in the string constant pool. The variable s will refer to the object in heap(non pool).


         </p>



       
<div style="width: 370px; text-align: center; margin: 0 auto;height: 251px; padding-bottom: 20px;">
  <img src="img/first.png" width="100%" height="100%">
</div>
<div style="width: 100%;text-align: center;">
  <iframe width="560" height="315" src="https://www.youtube.com/embed/sliTbMkQBZ4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
  
</div> 
 </div>
  <a  class="btn btn-info pre" href="Swi.php">Previous</a>
  <a class="btn btn-info next" href="Mul.php">Next</a>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>