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

      <h3 style="color: green;font-size:23px">Class & Object</h3>
    <div style="text-align:left">
    <p>In this page, we will learn about java objects and classes. In object-oriented programming technique, we design a program using objects and classes.</p>
<p>Object is the physical as well as logical entity whereas class is the logical entity only. </p>

<a id="object"></a>
<p style="font-size:23px;color:green;text-align:center">Object in Java</p>

<p>An entity that has state and behavior is known as an object e.g. chair, bike, marker, pen, table, car etc. It can be physical or logical (tangible and intangible). The example of intangible object is banking system.
</p>
    <img src="Cls1.jpg">    
<p>An object has three characteristics:</p>
<ul style="font-size:18px">
<li><strong>state:</strong> represents data (value) of an object.</li>
<li><strong>behavior:</strong> represents the behavior (functionality) of an object such as deposit, withdraw etc.</li>
<li><strong>identity:</strong> Object identity is typically implemented via a unique ID. The value of the ID is not visible to the external user. But, it is used internally by the JVM to identify each object uniquely.</li>
</ul>

<p>For Example: Pen is an object. Its name is Reynolds, color is white etc. known as its state. It is used to write, so writing is its behavior.
</p>
<p><strong>Object is an instance of a class.</strong> Class is a template or blueprint from which objects are created. So object is the instance(result) of a class.
</p>

<p><strong>Object Definitions:</strong></p>
<ul style="font-size:18px">
<li>Object is <em>a real world entity</em>.</li>
<li>Object is <em>a run time entity</em>.</li>
<li>Object is <em>an entity which has state and behavior</em>.</li>
<li>Object is <em>an instance of a class</em>.</li>
</ul>
<hr/>
<p style="font-size:23px;color:green;text-align:center">Class in Java</p>
<p>A class is a group of objects which have common properties. It is a template or blueprint from which objects are created. It is a logical entity. It can't be physical.</p>

<p>A class in Java can contain:</p>
<ul style="font-size:18px">
<li><strong>fields</strong></li>
<li><strong>methods</strong></li>
<li><strong>constructors</strong></li>
<li><strong>blocks</strong></li>
<li><strong>nested class and interface</strong></li>
</ul>


<p style="font-size:23px;color:green">Syntax to declare a class:</p>
<div class="codeblock"><pre>
class &lt;class_name&gt;{
    field;
    method;
}
</pre></div>

<hr/>
<a id="objectinstancevariable"></a>
<p style="font-size:23px;color:green">Instance variable in Java</p>
<p>A variable which is created inside the class but outside the method, is known as instance variable. Instance variable doesn't get memory at compile time. It gets memory at run time when object(instance) is created. That is why, it is known as instance variable.</p>
<hr/>
<a id="objectmethod"></a>
<p style="font-size:23px;color:green">Method in Java</p>
<p>In java, a method is like function i.e. used to expose behavior of an object.</p>

<a id="objectadvantageofmethod"></a>
<p style="font-size:23px;color:green">Advantage of Method</p>
<ul style="font-size:18px">
<li>Code Reusability</li>
<li>Code Optimization</li>
</ul>
<hr/>
<a id="objectnewkeyword"></a>
<p style="font-size:23px;color:green">new keyword in Java</p>
<p>The new keyword is used to allocate memory at run time. All objects get memory in Heap memory area.</p>
<hr/>
<p style="font-size:23px;color:green">Object and Class Example: main within class</p>
<p>In this example, we have created a Student class that have two data members id and name. We are creating the object of the Student class by new keyword and printing the objects value.</p>
<p>Here, we are creating main() method inside the class.</p>
<p class="filename">File: Student.java</p>
<div class="codeblock"><pre>
class Student{
 int id;//field or data member or instance variable
 String name;

 public static void main(String args[]){
  Student s1=new Student();//creating an object of Student
  System.out.println(s1.id);//accessing member through reference variable
  System.out.println(s1.name);
 }
}
</pre></div>
<span class="testit"><a href="http://www.javatpoint.com/opr/test.jsp?filename=Student" target="_blank">Test it Now</a></span>
<p>Output:</p>
<div class="codeblock3"><pre>
0 
null
</pre></div>

<p style="font-size:23px;color:green">Object and Class Example: main outside class</p>
<p>In real time development, we create classes and use it from another class. It is a better approach than previous one. Let's see a simple example, where we are having main() method in another class.</p>
<p>We can have multiple classes in different java files or single java file. If you define multiple classes in a single java source file, it is a good idea to save the file name with the class name which has main() method.</p>
<p class="filename">File: TestStudent1.java</p>
<div class="codeblock"><pre>
class Student{
 int id;
 String name;
}
class TestStudent1{
 public static void main(String args[]){
  Student s1=new Student();
  System.out.println(s1.id);
  System.out.println(s1.name);
 }
}
</pre></div>
<span class="testit"><a href="http://www.javatpoint.com/opr/test.jsp?filename=TestStudent1" target="_blank">Test it Now</a></span>
<p>Output:</p>
<div class="codeblock3"><pre>
0 
null
</pre></div>
 <p style="font-size:23px;color:green">3 Ways to initialize object</p>
<p>There are 3 ways to initialize object in java.</p>
<ol style="font-size:18px">
<li>By reference variable</li>
<li>By method</li>
<li>By constructor</li>
</ol>

<p style="font-size:23px;color:green">1) Object and Class Example: Initialization through reference</p>
<p>Initializing object simply means storing data into object. Let's see a simple example where we are going to initialize object through reference variable.</p>

<p class="filename">File: TestStudent2.java</p>
<div class="codeblock"><pre>
class Student{
 int id;
 String name;
}
class TestStudent2{
 public static void main(String args[]){
  Student s1=new Student();
  s1.id=101;
  s1.name="Sonoo";
  System.out.println(s1.id+" "+s1.name);//printing members with a white space
 }
}
</pre></div>
<span class="testit"><a href="http://www.javatpoint.com/opr/test.jsp?filename=TestStudent2" target="_blank">Test it Now</a></span>
<p>Output:</p>
<div class="codeblock3"><pre>
101 Sonoo
</pre></div>
<p>We can also create multiple objects and store information in it through reference variable.</p>
<p class="filename">File: TestStudent3.java</p>
<div class="codeblock"><pre>
class Student{
 int id;
 String name;
}
class TestStudent3{
 public static void main(String args[]){
  //Creating objects
  Student s1=new Student();
  Student s2=new Student();
  //Initializing objects
  s1.id=101;
  s1.name="Sonoo";
  s2.id=102;
  s2.name="Amit";
  //Printing data
  System.out.println(s1.id+" "+s1.name);
  System.out.println(s2.id+" "+s2.name);
 }
}
</pre></div>
<span class="testit"><a href="http://www.javatpoint.com/opr/test.jsp?filename=TestStudent3" target="_blank">Test it Now</a></span>
<p>Output:</p>
<div class="codeblock3"><pre>
101 Sonoo
102 Amit
</pre></div>

<a id="objectex2"></a>
<p style="font-size:23px;color:green">2) Object and Class Example: Initialization through method</p>
<p>In this example, we are creating the two objects of Student class and initializing the value to these objects by invoking the insertRecord method.
Here, we are displaying the state (data) of the objects by invoking the displayInformation() method.</p>

<p class="filename">File: TestStudent4.java</p>
<div class="codeblock"><pre>
class Student{
 int rollno;
 String name;
 void insertRecord(int r, String n){
  rollno=r;
  name=n;
 }
 void displayInformation(){System.out.println(rollno+" "+name);}
}
class TestStudent4{
 public static void main(String args[]){
  Student s1=new Student();
  Student s2=new Student();
  s1.insertRecord(111,"Karan");
  s2.insertRecord(222,"Aryan");
  s1.displayInformation();
  s2.displayInformation();
 }
}
</pre></div>
<span class="testit"><a href="http://www.javatpoint.com/opr/test.jsp?filename=TestStudent4" target="_blank">Test it Now</a></span>
<p>Output:</p>
<div class="codeblock3"><pre>
111 Karan
222 Aryan
</pre></div>

<p>As you can see in the above figure, object gets the memory in heap memory area. The reference variable refers to the object allocated in the heap memory area.
Here, s1 and s2 both are reference variables that refer to the objects allocated in memory.</p>

<hr/>
<p style="font-size:23px;color:green">3) Object and Class Example: Initialization through constructor</p>
<p>We will learn about constructors in java later.</p>
<hr/>
<p style="font-size:23px;color:green">Object and Class Example: Employee</p>
<p>Let's see an example where we are maintaining records of employees.</p>

<p class="filename">File: TestEmployee.java</p>
<div class="codeblock"><pre>
class Employee{
	int id;
	String name;
	float salary;
	void insert(int i, String n, float s) {
		id=i;
		name=n;
		salary=s;
	}
	void display(){System.out.println(id+" "+name+" "+salary);}
}
public class TestEmployee {
public static void main(String[] args) {
	Employee e1=new Employee();
	Employee e2=new Employee();
	Employee e3=new Employee();
	e1.insert(101,"ajeet",45000);
	e2.insert(102,"irfan",25000);
	e3.insert(103,"nakul",55000);
	e1.display();
	e2.display();
	e3.display();
}
}
</pre></div>
<span class="testit"><a href="http://www.javatpoint.com/opr/test.jsp?filename=TestEmployee" target="_blank">Test it Now</a></span>
<p>Output:</p>
<div class="codeblock3"><pre>
101 ajeet 45000.0
102 irfan 25000.0
103 nakul 55000.0
</pre></div>
<iframe width="560" height="315" src="https://www.youtube.com/embed/zDA2Z0JcnJU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

</div>
    
  </div>
  <a  class="btn btn-info pre" href="operators1.php">Previous</a>
  <a class="btn btn-info next" href="Abs.php">Next</a>
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