<?php
session_start();
require 'dbconfig/config.php';
$time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 600;
if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    $email=$_SESSION['email'];
      $query="delete from online where email='$email'";
      $query_run=mysqli_query($con,$query);
      session_unset();
      session_destroy();
      header('location:index.php');
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
  <li class="list-item"><a href="installationofjava.php">Installation of JDK</a></li><br>
  <li class="list-item"><a href="Historyofjava.php">History about Java</a></li><br>
  <li class="list-item"><a href="setpath.php">How to set Path</a></li><br>
  <li class="list-item"><a href="">Variable and Data types</li></a><br>
  <li class="list-item"><a href="">Operators</a></li><br>
  <li class="list-item"><a href="">JVM</a></li><br>
   <li class="list-item"><a href="">FeaturesOfJva</a></li><br>
  <h3 style="margin-top: 5px">Control Statements</h3><br>
  <li class="list-item"><a href="">History about Java</a></li><br>
  <li class="list-item"><a href="">History about Java</a></li><br>
  <li class="list-item"><a href="">History about Java</a></li><br>
  <li class="list-item"><a href="">History about Java</a></li><br>
  <li class="list-item"><a href="">History about Java</a></li><br>

  </ul>
  </div>
  <div class="col-sm-8"">
    <div class="jumbotron" style="text-align: left; background-color: white;color: #34495e;width: 100%; font-size: 17px;" >

      <h3 style="color: green"><center>  Operators in Java</center></h3>
    <p style="text-align: left;">
    Java provides many types of operators which can be used according to the need. They are classified based on the functionality they provide. Some of the types are-
    </p>
    <ol>
      <li> Arithmatic Operators</li>
      <li>Uniory Operators</li>
      <li>Assignment Operators</li>
      <li>Relational Operator</li>
      <li>Logical Oerators</li>
      <li>Ternary Operators</li>
    </ol>
    <ol>
       <h3 style="color: green"> 1-Arithmatic Operator: </h3>
       </ol>
       <p align="center">They are used to perform simple arithmetic operations on primitive data types.</p>
       <ul>
        <li type="square"> *: Maltiplication</li> 
       <li type="square"> /: Division</li>
       <li type="square"> +: Addition</li>
     </ul>
     <div style="width: 450px; text-align: center; margin: 0 auto;height: 260px; padding-bottom: 20px;">
  <img src="img/kjl.jpg" width="100%" height="100%">
</div>
    <div><div id="highlighter_968875" class="syntaxhighlighter nogutter  java"><table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="code"><div class="container"><div class="line number1 index0 alt2"><code class="java comments">// Java program to illustrate</code></div><div class="line number2 index1 alt1"><code class="java comments">// arithmetic operators</code></div><div class="line number3 index2 alt2"><code class="java keyword">public</code> <code class="java keyword">class</code> <code class="java plain">operators </code></div><div class="line number4 index3 alt1"><code class="java plain">{</code></div><div class="line number5 index4 alt2"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java keyword">public</code> <code class="java keyword">static</code> <code class="java keyword">void</code> <code class="java plain">main(String[] args) </code></div><div class="line number6 index5 alt1"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java plain">{</code></div><div class="line number7 index6 alt2"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java keyword">int</code> <code class="java plain">a = </code><code class="java value">20</code><code class="java plain">, b = </code><code class="java value">10</code><code class="java plain">, c = </code><code class="java value">0</code><code class="java plain">, d = </code><code class="java value">20</code><code class="java plain">, e = </code><code class="java value">40</code><code class="java plain">, f = </code><code class="java value">30</code><code class="java plain">;</code></div><div class="line number8 index7 alt1"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java plain">String x = </code><code class="java string">"Thank"</code><code class="java plain">, y = </code><code class="java string">"You"</code><code class="java plain">;</code></div><div class="line number9 index8 alt2">&nbsp;</div><div class="line number10 index9 alt1"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java comments">// + and - operator</code></div><div class="line number11 index10 alt2"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java plain">System.out.println(</code><code class="java string">"a + b = "</code><code class="java plain">+(a + b));</code></div><div class="line number12 index11 alt1"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java plain">System.out.println(</code><code class="java string">"a - b = "</code><code class="java plain">+(a - b));</code></div><div class="line number13 index12 alt2">&nbsp;</div><div class="line number14 index13 alt1"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java comments">// + operator if used with strings</code></div><div class="line number15 index14 alt2"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java comments">// concatenates the given strings.</code></div><div class="line number16 index15 alt1"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java plain">System.out.println(</code><code class="java string">"x + y = "</code><code class="java plain">+x + y);</code></div><div class="line number17 index16 alt2">&nbsp;</div><div class="line number18 index17 alt1"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java comments">// * and / operator</code></div><div class="line number19 index18 alt2"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java plain">System.out.println(</code><code class="java string">"a * b = "</code><code class="java plain">+(a * b));</code></div><div class="line number20 index19 alt1"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java plain">System.out.println(</code><code class="java string">"a / b = "</code><code class="java plain">+(a / b));</code></div><div class="line number21 index20 alt2">&nbsp;</div><div class="line number22 index21 alt1"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java comments">// modulo operator gives remainder</code></div><div class="line number23 index22 alt2"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java comments">// on dividing first operand with second</code></div><div class="line number24 index23 alt1"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java plain">System.out.println(</code><code class="java string">"a % b = "</code><code class="java plain">+(a % b));</code></div><div class="line number25 index24 alt2">&nbsp;</div><div class="line number26 index25 alt1"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java comments">// if denominator is 0 in division</code></div><div class="line number27 index26 alt2"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java comments">// then Arithmetic exception is thrown.</code></div><div class="line number28 index27 alt1"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java comments">// uncommenting below line would throw</code></div><div class="line number29 index28 alt2"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java comments">// an exception</code></div><div class="line number30 index29 alt1"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java comments">// System.out.println(a/c);</code></div><div class="line number31 index30 alt2"><code class="java spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="java plain">}</code></div><div class="line number32 index31 alt1"><code class="java plain">}</code></div></div></td></tr></tbody></table><button class="runIdeBtn" onclick="redirect( 'highlighter_968875', 'java' )">Run on IDE</button></div></div>
        <pre> 
        a+b =30
        a-b =10
        x+y =ThankuYou
        a*b=200
        a/b=2
        a%b=0
      </pre>
      <ol>
      
           <h3 style="color: green">2-Unary Operator: </h3>
         </ol>
         
         <p>Unary operators needs only one operand. They are used to increment, decrement or negate a value.</p>
         
        <li type="square"> - :Unary minus,<p>used for negating the values</p></li>
        <li type="square"> + :Unary plus,<p>used for giving positive values. Only used when deliberately converting a negative value to positive.</p></li>
        <ol>
        <h3 style="color: green">3- Assignment Operator: </h3>
       </ol>
        <p>'=' ‘=’ Assignment operator is used to assign a value to any variable. It has a right to left associativity, i.e value given on right hand side of operator is assigned to the variable on the left and therefore right hand side value must be declared before using it or should be a constant.
General format of assignment operator is,</p>
  <li type="square">  + =, <b> Equal to</b><p>for adding left operand with right operand and then assigning it to variable on the left</p></li>
    <li type="square"> -=, <b> Not  equal to </b><p>for subtracting left operand with right operand and then assigning it to variable on the left.=</p></li>




             
<div style="width: 450px; text-align: center; margin: 0 auto;height: 260px; padding-bottom: 20px;">
  <img src="img/java.png" width="100%" height="100%">
</div>
<div style="width: 100%;text-align: center;">
<iframe width="560" height="315" src="https://www.youtube.com/embed/Y6NheSwTsDs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>  

</div> 
 </div>
  <a  class="btn btn-info pre" href="Operators.php">Previous</a>
  <a class="btn btn-info next" href="">Next</a>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>