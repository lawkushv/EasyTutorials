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

      <h3 style="color: green;font-size:24px">Applet</h3>
    <div style="text-align:left">
        <p style="font-size:23px;color:green;text-aalign:center">Java Applet</h1>
<p>Applet is a special type of program that is embedded in the webpage to generate the dynamic content. It runs inside the browser and works at client side.</p>
<p>Applet is a Java program that can be embedded into a web page. It runs inside the web browser and works at client side. Applet is embedded in a HTML page using the APPLET or OBJECT tag and hosted on a web server.</p>
<p>Applets are used to make the web site more dynamic and entertaining.</p>
<p><strong>Some important points : </strong></p>
<ol style="font-size:18px" >
<li>All applets are sub-classes (either directly or indirectly) of <em><a href="https://docs.oracle.com/javase/7/docs/api/java/applet/Applet.html" target="_blank">java.applet.Applet</a></em> class.</li>
<li>Applets are not stand-alone programs. Instead, they run within either a web browser or an applet viewer. JDK provides a standard applet viewer tool called applet viewer.</li>
<li>In general, execution of an applet does not begin at main() method.</li>
<li>Output of an applet window is not performed by <em>System.out.println()</em>. Rather it is handled with various AWT methods, such as <em>drawString()</em>.</li>
</ol>                                                                

<p style="font-size:21px;color:green">Advantage of Applet</h3>
<p>There are many advantages of applet. They are as follows:</p>
<ul  style="font-size:18px">
<li>It works at client side so less response time.</li>
<li>Secured</li>
<li>It can be executed by browsers running under many plateforms, including Linux, Windows, Mac Os etc.</li>
</ul>

<p style="font-size:21px;color:green">Drawback of Applet</h3>
<ul style="font-size:18px">
<li>Plugin is required at client browser to execute applet.</li>
</ul>                                                  
                                                          
                          <p style="font-size:22px;color:green">Hierachy of Applet</p>
                                                               <img src="APp1.jpg">
<p style="font-size:22px;color:green"> LigeCycle Of Java Applet</p>
                                     <img src="App.jpg">
                                                          
    <p>It is important to understand the order in which the various methods shown in the above image are called. When an applet begins, the following methods are called, in this sequence:</p>
<p>1. init( )<br />
2. start( )<br />
3. paint( )</p>
<p>When an applet is terminated, the following sequence of method calls takes place:<br />
1. stop( )<br />
2. destroy( )<br />
Let’s look more closely at these methods.</p>
<ol style="font-size:18px">
<li><strong>init( ) : </strong>The <strong>init( )</strong> method is the first method to be called. This is where you should initialize variables. This method is called <strong>only once</strong> during the run time of your applet.</li>
<li><strong>start( ) : </strong>The <strong>start( )</strong> method is called after <strong>init( )</strong>. It is also called to restart an applet after it has been stopped. Note that <strong>init( ) </strong>is called once i.e. when the first time an applet is loaded whereas <strong>start( )</strong> is called each time an applet’s HTML document is displayed onscreen. So, if a user leaves a web page and comes back, the applet resumes execution at <strong>start( )</strong>.</li>
<li><strong>paint( ) : </strong>The <strong>paint( )</strong> method is called each time an AWT-based applet’s output must be redrawn. This situation can occur for several reasons. For example, the window in which the applet is running may be overwritten by another window and then uncovered. Or the applet window may be minimized and then restored.
<p><strong>paint( )</strong> is also called when the applet begins execution. Whatever the cause, whenever the applet must redraw its output, <strong>paint( ) </strong>is called. </p>
<p>The <strong>paint( )</strong> method has one parameter of type . This parameter will contain the graphics context, which describes the graphics environment in which the applet is running. This context is used whenever output to the applet is required.</li>
<li><strong>stop( ) : </strong>The <strong>stop( )</strong> method is called when a web browser leaves the HTML document containing the applet—when it goes to another page, for example. When <strong>stop( )</strong> is called, the applet is probably running. You should use <strong>stop( )</strong> to suspend threads that don’t need to run when the applet is not visible. You can restart them when <strong>start( )</strong> is called if the user returns to the page.</li>
<li><strong>destroy( ) :</strong> The <strong>destroy( )</strong> method is called when the environment determines that your applet needs to be removed completely from memory. At this point, you should free up any resources the applet may be using. The <strong>stop( )</strong> method is always called before <strong>destroy( )</strong>.</li>
</ol>
<p><strong>Creating Hello World applet : </strong></p>
<p>Let’s begin with the HelloWorld applet :</p>
<pre class="brush: java; title: ; notranslate" title="">
// A Hello World Applet
// Save file as HelloWorld.java

import java.applet.Applet;
import java.awt.Graphics;

// HelloWorld class extends Applet
public class HelloWorld extends Applet 
{
    // Overriding paint() method
    @Override
    public void paint(Graphics g) 
    {
        g.drawString(&quot;Hello World&quot;, 20, 20);
    }
    
}
</pre>
<p><strong>Explanation :</strong></p>
<ol style="font-size:18px">
<li> The above java program  begins with two import statements. The first import statement imports the Applet class from applet package. Every AWT-based(Abstract Window Toolkit) applet that you create must be a subclass (either directly or indirectly) of Applet class. The second statement import the  class from awt package.</li>
<li> The next line in the program declares the class HelloWorld. This class must be declared as public, because it will be accessed by code that is outside the program. Inside HelloWorld, <strong>paint( )</strong> is declared. This method is defined by the AWT and must be overridden by the applet.</li>
<li> Inside <strong>paint( )</strong> is a call to <em>drawString( )</em>, which is a member of the  class. This method outputs a string beginning at the specified X,Y location. It has the following general form:
<pre>
void drawString(String message, int x, int y)
</pre>
<p>Here, message is the string to be output beginning at x,y. In a Java window, the upper-left corner is location 0,0. The call to <em>drawString( ) </em>in the applet causes the message &#8220;Hello World&#8221; to be displayed beginning at location 20,20.</li>
</ol>
<p>Notice that the applet does not have a <strong>main( )</strong> method. Unlike Java programs, applets do not begin execution at <strong>main( )</strong>. In fact, most applets don’t even have a <strong>main( )</strong> method. Instead, an applet begins execution when the name of its class is passed to an applet viewer or to a network browser.</p>
<p><strong>Running the HelloWorld Applet :</strong></p>
<p>After you enter the source code for HelloWorld.java, compile in the same way that you have been compiling java programs(using <em>javac</em> command). However running HelloWorld with the <em>java</em> command will generate an error because it is not an application.</p>
<pre>
java HelloWorld

Error: Main method not found in class HelloWorld, please define the main method as:
   public static void main(String[] args)
</pre>
<p>There are <strong>two</strong> standard ways in which you can run an applet :</p>
<ol style="font-size:18px">
<li>Executing the applet within a Java-compatible web browser.</li>
<li>Using an applet viewer, such as the standard tool, appletviewer. An applet viewer executes your applet in a window. This is generally the fastest and easiest way to test your applet.</li>
</ol>   
     <p style="font-size:22px;color:green">Lifecycle methods for Applet:</p>
<p>The java.applet.Applet class 4 life cycle methods and java.awt.Component class provides 1 life cycle methods for an applet.
</p>

<p style="font-size:20px;color:green">java.applet.Applet class</p>
<p>For creating any applet java.applet.Applet class must be inherited. It provides 4 life cycle methods of applet.</p>
<ol style="font-size:17px">
<li><strong>public void init():</strong> is used to initialized the Applet. It is invoked only once.</li>
<li><strong>public void start():</strong> is invoked after the init() method or browser is maximized. It is used to start the Applet.</li>
<li><strong>public void stop():</strong> is used to stop the Applet. It is invoked when Applet is stop or browser is minimized.</li>
<li><strong>public void destroy():</strong> is used to destroy the Applet. It is invoked only once.</li>
</ol>

<p style="font-size:22px;color:green">java.awt.Component class</p>
<p>The Component class provides 1 life cycle method of applet.</p>
<ol style="font-size:17px">
<li><strong>public void paint(Graphics g):</strong> is used to paint the Applet. It provides Graphics class object that can be used for drawing oval, rectangle, arc etc. </li>
</ol>


<hr/>
<p style="font-size:21px;color:green">Who is responsible to manage the life cycle of an applet?</p>
<p>Java Plug-in software.</p>
<hr/>

<p style="font-size:20px">How to run an Applet?</p>
<p>There are two ways to run an applet</p>
<ol style="font-size:18px">
<li>By html file.</li>
<li>By appletViewer tool (for testing purpose).</li>
</ol>


<hr/>

<p style="font-size:20px;color:green">Simple example of Applet by html file:</p>

<p>To execute the applet by html file, create an applet and compile it. After that create an html file and place the applet code in html file. Now click the html file.</p>

<div class="codeblock"><pre>
//First.java
import java.applet.Applet;
import java.awt.Graphics;
public class First extends Applet{

public void paint(Graphics g){
g.drawString("welcome",150,150);
}

}

</pre></div>
<h4 id="n">Note: class must be public because its object is created by Java Plugin software that resides on the browser.</h4>

<p style="font-size:20px;color:green">myapplet.html</h3>

<div class="codeblock"><pre>

&lt;html&gt;
&lt;body&gt;
&lt;applet code="First.class" width="300" height="300"&gt;
&lt;/applet&gt;
&lt;/body&gt;
&lt;/html&gt;

</pre></div>

<hr/>
<p style="font-size:20px;color:green">Simple example of Applet by appletviewer tool:</h3>
<p>To execute the applet by appletviewer tool, create an applet that contains applet tag in comment and compile it. After that run it by: appletviewer First.java. Now Html file is not required but it is for testing purpose only.</p>

<div class="codeblock"><pre >
//First.java
import java.applet.Applet;
import java.awt.Graphics;
public class First extends Applet{

public void paint(Graphics g){
g.drawString("welcome to applet",150,150);
}

}
/*
&lt;applet code="First.class" width="300" height="300"&gt;
&lt;/applet&gt;
*/
</pre></div>

<p>To execute the applet by appletviewer tool, write in command prompt:</p>
<div class="codeblock3"><pre>
<strong>c:\></strong>javac First.java
<strong>c:\></strong>appletviewer First.java
</pre></div>
                                                               
                                                          
                                                          
                                                          
                                                          </div>
    
                       <iframe width="560" height="315" src="https://www.youtube.com/embed/WYn3Dnb5ov8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    

  </div>
  <a  class="btn btn-info pre" href="Mul.php">Previous</a>
  <a class="btn btn-info next" href="Jdb.php">Next</a>
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