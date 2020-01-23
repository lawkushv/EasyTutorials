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

      <h3 style="color: green;font-size:23px">Servlet</h3>
    <div style="text-align:left">
<img src="ser1.jpg" alt="java servlet tutorial" width="150" height="150" style="margin-left:10px;float:right;" />
<p>
<b>Servlet</b> technology is used to create web application (resides at server side and generates dynamic web page).</p>

<p><strong>Servlet</strong> technology is robust and scalable because of java language. Before Servlet, CGI (Common Gateway Interface) scripting language was popular as a server-side programming language. But there was many disadvantages of this technology. We have discussed these disadvantages below.
</p>
<p>There are many interfaces and classes in the servlet API such as Servlet, GenericServlet, HttpServlet, ServletRequest, ServletResponse etc.
</p>

<a id="servletwhat"></a>
<p style="font-size:18px;color:green">What is a Servlet?</h2>
<p>
Servlet can be described in many ways, depending on the context.</p>
<ul p style="font-size:18px">
<li>Servlet is a technology i.e. used to create web application.</li>
<li>Servlet is an API that provides many interfaces and classes including documentations.</li>
<li>Servlet is an interface that must be implemented for creating any servlet.</li>
<li>Servlet is a class that extends the capabilities of the servers and responds to the incoming requests. It can respond to any type of requests.</li>
<li>Servlet is a web component that is deployed on the server to create dynamic web page.</li>

</ul>
<p style="font-size:23px;color:green;text-align:center">Servlets Architecture</p>
<p>The following diagram shows the position of Servlets in a Web Application.</p>
<img src="Ser2.jpg" alt="Servlets Architecture" />
<p style="font-size:23px;color:green">Servlets Tasks</p>
<p>Servlets perform the following major tasks &minus;</p>
<ul style="font-size:18px">
<li><p>Read the explicit data sent by the clients (browsers). This includes an HTML form on a Web page or it could also come from an applet or a custom HTTP client program.</p></li>
<li><p>Read the implicit HTTP request data sent by the clients (browsers). This includes cookies, media types and compression schemes the browser understands, and so forth.</p></li>
<li><p>Process the data and generate the results. This process may require talking to a database, executing an RMI or CORBA call, invoking a Web service, or computing the response directly.</p></li>
<li><p>Send the explicit data (i.e., the document) to the clients (browsers). This document can be sent in a variety of formats, including text (HTML or XML), binary (GIF images), Excel, etc.</p></li>
<li><p>Send the implicit HTTP response to the clients (browsers). This includes telling the browsers or other clients what type of document is being returned (e.g., HTML), setting cookies and caching parameters, and other such tasks.</p></li>
</ul>
<p style="font-size:23px;color:green;text-align:center">Servlet Life Cycle</p>
<p>A servlet life cycle can be defined as the entire process from its creation till the destruction. The following are the paths followed by a servlet.</p>
<ul style="font-size:18px">
<li><p>The servlet is initialized by calling the <b>init()</b> method.</p></li>
<li><p>The servlet calls <b>service()</b> method to process a client's request. </p></li>
<li><p>The servlet is terminated by calling the <b>destroy()</b> method.</p></li>
<li><p>Finally, servlet is garbage collected by the garbage collector of the JVM.</p></li>
</ul>
<p>Now let us discuss the life cycle methods in detail.</p>
<p style="font-size:21px;color:green">The init() Method</p>
<p>The init method is called only once. It is called only when the servlet is created, and not called for any user requests afterwards. So, it is used for one-time initializations, just as with the init method of applets.</p>
<p>The servlet is normally created when a user first invokes a URL corresponding to the servlet, but you can also specify that the servlet be loaded when the server is first started.</p>
<p>When a user invokes a servlet, a single instance of each servlet gets created, with each user request resulting in a new thread that is handed off to doGet or doPost as appropriate. The init() method simply creates or loads some data that will be used throughout the life of the servlet.</p>
<p>The init method definition looks like this &minus;</p>
<pre class="prettyprint notranslate">
public void init() throws ServletException {
   // Initialization code...
}
</pre>
<p style="font-size:21px;color:green">The service() Method </p>
<p>The service() method is the main method to perform the actual task. The servlet container (i.e. web server) calls the service() method to handle requests coming from the client( browsers) and to write the formatted response back to the client.</p>
<p>Each time the server receives a request for a servlet, the server spawns a new thread and calls service. The service() method checks the HTTP request type (GET, POST, PUT, DELETE, etc.) and calls doGet, doPost, doPut, doDelete, etc. methods as appropriate.</p>
<p>Here is the signature of this method &minus;</p>
<pre class="prettyprint notranslate">
public void service(ServletRequest request, ServletResponse response) 
   throws ServletException, IOException {
}
</pre>
<p>The service () method is called by the container and service method invokes doGet, doPost, doPut, doDelete, etc. methods as appropriate. So you have nothing to do with service() method but you override either doGet() or doPost() depending on what type of request you receive from the client.</p>
<p>The doGet() and doPost() are most frequently used methods with in each service request. Here is the signature of these two methods.</p>
<h2>The doGet() Method</h2>
<p>A GET request results from a normal request for a URL or from an HTML form that has no METHOD specified and it should be handled by doGet() method.</p>
<pre class="prettyprint notranslate">
public void doGet(HttpServletRequest request, HttpServletResponse response)
   throws ServletException, IOException {
   // Servlet code
}
</pre>
<p style="font-size:21px;color:green">The doPost() Method</p>
<p>A POST request results from an HTML form that specifically lists POST as the METHOD and it should be handled by doPost() method.</p>
<pre class="prettyprint notranslate">
public void doPost(HttpServletRequest request, HttpServletResponse response)
   throws ServletException, IOException {
   // Servlet code
}
</pre>
<p style="font-size:21px;color:green">The destroy() Method</p>
<p>The destroy() method is called only once at the end of the life cycle of a servlet. This method gives your servlet a chance to close database connections, halt background threads, write cookie lists or hit counts to disk, and perform other such cleanup activities.</p>
<p>After the destroy() method is called, the servlet object is marked for garbage collection. The destroy method definition looks like this &minus;</p>
<pre class="prettyprint notranslate">
public void destroy() {
   // Finalization code...
}
</pre>
<p style="font-size:21px;color:green">Architecture Diagram</p>
<p>The following figure depicts a typical servlet life-cycle scenario.</p>
<ul style="font-size:18px">
<li><p>First the HTTP requests coming to the server are delegated to the servlet container.</p></li>
<li><p>The servlet container loads the servlet before invoking the service() method.</p></li>
<li><p>Then the servlet container handles multiple requests by spawning multiple threads, each thread executing the service() method of a single instance of the servlet.</p></li>
</ul>
<img src="Ser3.jpg" alt="Servlet Life Cycle" />
<hr />
<p style="font-size:23px;color:green;text-align:center">Servlet Examples</p>
    <p>Servlets are Java classes which service HTTP requests and implement the <b>javax.servlet.Servlet</b> interface. Web application developers typically write servlets that extend javax.servlet.http.HttpServlet, an abstract class that implements the Servlet interface and is specially designed to handle HTTP requests.</p>
<p style="font-size:21px;color:green">Sample Code</p>
<p>Following is the sample source code structure of a servlet example to show Hello World &minus;</p>
<pre class="prettyprint notranslate">
// Import required java libraries
import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

// Extend HttpServlet class
public class HelloWorld extends HttpServlet {
 
   private String message;

   public void init() throws ServletException {
      // Do required initialization
      message = "Hello World";
   }

   public void doGet(HttpServletRequest request, HttpServletResponse response)
      throws ServletException, IOException {
      
      // Set response content type
      response.setContentType("text/html");

      // Actual logic goes here.
      PrintWriter out = response.getWriter();
      out.println("&lt;h1&gt;" + message + "&lt;/h1&gt;");
   }

   public void destroy() {
      // do nothing.
   }
}
</pre>
<img src="Ser4.jpg"><br><br>
    
                           
    <p style="font-size:23px;color:green">GET Method</p>
<p>The GET method sends the encoded user information appended to the page request. The page and the encoded information are separated by the <b>?</b> (question mark) symbol as follows &minus;</p>
<pre class="result notranslate">
http://www.test.com/hello?key1 = value1&amp;key2 = value2
</pre>
<p>The GET method is the default method to pass information from browser to web server and it produces a long string that appears in your browser's Location:box. Never use the GET method if you have password or other sensitive information to pass to the server. The GET method has size limitation: only 1024 characters can be used in a request string.</p>
<p>This information is passed using QUERY_STRING header and will be accessible through QUERY_STRING environment variable and Servlet handles this type of requests using <b>doGet()</b> method.</p>
<h2>POST Method</h2>
<p>A generally more reliable method of passing information to a backend program is the POST method. This packages the information in exactly the same way as GET method, but instead of sending it as a text string after a ? (question mark) in the URL it sends it as a separate message. This message comes to the backend program in the form of the standard input which you can parse and use for your processing. Servlet handles this type of requests using <b>doPost()</b> method.</p>
<h2>Reading Form Data using Servlet</h2>
<p>Servlets handles form data parsing automatically using the following methods depending on the situation &minus;</p>
<ul style="font-size:18px">
<li><p><b>getParameter()</b> &minus; You call request.getParameter() method to get the value of a form parameter.</p></li>
<li><p><b>getParameterValues()</b> &minus; Call this method if the parameter appears more than once and returns multiple values, for example checkbox.</p></li>
<li><p><b>getParameterNames()</b> &minus; Call this method if you want a complete list of all parameters in the current request.</p></li>
</ul>
<p p style="font-size:23px;color:green">GET Method Example using URL</p>
<p>Here is a simple URL which will pass two values to HelloForm program using GET method.</p>
<b>http://localhost:8080/HelloForm?first_name = ZARA&amp;last_name = ALI</b>
<p>Given below is the <b>HelloForm.java</b> servlet program to handle input given by web browser. We are going to use <b>getParameter()</b> method which makes it very easy to access passed information &minus;</p>
<pre class="prettyprint notranslate">
// Import required java libraries
import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

// Extend HttpServlet class
public class HelloForm extends HttpServlet {
 
   public void doGet(HttpServletRequest request, HttpServletResponse response)
      throws ServletException, IOException {
      
      // Set response content type
      response.setContentType("text/html");

      PrintWriter out = response.getWriter();
      String title = "Using GET Method to Read Form Data";
      String docType =
         "&lt;!doctype html public \"-//w3c//dtd html 4.0 " + "transitional//en\"&gt;\n";
         
      out.println(docType +
         "&lt;html&gt;\n" +
            "&lt;head&gt;&lt;title&gt;" + title + "&lt;/title&gt;&lt;/head&gt;\n" +
            "&lt;body bgcolor = \"#f0f0f0\"&gt;\n" +
               "&lt;h1 align = \"center\"&gt;" + title + "&lt;/h1&gt;\n" +
               "&lt;ul&gt;\n" +
                  "  &lt;li&gt;&lt;b&gt;First Name&lt;/b&gt;: "
                  + request.getParameter("first_name") + "\n" +
                  "  &lt;li&gt;&lt;b&gt;Last Name&lt;/b&gt;: "
                  + request.getParameter("last_name") + "\n" +
               "&lt;/ul&gt;\n" +
            "&lt;/body&gt;
         &lt;/html&gt;"
      );
   }
}
</pre>
<p>Assuming your environment is set up properly, compile HelloForm.java as follows &minus;</p>
<pre class="prettyprint notranslate">
$ javac HelloForm.java
</pre>
<p>If everything goes fine, above compilation would produce <b>HelloForm.class</b> file. Next you would have to copy this class file in &lt;Tomcat-installationdirectory&gt;/webapps/ROOT/WEB-INF/classes and create following entries in <b>web.xml</b> file located in &lt;Tomcat-installation-directory&gt;/webapps/ROOT/WEB-INF/</p>
<pre class="prettyprint notranslate">
&lt;servlet&gt;
   &lt;servlet-name&gt;HelloForm&lt;/servlet-name&gt;
   &lt;servlet-class&gt;HelloForm&lt;/servlet-class&gt;
&lt;/servlet&gt;

&lt;servlet-mapping&gt;
   &lt;servlet-name&gt;HelloForm&lt;/servlet-name&gt;
   &lt;url-pattern&gt;/HelloForm&lt;/url-pattern&gt;
&lt;/servlet-mapping&gt;
</pre>
<p>Now type <i>http://localhost:8080/HelloForm?first_name=ZARA&last_name=ALI</i> in your browser's Location:box and make sure you already started tomcat server, before firing above command in the browser. This would generate following result &minus;</p>
<pre class="result notranslate">
<p align="center">Using GET Method to Read Form Data</p>
<ul style="font-size:18px">
<li><b>First Name</b>: ZARA</li>
<li><b>Last Name</b>: ALI</li>
</ul>
</pre>
<p style="font-size:21px;color:green">GET Method Example Using Form</p>
<p>Here is a simple example which passes two values using HTML FORM and submit button. We are going to use same Servlet HelloForm to handle this imput.</p>
<pre class="prettyprint notranslate">
&lt;html&gt;
   &lt;body&gt;
      &lt;form action = "HelloForm" method = "GET"&gt;
         First Name: &lt;input type = "text" name = "first_name"&gt;
         &lt;br /&gt;
         Last Name: &lt;input type = "text" name = "last_name" /&gt;
         &lt;input type = "submit" value = "Submit" /&gt;
      &lt;/form&gt;
   &lt;/body&gt;
&lt;/html&gt;
</pre>
<p>Keep this HTML in a file Hello.htm and put it in &lt;Tomcat-installationdirectory&gt;/webapps/ROOT directory. When you would access <i>http://localhost:8080/Hello.htm</i>, here is the actual output of the above form.</p>
<form action="javascript:void();" method="get" target="_blank">
First Name: <input type="text" name="first_name" />
Last Name: <input type="text" name="last_name" />
<input type="button" value="Submit" />
</form>
<p>Try to enter First Name and Last Name and then click submit button to see the result on your local machine where tomcat is running. Based on the input provided, it will generate similar result as mentioned in the above example.</p>
<p style="font-size:21px;color:green">POST Method Example Using Form</p>
<p>Let us do little modification in the above servlet, so that it can handle GET as well as POST methods. Below is <b>HelloForm.java</b> servlet program to handle input given by web browser using GET or POST methods.</p>
<pre class="prettyprint notranslate">
// Import required java libraries
import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

// Extend HttpServlet class
public class HelloForm extends HttpServlet {

   // Method to handle GET method request.
   public void doGet(HttpServletRequest request, HttpServletResponse response)
      throws ServletException, IOException {
      
      // Set response content type
      response.setContentType("text/html");

      PrintWriter out = response.getWriter();
      String title = "Using GET Method to Read Form Data";
      String docType =
         "&lt;!doctype html public \"-//w3c//dtd html 4.0 " +
         "transitional//en\"&gt;\n";
         
      out.println(docType +
         "&lt;html&gt;\n" +
            "&lt;head&gt;&lt;title&gt;" + title + "&lt;/title&gt;&lt;/head&gt;\n" +
            "&lt;body bgcolor = \"#f0f0f0\"&gt;\n" +
               "&lt;h1 align = \"center\"&gt;" + title + "&lt;/h1&gt;\n" +
               "&lt;ul&gt;\n" +
                  "  &lt;li&gt;&lt;b&gt;First Name&lt;/b&gt;: "
                  + request.getParameter("first_name") + "\n" +
                  "  &lt;li&gt;&lt;b&gt;Last Name&lt;/b&gt;: "
                  + request.getParameter("last_name") + "\n" +
               "&lt;/ul&gt;\n" +
            "&lt;/body&gt;
         &lt;/html&gt;"
      );
   }

   // Method to handle POST method request.
   public void doPost(HttpServletRequest request, HttpServletResponse response)
      throws ServletException, IOException {

      doGet(request, response);
   }
}
</pre>
<p>Now compile and deploy the above Servlet and test it using Hello.htm with the POST method as follows &minus;</p>
<pre class="prettyprint notranslate">
&lt;html&gt;
   &lt;body&gt;
      &lt;form action = "HelloForm" method = "POST"&gt;
         First Name: &lt;input type = "text" name = "first_name"&gt;
         &lt;br /&gt;
         Last Name: &lt;input type = "text" name = "last_name" /&gt;
         &lt;input type = "submit" value = "Submit" /&gt;
      &lt;/form&gt;
   &lt;/body&gt;
&lt;/html&gt;
</pre>
                                                      </div>
<iframe width="560" height="315" src="https://www.youtube.com/embed/CRvcm7GKrF0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                 

  </div>
  <a  class="btn btn-info pre" href="Jdb.php">Previous</a>
  <a class="btn btn-info next" href="#">Next</a>
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