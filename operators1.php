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
}
$_SESSION['LAST_ACTIVITY'] = $time;
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
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style type="text/css">
</style>
<body background="imgpattern5.jpg">
	<nav class="navbar navbar-default navbar-fixed-top" style="margin-bottom: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#data">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="mainpage.php"><img src="img/download.png" style="float: left"></a>
      <a class="navbar-brand" href="mainpage.php">EasyTutorials</a>

    </div>
    <div class="collapse navbar-collapse" id="data">
    <ul class="nav navbar-nav">
      <li class="active mynav"><a href="mainpage.php">Home</a></li>
      <li class="mynav"><a href="#">Java</a></li>
      <li class="mynav"><a href="#">Help</a></li>
      <form class="navbar-form navbar-left search" action="/action_page.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit" >
            <a href="www.google.co.in"></a>
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
<div class="row">
  <div class="col-sm-4 list" style="overflow-y: scroll;">
  <ul style="padding-left: 5px;">
  <h3 style="margin-top: 5px">Introduction</h3><br>
  <li class="list-item"><a target="top" href="mainpage.php"> Java Introduction</a></li><br>
  <li class="list-item"><a href="installationofjava.php">Installation of JDK</a></li><br>
  <li class="list-item"><a href="Historyofjava.php">History about Java</a></li><br>
  <li class="list-item"><a href="setpath.php">How to set Path</a></li><br>
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
    <div class="jumbotron" style="text-align: center; background-color: white;color: #34495e;width: 100%" >

      <p style="color: green"><a style="font-size:150%">Operators</a></p>
	 <br>
	 
	 <p style="text-align: left;">
<p><b>Operator</b> in java is a symbol that is used to perform operations. Example: +, -, *, / etc.<p>
<p  style="text-align: left;"> There are many types of operators in java which are given below:</p>
<ul style="text-align: left ;font-size:125%"> 

<li >Unary Operator, </li>
<li >Arithmetic Operator, </li>
<li >Shift Operator, </li>
<li >Relational Operator, </li>
<li >Bitwise Operator, </li>
<li >Logical Operator, </li>
<li >Ternary Operator and </li>
<li >Assignment Operator.</li>
</ul>
<div style="text-align: left;">
<p><a style="color: light red;">The Arithmetic Operators</a></p>
<p>Arithmetic operators are used in mathematical expressions in the same way that they are used in algebra. The following table lists the arithmetic operators &minus;</p>
<p>Assume integer variable A holds 10 and variable B holds 20, then &minus;</p>
<table class="table table-bordered" style="font-size:125%">
<tr >
<th style="text-align:center;">Operator</th>
<th style="text-align:center;">Description</th>
<th style="text-align:center;">Example</th>
</tr>
<tr>
<td style="width:30%; text-align:center;vertical-align:middle">&plus; (Addition)</td>
<td style="width:40%;">Adds values on either side of the operator.</td>
<td style="text-align:center;vertical-align:middle">A &plus; B will give 30</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">- (Subtraction)</td>
<td>Subtracts right-hand operand from left-hand operand.</td>
<td style="text-align:center;vertical-align:middle">A - B will give -10</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&ast; (Multiplication)</td>
<td>Multiplies values on either side of the operator.</td>
<td style="text-align:center;vertical-align:middle">A &ast; B will give 200</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">/ (Division)</td>
<td>Divides left-hand operand by right-hand operand.</td>
<td style="text-align:center;vertical-align:middle">B / A will give 2</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">% (Modulus)</td>
<td>Divides left-hand operand by right-hand operand and returns remainder.</td>
<td style="text-align:center;vertical-align:middle">B % A will give 0</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&plus;&plus; (Increment)</td>
<td>Increases the value of operand by 1.</td>
<td style="text-align:center;vertical-align:middle">B&plus;&plus; gives 21</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">-- (Decrement)</td>
<td>Decreases the value of operand by 1.</td>
<td style="text-align:center;vertical-align:middle">B-- gives 19</td>
</tr>
</table>
  </div>
  <div style="text-align: left;">
  <p><a style="color: light red;">The Relational Operators</a></p>
  <p> Realational Operators allow you generate logical conditions that can be used with conditional as well as looping statements.Here a list of all the relatioanl operators; these operators willl return true if their operands match the given descriptions</P>
 
<table class="table table-bordered" style="font-size:125%">
<tr>
<th style="width:24%; text-align:center;">Operator</th>
<th style="width:48%; text-align:center;">Description</th>
<th style="width:28%; text-align:center;">Example</th>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">== (equal to)</td>
<td>Checks if the values of two operands are equal or not, if yes then condition becomes true.</td>
<td style="text-align:center;vertical-align:middle">(A == B) is not true.</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">!= (not equal to)</td>
<td>Checks if the values of two operands are equal or not, if values are not equal then condition becomes true.</td>
<td style="text-align:center;vertical-align:middle">(A != B) is true.</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&gt; (greater than)</td>
<td>Checks if the value of left operand is greater than the value of right operand, if yes then condition becomes true.</td>
<td style="text-align:center;vertical-align:middle">(A &gt; B) is not true.</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&lt; (less than)</td>
<td>Checks if the value of left operand is less than the value of right operand, if yes then condition becomes true.</td>
<td style="text-align:center;vertical-align:middle">(A &lt; B) is true.</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&gt;= (greater than or equal to)</td>
<td>Checks if the value of left operand is greater than or equal to the value of right operand, if yes then condition becomes true.</td>
<td style="text-align:center;vertical-align:middle">(A &gt;= B) is not true.</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&lt;= (less than or equal to)</td>
<td>Checks if the value of left operand is less than or equal to the value of right operand, if yes then condition becomes true.</td>
<td style="text-align:center;vertical-align:middle">(A &lt;= B) is true.</td>
</tr>
</table>
   <p><a style="color: light red;">The Bitwise Operators</a></p>
<p>Java defines several bitwise operators, which can be applied to the integer types, long, int, short, char, and byte.</p>
<p>Bitwise operator works on bits and performs bit-by-bit operation. Assume if a = 60 and b = 13; now in binary format they will be as follows &minus;</p>
<p>a = 0011 1100</p>
<p>b = 0000 1101</p>
<p>-----------------</p>
<p>a&amp;b = 0000 1100</p>
<p>a|b = 0011 1101</p>
<p>a&#94;b = 0011 0001</p>
<p>~a&nbsp; = 1100 0011</p>
<p>The following table lists the bitwise operators &minus;</p>
<p>Assume integer variable A holds 60 and variable B holds 13 then &minus;</p>

<table class="table table-bordered" style="font-size:125%">
<tr>
<th style="text-align:center;">Operator</th>
<th style="text-align:center;">Description</th>
<th style="text-align:center;">Example</th>
</tr>
<tr>
<td style="width:25%;text-align:center;vertical-align:middle">&amp; (bitwise and)</td>
<td style="width:45%;vertical-align:middle">Binary AND Operator copies a bit to the result if it exists in both operands.</td>
<td style="width:35%;text-align:center; vertical-align:middle">(A &amp; B) will give 12 which is 0000 1100</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">| (bitwise or)</td>
<td style="vertical-align:middle;">Binary OR Operator copies a bit if it exists in either operand.</td>
<td style="text-align:center;vertical-align:middle">(A | B) will give 61 which is 0011 1101</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&#94; (bitwise XOR)</td>
<td style="vertical-align:middle;">Binary XOR Operator copies the bit if it is set in one operand but not both.</td>
<td style="text-align:center;vertical-align:middle">(A &#94; B) will give 49 which is 0011 0001</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">~ (bitwise compliment)</td>
<td style="vertical-align:middle;">Binary Ones Complement Operator is unary and has the effect of 'flipping' bits.</td>
<td style="text-align:center;vertical-align:middle">(~A ) will give -61 which is 1100 0011 in 2's complement form due to a signed binary number.</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&lt;&lt; (left shift)</td>
<td style="vertical-align:middle;">Binary Left Shift Operator. The left operands value is moved left by the number of bits specified by the right operand.</td>
<td style="text-align:center;vertical-align:middle">A &lt;&lt; 2 will give 240 which is 1111 0000</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&gt;&gt; (right shift)</td>
<td>Binary Right Shift Operator. The left operands value is moved right by the number of bits specified by the right operand.</td>
<td style="text-align:center;vertical-align:middle">A &gt;&gt; 2 will give 15 which is 1111</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&gt;&gt;&gt; (zero fill right shift)</td>
<td>Shift right zero fill operator. The left operands value is moved right by the number of bits specified by the right operand and shifted values are filled up with zeros.</td>
<td style="text-align:center;vertical-align:middle">A &gt;&gt;&gt;2 will give 15 which is 0000 1111</td>
</tr>
</table>
<<p><a style="color: light red;">The Logical Operators</a></p>
<p>The following table lists the logical operators &minus;</p>
<p>Assume Boolean variables A holds true and variable B holds false, then &minus;</p>

<table class="table table-bordered" style="font-size:125%">
<tr>
<th style="text-align:center;width:23%;">Operator</th>
<th style="text-align:center;">Description</th>
<th style="text-align:center;width:24%">Example</th>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&amp;&amp; (logical and)</td>
<td>Called Logical AND operator. If both the operands are non-zero, then the condition becomes true.</td>
<td style="text-align:center;vertical-align:middle">(A &amp;&amp; B) is false</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">|| (logical or)</td>
<td>Called Logical OR Operator. If any of the two operands are non-zero, then the condition becomes true.</td>
<td style="text-align:center;vertical-align:middle">(A || B) is true</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">! (logical not)</td>
<td>Called Logical NOT Operator. Use to reverses the logical state of its operand. If a condition is true then Logical NOT operator will make false.</td>
<td style="text-align:center;vertical-align:middle">!(A &amp;&amp; B) is true</td>
</tr>
</table>
<p><a style="color: light red;">The Assignment Operators</a></p>
<p>Following are the assignment operators supported by Java language &minus;</p>

<table class="table table-bordered" style="font-size:125%">
<tr>
<th style="text-align:center;">Operator</th>
<th style="text-align:center;width:50%">Description</th>
<th style="text-align:center;">Example</th>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">=</td>
<td>Simple assignment operator. Assigns values from right side operands to left side operand.</td>
<td style="text-align:center;vertical-align:middle">C = A &plus; B will assign value of A &plus; B into C</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&plus;=</td>
<td>Add AND assignment operator. It adds right operand to the left operand and assign the result to left operand.</td>
<td style="text-align:center;vertical-align:middle">C &plus;= A is equivalent to C = C &plus; A</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">-=</td>
<td>Subtract AND assignment operator. It subtracts right operand from the left operand and assign the result to left operand.</td>
<td style="text-align:center;vertical-align:middle">C -= A is equivalent to C = C – A</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&ast;=</td>
<td>Multiply AND assignment operator. It multiplies right operand with the left operand and assign the result to left operand.</td>
<td style="text-align:center;vertical-align:middle">C &ast;= A is equivalent to C = C &ast; A</td>
</tr>
<tr>
<td class="ts">/=</td>
<td>Divide AND assignment operator. It divides left operand with the right operand and assign the result to left operand.</td>
<td style="text-align:center;vertical-align:middle">C /= A is equivalent to C = C / A</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">%=</td>
<td>Modulus AND assignment operator. It takes modulus using two operands and assign the result to left operand.</td>
<td style="text-align:center;vertical-align:middle">C %= A is equivalent to C = C % A</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&lt;&lt;=</td>
<td style="vertical-align:middle;">Left shift AND assignment operator.</td>
<td style="text-align:center;vertical-align:middle">C &lt;&lt;= 2 is same as C = C &lt;&lt; 2</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&gt;&gt;=</td>
<td style="vertical-align:middle;">Right shift AND assignment operator.</td>
<td style="text-align:center;vertical-align:middle">C &gt;&gt;= 2 is same as C = C &gt;&gt; 2</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&amp;=</td>
<td style="vertical-align:middle;">Bitwise AND assignment operator.</td>
<td style="text-align:center;vertical-align:middle">C &amp;= 2 is same as C = C &amp; 2</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">&#94;=</td>
<td>bitwise exclusive OR and assignment operator.</td>
<td style="text-align:center;vertical-align:middle">C &#94;= 2 is same as C = C &#94; 2</td>
</tr>
<tr>
<td style="text-align:center;vertical-align:middle">|=</td>
<td>bitwise inclusive OR and assignment operator.</td>
<td style="text-align:center;vertical-align:middle">C |= 2 is same as C = C | 2</td>
</tr>
</table>
     </div>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/Y-ubmaLsd5E" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
  </div>
  <div data-pym-src="https://www.jdoodle.com/a/sHB"></div>
    
  

  <a  class="btn btn-info pre" href="var.php">Previous</a>
  <a class="btn btn-info next" href="Cls.php">Next</a>
  </div>
  <br clear="all">
  <div class="comment_input">
        <form name="form1">
          <!--<input type="text" name="name" placeholder="Name..."/></br></br>-->
          <textarea name="comments" placeholder="Leave Comments Here..." style="width:635px; height:100px;"></textarea></br></br>
            <a href="#" onClick="commentSubmit()" class="button">Post</a></br>
        </form>
    </div>
  <div id="comment_logs">
    <?php
     $result = mysqli_query($con, "SELECT * FROM comments ORDER BY id DESC");
while($row=mysqli_fetch_array($result)){
echo "<div class='comments_content'>";
echo "<h4><a href='delete.php?id=" . $row['id'] . "'> X</a></h4>";
echo "<h1>" . ucwords($row['name']). "</h1>";
echo "<h2>" . $row['date_publish'] . "</h2></br>";
echo "<h3>" . $row['comments'] . "</h3>";
echo "</div>";
}
mysqli_close($con);
    ?>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

  function commentSubmit(){
    if(form1.name.value == '' && form1.comments.value == ''){ //exit if one of the field is blank
      alert('Enter your message !');
      return;
    }
    var name = form1.name.value;
    var comments = form1.comments.value;
    var xmlhttp = new XMLHttpRequest(); //http request instance
    
    xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
      if(xmlhttp.readyState==4&&xmlhttp.status==200){
        document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
      }
    }
    xmlhttp.open('GET', 'insert.php?name='+name+'&comments='+comments, true); //open and send http request
    xmlhttp.send();
  }
  
    $(document).ready(function(e) {
      $.ajaxSetup({cache:false});
      setInterval(function() {$('#comment_logs').load('logs.php');}, 2000);
    });
    
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>