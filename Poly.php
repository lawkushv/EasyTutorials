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

      <h3 style="color: green;font-size:28px">Polymorphism</h3>
<div style="text-align:left ">
<p><strong>Polymorphism in java</strong> is a concept by which we can perform a <em>single action by different ways</em>. Polymorphism is derived from 2 greek words: poly and morphs. The word "poly" means many and "morphs" means forms. So polymorphism means many forms.</p>
<p>There are two types of polymorphism in java: compile time polymorphism and runtime polymorphism. We can perform polymorphism in java by method overloading and method overriding.</p>
<p>If you overload static method in java, it is the example of compile time polymorphism. Here, we will focus on  runtime polymorphism in java.</p>
<p>There are two types of polymorphism:</p><ul style="font-size:20px"><li>Static Polymorphism</li><li>Dynamic Polymorphism.</li></ul>
<img src="Polymorphism.png"><br>
<p style="font-size:23px; color:green">Compile time Polymorphism (or Static polymorphism):</p>
<p>Polymorphism that is resolved during compiler time is known as static polymorphism. Method overloading is an example of compile time polymorphism.<br />
<strong>Method Overloading</strong>: This allows us to have more than one method having the same name, if the parameters of methods are different in number, sequence and data types of parameters. We have already discussed Method overloading here
<h3>Example of static Polymorphism</h3>
<p>Method overloading is one of the way java supports static polymorphism. Here we have two definitions of the same method add() which add method would be called is determined by the parameter list at the compile time. That is the reason this is also known as compile time polymorphism.</p>
<pre>class SimpleCalculator
{
    int add(int a, int b)
    {
         return a+b;
    }
    int  add(int a, int b, int c)  
    {
         return a+b+c;
    }
}
public class Demo
{
   public static void main(String args[])
   {
	   SimpleCalculator obj = new SimpleCalculator();
       System.out.println(obj.add(10, 20));
       System.out.println(obj.add(10, 20, 30));
   }
}
</pre>
<p><strong>Output:</strong></p>
<pre>30
60
</pre>
<img src="Polymorphism.png">                

<p style="font-size:25px; color:green">Runtime Polymorphism in Java:-</p><br>
<p><b>Runtime polymorphism</b> or <b>Dynamic Method Dispatch</b> is a process in which a call to an overridden method is resolved at runtime rather than compile-time.
</p><p>
In this process, an overridden method is called through the reference variable of a superclass. The determination of the method to be called is based on the object being referred to by the reference variable.
</p>

<p>Let's first understand the upcasting before Runtime Polymorphism.</p>
<a id="upcasting"></a>
<h3 class="h4">Upcasting</h3>
<p>
When reference variable of Parent class refers to the object of Child class, it is known as upcasting. For example:
</p>
 <p style="font-size:23px;color:green">Example of Java Runtime Polymorphism</h3>
<p>In this example, we are creating two classes Bike and Splendar. Splendar class extends Bike class and overrides its run() method. We are calling the run method by the reference variable of Parent class. Since it refers to the subclass object and subclass method overrides the Parent class method, subclass method is invoked at runtime.
</p>
<p>
 Since method invocation is determined by the JVM not compiler, it is known as runtime polymorphism.
</p>

<div class="codeblock"><pre>
 class Bike{
   void run(){System.out.println("running");}
 }
 class Splender extends Bike{
   void run(){System.out.println("running safely with 60km");}
 
   public static void main(String args[]){
     Bike b = new Splender();//upcasting
     b.run();
   }
    }</pre></div>

<span class="testit"><a href="http://www.javatpoint.com/opr/test.jsp?filename=Splender" target="_blank">Test it Now</a></span>

<div class="codeblock3"><pre>
Output:running safely with 60km.
</pre></div>
<p style="font-size:23px;color:green">Java Runtime Polymorphism Example: Shape</h2>
<div class="codeblock"><pre>
class Shape{
void draw(){System.out.println("drawing...");}
}
class Rectangle extends Shape{
void draw(){System.out.println("drawing rectangle...");}
}
class Circle extends Shape{
void draw(){System.out.println("drawing circle...");}
}
class Triangle extends Shape{
void draw(){System.out.println("drawing triangle...");}
}
class TestPolymorphism2{
public static void main(String args[]){
Shape s;
s=new Rectangle();
s.draw();
s=new Circle();
s.draw();
s=new Triangle();
s.draw();
}
}
                                                    </body>pre></div>
<span class="testit"><a href="http://www.javatpoint.com/opr/test.jsp?filename=TestPolymorphism2" target="_blank">Test it Now</a></span>
<p>Output:</p>
<div class="codeblock3"><pre>
drawing rectangle...
drawing circle...
drawing triangle...
</pre></div>

</div>
                       
    
    <iframe width="560" height="315" src="https://www.youtube.com/embed/gWpg3yMiL0M" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    
  </div>
  <a  class="btn btn-info pre" href="Enc.php">Previous</a>
  <a class="btn btn-info next" href="Inh.php">Next</a>
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>