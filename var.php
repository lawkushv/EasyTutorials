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
  <li class="list-item"><a href="Var.php">Variable and Data types</li></a><br>
  <li class="list-item"><a href="Oper.php">Operators</a></li><br>
  <li class="list-item"><a href="">JVM</a></li><br>
  <h3 style="margin-top: 5px">Control Statements</h3><br>
  <li class="list-item"><a href="Inh.php">Inheritance</a></li><br>
  <li class="list-item"><a href="">History about Java</a></li><br>
  <li class="list-item"><a href="">History about Java</a></li><br>
  <li class="list-item"><a href="">History about Java</a></li><br>
  <li class="list-item"><a href="">History about Java</a></li><br>

  </ul>
  </div>
  <div class="col-sm-8"">
    <div class="jumbotron" style="text-align: center; background-color: white;color: #34495e;width: 100%" >

      <h3 style="color: green">Variable and Data type</h3>
    <p style="text-align: left;">
      A variable is a container which holds the value while the java program is executed. A variable is assigned with a datatype.

Variable is a name of memory location. There are three types of variables in java: local, instance and static.</p>

<img src="var.jpg"></img>


<h3 style="color: green">Types of Variable</h3>
<img src="Var1.jpg"></img>
 <p style="text-align: left;">

<p style="text-align: left;">There are three types of variables in java:</p>
<div>
<ul class="points">
<li style="font-size:125%"><p style="text-align: left;">local variable</p></li>
<li style="font-size:125%"><p style="text-align: left;">instance variable</p></li>
<li style="font-size:125%"><p style="text-align: left;">static variable</p></li><br><br>
</ul>

<p style="text-align: left;"><a style="color: light red"> 1) Local Variable</a></p>
<p style="text-align: left;">A variable declared inside the method is called local variable.</p>

<p style="text-align: left;">Local variables are declared in methods, constructors, or blocks.</p>
<div align="left">
<pre class="prettyprint notranslate">
public class Test {
   public void pupAge() {
      int age = 0;
      age = age + 7;
      System.out.println("Puppy age is : " + age);
   }

   public static void main(String args[]) {
      Test test = new Test();
      test.pupAge();
   }
}
</pre>
<p>This will produce the following result &minus;</p>
<h3>Output</h3>
<pre class="result notranslate">
Puppy age is: 7
</pre>
</div>
<p style="text-align: left;"> <a style="color: light red">2) Instance Variable</a></p>
<p style="text-align: left;">A variable declared inside the class but outside the method, is called instance variable . It is not declared as static.</p>
<div align="left">
<pre class="prettyprint notranslate">
import java.io.*;
public class Employee {

   // this instance variable is visible for any child class.
   public String name;

   // salary  variable is visible in Employee class only.
   private double salary;

   // The name variable is assigned in the constructor.
   public Employee (String empName) {
      name = empName;
   }

   // The salary variable is assigned a value.
   public void setSalary(double empSal) {
      salary = empSal;
   }

   // This method prints the employee details.
   public void printEmp() {
      System.out.println("name  : " + name );
      System.out.println("salary :" + salary);
   }

   public static void main(String args[]) {
      Employee empOne = new Employee("Ransika");
      empOne.setSalary(1000);
      empOne.printEmp();
   }
}
</pre>
<p>This will produce the following result &minus;</p>
<h3>Output</h3>
<pre class="result notranslate">
name  : Ransika
salary :1000.0
</pre></div>
<p style="text-align: left;"> <a style="color: light red">3) Static variable</a></p>
<p style="text-align: left;">A variable which is declared as static is called static variable. It cannot be local.</p> 
<div align="left">
<pre class="prettyprint notranslate">
import java.io.*;
public class Employee {

   // salary  variable is a private static variable
   private static double salary;

   // DEPARTMENT is a constant
   public static final String DEPARTMENT = "Development ";

   public static void main(String args[]) {
      salary = 1000;
      System.out.println(DEPARTMENT + "average salary:" + salary);
   }
}
</pre>
<p>This will produce the following result &minus;</p>
<h3>Output</h3>
<pre class="result notranslate">
Development average salary:1000
</pre></div>
<br><br>
<p style="text-align: center;"><a style="color: green">Data Types in Java</a></p>
<p style="text-align: left;">Data types represent the different values to be stored in the variable. In java, there are two types of data types:</p>
<ul>
<li style="font-size:125%"><p style="text-align: left;">Primitive data types</li>
<li style="font-size:125%"><p style="text-align: left;">Non-primitive data types</li>

</ul>
<p style="text-align: left;"><a style="color: light red"> Primitive Data Types</a></p>
<p style="text-align: left;">There are eight primitive datatypes supported by Java. Primitive datatypes are predefined by the language and named by a keyword. Let us now look into the eight primitive data types in detail.</p>


<div align="left">
<p style="font-size:35px"><a style="color: light red">Byte</a></p>
<ul >
<li><p>Byte data type is an 8-bit signed two's complement integer</p></li>
<li><p>Minimum value is -128 (-2&#94;7)</p></li>
<li><p>Maximum value is 127 (inclusive)(2&#94;7 -1)</p></li>
<li><p>Default value is 0</p></li>
<li><p>Byte data type is used to save space in large arrays, mainly in place of integers, since a byte is four times smaller than an integer.</p></li>
<li><p>Example: byte a = 100, byte b = -50</p></li>
</ul>

<p style="font-size:35px"><a style="color: light red">Short</a></p>
<ul >
<li><p>Short data type is a 16-bit signed two's complement integer</p></li>
<li><p>Minimum value is -32,768 (-2&#94;15)</p></li>
<li><p>Maximum value is 32,767 (inclusive) (2&#94;15 -1)</p></li>
<li><p>Short data type can also be used to save memory as byte data type. A short is 2 times smaller than an integer</p></li>
<li><p>Default value is 0.</p></li>
<li><p>Example: short  s = 10000, short r = -20000</p></li>
</ul>
<p style="font-size:35px"><a style="color: light red">Int</a></p>
<ul >
<li><p>Int data type is a 32-bit signed two's complement integer.</p></li>
<li><p>Minimum value is - 2,147,483,648 (-2&#94;31)</p></li>
<li><p>Maximum value is 2,147,483,647(inclusive) (2&#94;31 -1)</p></li>
<li><p>Integer is generally used as the default data type for integral values unless there is a concern about memory.</p></li>
<li><p>The default value is 0</p></li>
<li><p>Example: int a = 100000, int b = -200000</p></li>
</ul>
<p style="font-size:35px"><a style="color: light red">long</a></p>
<ul>
<li><p>Long data type is a 64-bit signed two's complement integer</p></li>
<li><p>Minimum value is -9,223,372,036,854,775,808(-2&#94;63)</p></li>
<li><p>Maximum value is 9,223,372,036,854,775,807 (inclusive)(2&#94;63 -1)</p></li>
<li><p>This type is used when a wider range than int is needed</p></li>
<li><p>Default value is 0L</p></li>
<li><p>Example: long a = 100000L, long b = -200000L</p></li>
</ul>
<p style="font-size:35px"><a style="color: light red">float</a></p>
<ul >
<li><p>Float data type is a single-precision 32-bit IEEE 754 floating point</p></li>
<li><p>Float is mainly used to save memory in large arrays of floating point numbers</p></li>
<li><p>Default value is 0.0f</p></li>
<li><p>Float data type is never used for precise values such as currency</p></li>
<li><p>Example: float f1 = 234.5f</p></li>
</ul>
<p style="font-size:35px"><a style="color: light red">double</a></p>
<ul >
<li><p>double data type is a double-precision 64-bit IEEE 754 floating point</p></li> 
<li><p>This data type is generally used as the default data type for decimal values, generally the default choice</p></li>
<li><p>Double data type should never be used for precise values such as currency</p></li>
<li><p>Default value is 0.0d</p></li>
<li><p>Example: double d1 = 123.4</p></li>
</ul>
<p style="font-size:35px"><a style="color: light red">boolean</a></p>
<ul >
<li><p>boolean data type represents one bit of information</p></li>
<li><p>There are only two possible values: true and false</p></li>
<li><p>This data type is used for simple flags that track true/false conditions</p></li>
<li><p>Default value is false</p></li>
<li><p>Example: boolean one = true</p></li>
</ul>
<p style="font-size:35px"><a style="color: light red">char</a></p>
<ul >
<li><p>char data type is a single 16-bit Unicode character</p></li>
<li><p>Minimum value is '\u0000' (or 0)</p></li>
<li><p>Maximum value is  '\uffff' (or 65,535 inclusive)</p></li>
<li><p>Char data type is used to store any character</p></li> 
<li><p>Example: char letterA = 'A'</p></li>
</ul>   
</div>
<div align="left">
<p style="color:skyblue; font-size:35px">Refrence Data Types</p>
<ul>
<li><p>Reference variables are created using defined constructors of the classes. They are used to access objects. These variables are declared to be of a specific type that cannot be changed. For example, Employee, Puppy, etc.</p></li> 
<li><p>Class objects and various type of array variables come under reference datatype.</p></li>
<li><p>Default value of any reference variable is null.</p></li> 
<li><p>A reference variable can be used to refer any object of the declared type or any compatible type.</p></li> 
<li><p>Example: Animal animal = new Animal("giraffe");</p></li> 
</ul>
<p style="color:skyblue; font-size:35px">Java Literals</p>
<p>A literal is a source code representation of a fixed value. They are represented directly in the code without any computation.</p>
<p>Literals can be assigned to any primitive type variable. For example &minus;</p>
<pre class="prettyprint notranslate">
byte a = 68;
char a = 'A';
</pre>
<p>byte, int, long, and short can be expressed in decimal(base 10), hexadecimal(base 16) or octal(base 8) number systems as well.</p>
<p>Prefix 0 is used to indicate octal, and prefix 0x indicates hexadecimal when using these number systems for literals. For example &minus;</p>
<pre class="prettyprint notranslate">
int decimal = 100;
int octal = 0144;
int hexa =  0x64;
</pre>
<p>String literals in Java are specified like they are in most other languages by enclosing a sequence of characters between a pair of double quotes. Examples of string literals are &minus;</p>
<h3>Example</h3>
<pre class="prettyprint notranslate">
"Hello World"
"two\nlines"
"\"This is in quotes\""
</pre>
<p>String and char types of literals can contain any Unicode characters. For example &minus;</p>
<pre class="prettyprint notranslate">
char a = '\u0001';
String a = "\u0001";
</pre>
</div>
   </div>
    <iframe width="560" height="315" src="https://www.youtube.com/watch?v=RnD6NJs5xoI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
 <div data-pym-src="https://www.jdoodle.com/embed/v0/java/jdk-1.8/1?stdin=1&arg=1"></div>
 </div>
  <a  class="btn btn-info pre" href="setpath.php">Previous</a>
  <a class="btn btn-info next" href="operators1.php">Next</a>
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