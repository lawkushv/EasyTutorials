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
      <li class="mynav"><a href="about.php">About Us</a></li>
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

      <h3 style="color: green;font-size:23px">Abstraction</h3>
   <div style="text-align:left">
<p>A class that is declared with abstract keyword, is known as abstract class in java. It can have abstract and non-abstract methods (method with body).</p>
<p>Before learning java abstract class, let's understand the abstraction in java first.</p>

<hr/>
<p style="font-size:22px;color:green">Abstraction in Java</p>
<p><b>Abstraction</b> is a process of hiding the implementation details and showing only functionality to the user.</p>
<p>
Another way, it shows only important things to the user and hides the internal details for example sending sms, you just type the text and send the message. You don't know the internal processing about the message delivery.</p>

<p>Abstraction lets you focus on what the object does instead of how it does it.
</p>
<ul style="font-size:18px" >
<li><p>Abstract classes may or may not contain <i>abstract methods</i>, i.e., methods without body ( public void get(); )</p></li>
<li><p>But, if a class has at least one abstract method, then the class <b>must</b> be declared abstract.</p></li>
<li><p>If a class is declared abstract, it cannot be instantiated.</p></li>
<li><p>To use an abstract class, you have to inherit it from another class, provide implementations to the abstract methods in it.</p></li>
<li><p>If you inherit an abstract class, you have to provide implementations to all the abstract methods in it.</p></li>
</ul>
<IMG SRC="Abs1.jpg">
<p style="font-size:23px;color:green">Ways to achieve Abstraction</p>
<p>There are two ways to achieve abstraction in java</p>
<ol style="font-size:18px">
<li>Abstract class (0 to 100%)</li>
<li>Interface (100%)</li>
</ol>

<hr/>
                          <img src="Abs4.jpg">
    <p style="font-size:23px;color:green">Example abstract class</p>
<div class="codeblock"><pre >
abstract class A{}
</pre></div>

<hr/>
<p style="font-size:23px;color:green">abstract method</p>
<table >
<tr><td>A method that is declared as abstract and does not have implementation is known as abstract method.
</td></tr>
</table>

<p style="font-size:23px;color:green">Example abstract method</p>
<div class="codeblock"><pre>
abstract void printStatus();//no body and abstract
</pre></div>
<hr/>

<p style="font-size:23px;color:green">Example of abstract class that has abstract method</p>
<p>In this example, Bike the abstract class that contains only one abstract method run. It implementation is provided by the Honda class.</p>

<div class="codeblock"><pre>
 abstract class Bike{
   abstract void run();
 }
 class Honda4 extends Bike{
 void run(){System.out.println("running safely..");}
 public static void main(String args[]){
  Bike obj = new Honda4();
  obj.run();
 }
 }
</pre></div>

<span class="testit"><a href="http://www.javatpoint.com/opr/test.jsp?filename=Honda4" target="_blank">Test it Now</a></span>

<div class="codeblock3"><pre>
running safely..
</pre></div>
<p style="font-size:23px;color:green">Another example of abstract class in java</p>
<p class="filename">File: TestBank.java</p>
<div class="codeblock"><pre>
abstract class Bank{  
abstract int getRateOfInterest();  
}  
class SBI extends Bank{  
int getRateOfInterest(){return 7;}  
}  
class PNB extends Bank{  
int getRateOfInterest(){return 8;}  
}  
  
class TestBank{  
public static void main(String args[]){  
Bank b;
b=new SBI();
System.out.println("Rate of Interest is: "+b.getRateOfInterest()+" %");  
b=new PNB();
System.out.println("Rate of Interest is: "+b.getRateOfInterest()+" %");  
}}  
</pre></div>

<span class="testit"><a href="http://www.javatpoint.com/opr/test.jsp?filename=TestBank" target="_blank">Test it Now</a></span>

<div class="codeblock3"><pre>
Rate of Interest is: 7 %
Rate of Interest is: 8 %
</pre></div>
<hr/>
                       
<img src="Abs2.jpg"><br>
                   <hr/>
<p align="center" style="font-size:23px;color:green"><strong>Encapsulation vs Data Abstraction</strong> </p>
<ol style="font-size:18px">
<li><a href="http://contribute.geeksforgeeks.org/encapsulation-in-java/">Encapsulation</a> is data hiding(information hiding) while Abstraction is detail hiding(implementation hiding).</li>
<li>While encapsulation groups together data and methods that act upon the data, data abstraction deals with exposing the interface to the user and hiding the details of implementation.</li>
</ol>
<p align="center" style="color:green"><strong>Advantages of Abstraction</strong></p>
<ol style="font-size:18px">
<li>It reduces the complexity of viewing the things.</li>
<li>Avoids code duplication and increases reusability.</li>
<li>Helps to increase security of an application or program as only important details are provided to the user.</li>
</ol>

<hr/>
                          <iframe width="560" height="315" src="https://www.youtube.com/embed/uWeBxtX2qiA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</div>
                                                
  </div>
  <a  class="btn btn-info pre" href="Cls.php">Previous</a>
  <a class="btn btn-info next" href="Enc.php">Next</a>
  </div>
  <br clear="all">
  <script type="text/javascript">function add_chatinline(){var hccid=85730370;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script>
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
<script src="https://www.jdoodle.com/assets/jdoodle-pym.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>