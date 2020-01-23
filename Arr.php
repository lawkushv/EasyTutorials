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
  <li class="list-item"><a href="">Variable and Data types</li></a><br>
  <li class="list-item"><a href="">Operators</a></li><br>
  <li class="list-item"><a href="">JVM</a></li><br>
  <h3 style="margin-top: 5px">Control Statements</h3><br>
  <li class="list-item"><a href="If.php">If Else</a></li><br>
  <li class="list-item"><a href="Loo.php">Loop Statement</a></li><br>
  <li class="list-item"><a href="Swi.php">Switch</a></li><br>
  <li class="list-item"><a href="">History about Java</a></li><br>
  <li class="list-item"><a href="">History about Java</a></li><br>
  <h3 style="margin-top: 5px">Object Oriented Programming</h3><br>
  <li class="list-item"><a href="Cls.php">Class & Object</a></li><br>
  <li class="list-item"><a href="Pol.php">Polymorphishm</a></li><br>
  <li class="list-item"><a href="Inh.php">Inheritance</a></li><br>
  <li class="list-item"><a href="Enc.php">Encapsulation</a></li><br>
  <li class="list-item"><a href="Abs.php">Abstraction</a></li><br>  </ul>
  </div>
  <div class="col-sm-8"">
    <div class="jumbotron" style="text-align: center; background-color: white;color: #34495e;width: 100%" >

      <h3 style="color: green; font-size:25px">Array</h3>
    <div style="text-align:left">
    <p>An array is a group of like-typed variables that are referred to by a common name.Arrays in Java work differently than they do in C/C++. Following are some important point about Java arrays.</p>
<ul style="font-size:18px">
<li>In Java all arrays are dynamically allocated.(discussed below)
<li>Since arrays are objects in Java, we can find their length using member length. This is different from C/C++ where we find length using sizeof. </li>
<li>A Java array variable can also be declared like other variables with [] after the data type.</li>
<li>The variables in the array are ordered and each have an index beginning from 0.</li>
<li>Java array can be also be used as a static field, a local variable or a method parameter.</li>
<li>The <strong>size</strong> of an array must be specified by an int value and not long or short.</li>
<li>The direct superclass of an array type is Object.
<li>Every array type implements the interfaces Cloneable and java.io.Serializabl.</li>
</ul>
<p>Array can contains primitives data types as well as objects of a class depending on the definition of array. In case of primitives data types, the actual values are stored in contiguous memory locations. In case of objects of a class, the actual objects are stored in heap segment</a>. </p>
<img src="Arr1.jpg" alt="Arrays" width="592" height="173" >
    
    <p style="font-size:22px;color:green ;text-align:center">Types of Array in java</p>
<p>There are two types of array.</p>
<ul style="font-size:18px">
<li>Single Dimensional Array</li>
<li>Multidimensional Array</li>
</ul>
                                                         
    <p style="font-size:22px;color:green;text-align:center">Array Variables </p><p> Using an array in your program is a <strong>3 step
  process</strong> - <p> <strong>1)</strong> Declaring your Array <p> <strong>2)</strong> Constructing your Array<br><br><strong>3)</strong> Initialize your Array <p> <strong><p style="font-sizez:19px;color:green"> 1) Declaring your Array </p>Syntax</strong> <pre>
                                                           
&lt;elementType&gt;[] &lt;arrayName&gt;;
</pre><p> <strong>or</strong> <pre>
 &lt;elementType&gt; &lt;arrayName&gt;[];
</pre><p> <strong>Example:</strong> <pre>
int intArray[];
 // Defines that intArray is an ARRAY variable which will store integer values
int []intArray;
</pre><p style="font-size:19px;color:green"> 2) Constructing an Array </p><pre>
 arrayname = new dataType[]
</pre><p> <strong>Example:</strong> <pre>
intArray = new int[10]; // Defines that intArray will store 10 integer values
</pre><p> <strong>Declaration and Construction combined</strong> <pre>
int intArray[] = new int[10];
</pre><p style="font-size:19px;color:green"> 3) Initialize an Array </p><pre>
intArray[0]=1; // Assigns an integer value 1 to the first element 0 of the array

intArray[1]=2; // Assigns an integer value 2 to the second element 1 of the array
</pre><p> <strong>Declaring and initialize an Array</strong> <pre>
[]  = {};
</pre><p> Example:
                                           <br><pre>
 int intArray[] = {1, 2, 3, 4};
                                           
// Initilializes an integer array of length 4 where the first element is 1 , second element is 2 and so on.</pre>
<p style="font-size:18px;color:green">First Array Program </p><p> <strong>Step 1)</strong> Copy the following code into an editor. <pre>
class ArrayDemo{
     public static void main(String args[]){
        int array[] = new int[7];
        for (int count=0;count&lt;7;count++){
           array[count]=count+1;
       }
       for (int count=0;count&lt;7;count++){
           System.out.println("array["+count+"] = "+array[count]);
       }
    //  System.out.println("Length of Array  =  "+array.length);
      // array[8] =10;
      }
}
</pre><p> <strong>Step 2)</strong> Save , Compile &amp; Run the code. Observe the Output <p> <strong>Output:</strong> <pre>
array[0] = 1
array[1] = 2
array[2] = 3
array[3] = 4
array[4] = 5
array[5] = 6
array[6] = 7
</pre><p> <strong>Step 3)</strong> If x is a reference to an array, <em>x.length</em> will give you the length of the array. <p> Uncomment line #10. Save, Compile &amp; Run the code.Observe the Output <pre>
Length of Array  =  7
</pre><p> <strong>Step 4)</strong> Unlike C, Java checks the boundary of an array while accessing an element in it. Java will not allow the programmer to exceed its boundary. <p> Uncomment line #11. Save, Compile &amp; Run the code.Observe the Output <pre>
Exception in thread "main" java.lang.ArrayIndexOutOfBoundsException: 8
        at ArrayDemo.main(ArrayDemo.java:11)
Command exited with non-zero status 1
</pre><p> <strong>Step 5)</strong> ArrayIndexOutOfBoundsException is thrown. In case of C, the same code would have shown some garbage value. <h2> <a id=9 name=9></a>Java Array: Pass by reference </h2><p> Arrays are passed to functions by reference, or as a pointer to the original. This means anything you do to the Array inside the function affects the original.
                          
<p style="font-size:22px;color:green">Example of single dimensional java array</p>
<p>Let's see the simple example of java array, where we are going to declare, instantiate, initialize and traverse an array.</p>

<div class="codeblock"><pre >
class Testarray{
public static void main(String args[]){

int a[]=new int[5];//declaration and instantiation
a[0]=10;//initialization
a[1]=20;
a[2]=70;
a[3]=40;
a[4]=50;

//printing array
for(int i=0;i&lt;a.length;i++)//length is the property of array
System.out.println(a[i]);

}}
</pre></div>

<span class="testit"><a href="http://www.javatpoint.com/opr/test.jsp?filename=Testarray" target="_blank">Test it Now</a></span>


<div class="codeblock3"><pre>
Output: 10
       20
       70
       40
       50
      
</pre></div>
<hr/>
                          
<p> <strong>Example: To understand Array are passed by reference</strong> <p> <strong>Step 1)</strong> Copy the following code into an editor <pre>
class ArrayDemo {
   public static void passByReference(String a[]){
     a[0] = "Changed";
   }
 
   public static void main(String args[]){
      String []b={"Apple","Mango","Orange"};
      System.out.println("Before Function Call    "+b[0]);
      ArrayDemo.passByReference(b);
      System.out.println("After Function Call    "+b[0]);
   }
}
</pre><p> <strong>Step 2)</strong> Save, Compile &amp; Run the code. Observe the Output <div><style>.responsive-guru99-leaderboard-bottom{width:300px;height:250px}@media(min-width:500px){.responsive-guru99-leaderboard-bottom{width:468px;height:60px}}@media(min-width:800px){.responsive-guru99-leaderboard-bottom{width:728px;height:90px}}</style> <script async src=//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js></script> <ins class="adsbygoogle responsive-guru99-leaderboard-bottom" style=display:inline-block data-ad-client=ca-pub-6330153051175486 data-ad-slot=8759395585></ins> <script>(adsbygoogle=window.adsbygoogle||[]).push({});</script></div><p> <strong>Output:</strong> <pre>
Before Function Call    Apple
After Function Call    Changed
</pre><p style="font-size:23px;color:green;text-align:center">Multidimensional arrays </p><p> Multidimensional arrays are actually arrays of arrays. <p> To declare a multidimensional array variable, specify each additional index using another set of square brackets. <pre>
Ex: int twoD[ ][ ] = new int[4][5] ;
</pre><p> When you allocate memory for a multidimensional array, you need only specify the memory for the first (leftmost) dimension. <p> You can allocate the remaining dimensions separately. <p> In Java, array length of each array in a multidimensional array is under your control.
    
                                                             
<p>In such case, data is stored in row and column based index (also known as matrix form).</p>

<p style="font-size:22px;color:green">Syntax to Declare Multidimensional Array in java</p>
<div class="codeblock"><pre >
dataType[][] arrayRefVar; (or)
dataType [][]arrayRefVar; (or)
dataType arrayRefVar[][]; (or)
dataType []arrayRefVar[]; 
</pre></div>

<p style="font-size:22px;color:green">Example to instantiate Multidimensional Array in java</p>
<div class="codeblock"><pre>
int[][] arr=new int[3][3];//3 row and 3 column
</pre></div>

<p style="font-size:22px;color:green">Example to initialize Multidimensional Array in java</p>
<div class="codeblock"><pre>
arr[0][0]=1;
arr[0][1]=2;
arr[0][2]=3;
arr[1][0]=4;
arr[1][1]=5;
arr[1][2]=6;
arr[2][0]=7;
arr[2][1]=8;
arr[2][2]=9;
</pre></div>
                                                         
                                                             
    <p> <strong>Example</strong> <pre>
public class Guru99 {
public static void main(String[] args) {

// Create 2-dimensional array.
  int[][] twoD = new int[4][4];

  // Assign three elements in it.
  twoD[0][0] = 1;
  twoD[1][1] = 2;
  twoD[3][2] = 3;
  System.out.print(twoD[0][0] + " ");
}

}
</pre>
<p style="font-size:21px;color:green">Advantage of Java Array</p>
<ul style="font-size:18px">
<li><b>Code Optimization:</b> It makes the code optimized, we can retrieve or sort the data easily.</li>
<li><b>Random access:</b> We can get any data located at any index position.</li>
</ul>

<hr/>
<p style="font-size:21px;color:green">Disadvantage of Java Array</p>
<ul style="font-size:18px">
<li><b>Size Limit:</b> We can store only fixed size of elements in the array. It doesn't grow its size at runtime. To solve this problem, collection framework is used in java.</li>
</ul>
                                </div>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/dZb5ofv0twk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    

  </div>
  <a  class="btn btn-info pre" href="Historyofjava.php">Previous</a>
  <a class="btn btn-info next" href=".php">Next</a>
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
<script src="https://www.jdoodle.com/assets/jdoodle-pym.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>