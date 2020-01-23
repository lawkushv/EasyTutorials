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

      <h3 style="color: green">JDBC</h3>
<div style="text-align:left">
 <p style="font-size:22px;color:green;text-align:center">Java JDBC Tutorial</p>

<p>Java JDBC is a java API to connect and execute query with the database. JDBC API uses jdbc drivers to connect with the database.</p>
<p>JDBC stands for <b>J</b>ava <b>D</b>ata<b>b</b>ase <b>C</b>onnectivity, which is a standard Java API for database-independent connectivity between the Java programming language and a wide range of databases.</p>
<p>The JDBC library includes APIs for each of the tasks mentioned below that are commonly associated with database usage.</p>
    <img src="Jdb1.jpg" alt="JDBC (Java Database Connectivity) "/>
<ul styel="font-size:18px">
<li><p>Making a connection to a database.</p></li>
<li><p>Creating SQL or MySQL statements.</p></li>
<li><p>Executing SQL or MySQL queries in the database.</p></li>
<li><p>Viewing &amp; Modifying the resulting records.</p></li>
</ul>
<p>Fundamentally, JDBC is a specification that provides a complete set of interfaces that allows for portable access to an underlying database. Java can be used to write different types of executables, such as &minus;</p>
<ul style="font-size:18px">
<li><p>Java Applications</p></li>
<li><p>Java Applets</p></li>
<li><p>Java Servlets</p></li>
<li><p>Java ServerPages (JSPs)</p></li>
<li><p>Enterprise JavaBeans (EJBs).</p></li>
</ul>

<a name="why"></a>
<p style="font-size:22px;color:green;text-align:center">Why use JDBC</p>
<p>Before JDBC, ODBC API was the database API to connect and execute query with the database. But, ODBC API uses ODBC driver which is written in C language (i.e. platform dependent and unsecured). That is why Java has defined its own API (JDBC API) that uses JDBC drivers (written in Java language).</p>

<p style="font-size:22px;color:green;text-align:center">JDBC Architecture</p>
<p>The JDBC API supports both two-tier and three-tier processing models for database access but in general, JDBC Architecture consists of two layers &minus;</p>
<ul style="font-size:18px">
<li><p><b>JDBC API:</b> This provides the application-to-JDBC Manager connection.</p></li>
<li><p><b>JDBC Driver API:</b> This supports the JDBC Manager-to-Driver Connection.</p></li>
</ul>
<p>The JDBC API uses a driver manager and database-specific drivers to provide transparent connectivity to heterogeneous databases.</p>
<p>The JDBC driver manager ensures that the correct driver is used to access each data source. The driver manager is capable of supporting multiple concurrent drivers connected to multiple heterogeneous databases.</p>
<p>Following is the architectural diagram, which shows the location of the driver manager with respect to the JDBC drivers and the Java application &minus;</p>
<center>
<img src="Jdb2.jpg" alt="JDBC Architecture" />
</center>
<h2>Common JDBC Components</h2>
<p>The JDBC API provides the following interfaces and classes &minus;</p>
<ul style="font-size:18px">
<li><p><b>DriverManager:</b> This class manages a list of database drivers. Matches connection requests from the java application with the proper database driver using communication sub protocol. The first driver that recognizes a certain subprotocol under JDBC will be used to establish a database Connection.</p></li>
<li><p><b>Driver:</b> This interface handles the communications with the database server. You will interact directly with Driver
objects very rarely. Instead, you use DriverManager objects, which manages objects of this type. It also abstracts the details associated with working with Driver objects.</p></li>
<li><p><b>Connection:</b> This interface with all methods for contacting a database. The connection object represents communication context, i.e., all communication with database is through connection object only.</p></li>
<li><p><b>Statement:</b> You use objects created from this interface to submit the SQL statements to the database. Some derived interfaces accept parameters in addition to executing stored procedures.</p></li>
<li><p><b>ResultSet:</b> These objects hold data retrieved from a database after you execute an SQL query using Statement objects. It acts as an iterator to allow you to move through its data.</p></li>
<li><p><b>SQLException:</b> This class handles any errors that occur in a database application.</p></li>
</ul>                         
                                                          

<p style="font-size:23px;color:green">Steps for connectivity between Java program and database</p>
<p><strong>1. Loading the Driver</strong><br />
To begin with, you first need load the driver or register it before using it in the program . Registration is to be done once in your program. You can register a driver in one of two ways mentioned below :</p>
<ul style="font-size:18px">
<li><strong>Class.forName() : </strong>Here we load the driver’s class file into memory at the runtime. No need of using new or creation of object .The following example uses Class.forName() to load the Oracle driver –
<pre> Class.forName(“oracle.jdbc.driver.OracleDriver”);</pre>
</li>
<li> <strong>DriverManager.registerDriver(): </strong>DriverManager is a Java inbuilt class with a static member register. Here we call the constructor of the driver class at compile time . The following example uses DriverManager.registerDriver()to register the Oracle driver –
<pre> DriverManager.registerDriver(new oracle.jdbc.driver.OracleDriver())</pre>
</li>
</ul>
<p>2.<strong> Create the connections</strong><br />
After loading the driver, establish connections using :</p><br/>
        
            
<pre> Connection con = DriverManager.getConnection(url,user,password)</pre>
<p><strong>user</strong> – username from which your sql command prompt can be accessed.<br />
<strong>password</strong> – password from which your sql command prompt can be accessed.</p>
<p><strong>con:</strong> is a reference to Connection interface.<br />
<strong>url</strong> : Uniform Resource Locator. It can be created as follows:</p>
<pre>String url = “ jdbc:oracle:thin:@localhost:1521:xe”</pre>
<p>Where oracle is the database used, thin is the driver used , @localhost is the IP Address where database is stored, 1521 is the port number and xe is the service provider. All 3 parameters above are of String type and are to be declared by programmer before calling the function. Use of this can be referred from final code.</p>
<p><strong>3. Create a statement</strong><br />
Once a connection is established you can interact with the database. The JDBCStatement, CallableStatement, and PreparedStatement interfaces define the methods that enable you to send SQL commands and receive data from your database.<br />
Use of JDBC Statement is as follows:</p>
<pre>Statement st = con.createStatement();</pre>
<p>Here, con is a reference to Connection interface used in previous step .</p>
<p><strong>4. Execute the query</strong><br />
Now comes the most important part i.e executing the query. Query here is an SQL Query . Now we know we can have multiple types of queries. Some of them are as follows:</p>
<ul style="font-size:18px">
<li>Query for updating / inserting table in a database.</li>
<li>Query for retrieving data .</li>
</ul>
<p>The executeQuery() method of Statement interface is used to execute queries of retrieving values from the database. This method returns the object of ResultSet that can be used to get all the records of a table.<br />
The executeUpdate(sql query) method ofStatement interface is used to execute queries of updating/inserting .</p>
<p>Example:</p>
<pre>int m = st.executeUpdate(sql);
if (m==1)
    System.out.println("inserted successfully : "+sql);
else
    System.out.println("insertion failed");</pre>
<p>Here sql is sql query of the type String</p>
<p><strong>5.Close the connections</strong><br />
So finally we have sent the data to the specified location and now we are at the verge of completion of our task .<br />
By closing connection, objects of Statement and ResultSet will be closed automatically. The close() method of Connection interface is used to close the connection.<br />
Example :</p>
<pre> con.close();</pre>
<p><strong>Implementation</strong></p>
<pre class="brush: java; title: ; notranslate" title="">
importjava.sql.*;
importjava.util.*;
class Main
{
    public static void main(String a[])
    {
        //Creating the connection
        String url = &quot;jdbc:oracle:thin:@localhost:1521:xe&quot;;
        String user = &quot;system&quot;;
        String pass = &quot;12345&quot;;

        //Entering the data
        Scanner k = new Scanner(System.in);
        System.out.println(&quot;enter name&quot;);
        String name = k.next();
        System.out.println(&quot;enter roll no&quot;);
        int roll = k.nextInt();
        System.out.println(&quot;enter class&quot;);
        String cls =  k.next();

        //Inserting data using SQL query
        String sql = &quot;insert into student1 values('&quot;+name+&quot;',&quot;+roll+&quot;,'&quot;+cls+&quot;')&quot;;
        Connection con=null;
        try
        {
            DriverManager.registerDriver(new oracle.jdbc.OracleDriver());

            //Reference to connection interface
            con = DriverManager.getConnection(url,user,pass);

            Statement st = con.createStatement();
            int m = st.executeUpdate(sql);
            if (m == 1)
                System.out.println(&quot;inserted successfully : &quot;+sql);
            else
                System.out.println(&quot;insertion failed&quot;);
            con.close();
        }
        catch(Exception ex)
        {
            System.err.println(ex);
        }
    }
}
</pre>
                               
    <img src="jdb3.jpg">                                                         
                      <br><br>                 
                                                                                                      
                                                          
  <p style="font-size:22px;color:green">Example to Connect Java Application with mysql database</p>
<p>In this example, sonoo is the database name, root is the username and password.</p>

<div class="codeblock"><pre>
import java.sql.*;
class MysqlCon{
public static void main(String args[]){
try{
Class.forName("com.mysql.jdbc.Driver");
Connection con=DriverManager.getConnection(
"jdbc:mysql://localhost:3306/sonoo","root","root");
//here sonoo is database name, root is username and password
Statement stmt=con.createStatement();
ResultSet rs=stmt.executeQuery("select * from emp");
while(rs.next())
System.out.println(rs.getInt(1)+"  "+rs.getString(2)+"  "+rs.getString(3));
con.close();
}catch(Exception e){ System.out.println(e);}
}
}
</pre></div>
 <p style="font-size:22px;color:green;text-align:center">JDBC Driver</p>
<div id="upr">
<ol style="font-size:18px">
<li><a href="#">JDBC Drivers</a>
<ol style="font-size:18px">
<li><a href="#driver1">JDBC-ODBC bridge driver</a></li>
<li><a href="#driver2">Native-API driver</a></li>
<li><a href="#driver3">Network Protocol driver</a></li>
<li><a href="#driver4">Thin driver</a></li>
</ol></li>
</ol>
</div>

<table style="font-size:18px" >
<tr><td>JDBC Driver is a software component that enables java application to interact with the database.There are 4 types of JDBC drivers:
                             <br><br>
<ol style="font-size:18px">
<li>JDBC-ODBC bridge driver</li>
<li>Native-API driver (partially java driver)</li>
<li>Network Protocol driver (fully java driver)</li>
<li>Thin driver (fully java driver)</li>
</ol>
</td></tr>
</table>

<a id="driver1"></a>
<p style="font-size:22px;color:green">1) JDBC-ODBC bridge driver</h3>
<table  style="font-size:18px">
<tr><td>The JDBC-ODBC bridge driver uses ODBC driver to connect to the database. The JDBC-ODBC bridge driver converts JDBC method calls into the ODBC function calls. This is now discouraged because of thin driver.
</td></tr>
</table>

<img alt="JDBC-ODBC Bridge" src="jdb4.JPG"/>

<p style="font-size:21px:color:green">Advantages:</p>
<ul style="font-size:18px">
<li>easy to use.</li>
<li>can be easily connected to any database.</li>
</ul>

<p style="font-size:21px;color:green">Disadvantages:</p>
<ul style="font-size:18px">
<li>Performance degraded because JDBC method call is converted into the ODBC function calls.</li>
<li>The ODBC driver needs to be installed on the client machine.</li>
</ul>

<hr/>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- CM_JTP_WTC_Responsive -->
<ins class="adsbygoogle cm_jtp_wtc_responsive"
     style="display:inline-block"
     data-ad-client="ca-pub-4699858549023382"
     data-ad-slot="6746133113"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<a id="driver2"></a>
<p style="font-size:21px;color:green">2) Native-API driver</p>
<table  style="font-size:18px">
<tr><td>The Native API driver uses the client-side libraries of the database. The driver converts JDBC method calls into native calls of the database API. It is not written entirely in java.
</td></tr>
</table>
<img alt="Native Protocol Driver" src="jdb5.JPG"/>
<p style="font-size:21px;color:green">Advantage:</p>
<ul style="font-size:18px">
<li>performance upgraded than JDBC-ODBC bridge driver.</li>
</ul>

<p style="font-size:21px;color:green">Disadvantage:</h3>
<ul style="font-size:18px">
<li>The Native driver needs to be installed on the each client machine.</li>
<li>The Vendor client library needs to be installed on client machine.</li>

</ul>

<hr/>
<a id="driver3"></a>
<p style="font-size:18px;color:green">3) Network Protocol driver</h3>
<p>The Network Protocol driver uses middleware (application server) that converts JDBC calls directly or indirectly into the vendor-specific database protocol. It is fully written in java.
</p>
<img alt="Network Protocol driver" src="jdb6.JPG"/>
<p style="font-size:21px;color:green">Advantage:</p>
<ul style="font-size:18px">
<li>No client side library is required because of application server that can perform many tasks like auditing, load balancing, logging etc.</li>
</ul>

<p style="font-size:21px;color:green">Disadvantages:</p>
<ul style="font-size:18px">
<li>Network support is required on client machine.</li>
<li>Requires database-specific coding to be done in the middle tier.</li>
<li>Maintenance of Network Protocol driver becomes costly because it requires database-specific coding to be done in the middle tier.</li>
</ul>
<hr/>
<a id="driver4"></a>
<p style="font-size:18px;color:green">4) Thin driver</h3>
<table style="font-size:18px" >
<tr><td>The thin driver converts JDBC calls directly into the vendor-specific database protocol. That is why it is known as thin driver. It is fully written in Java language.
</td></tr>
</table>
<img alt="Thin driver" src="jdb7.JPG"/>
<p style="font-size:21px;color:green">Advantage:</p>
<ul style="font-size:18px">
<li>Better performance than all other drivers.</li>
<li>No software is required at client side or server side.</li>
</ul>

<p style="font-size:21px;color:green">Disadvantage:</p>
<ul style="font-size:18px">
<li>Drivers depends on the Database.</li>
</ul>
<p style="font-size:21px;color:green">Example to Connect Java Application with access with DSN</p>
<p>Connectivity with type1 driver is not considered good. To connect java application with type1 driver, create DSN first, here we are assuming your dsn name is mydsn.</p>

<div class="codeblock"><pre >
import java.sql.*;
class Test{
public static void main(String ar[]){
 try{
   String url="jdbc:odbc:mydsn";
   Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
   Connection c=DriverManager.getConnection(url);
   Statement st=c.createStatement();
   ResultSet rs=st.executeQuery("select * from login");
  
   while(rs.next()){
    System.out.println(rs.getString(1));
   }

}catch(Exception ee){System.out.println(ee);}

}}
</pre></div></div>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/lGNgS00nz_0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                          
                                                          
                                                          
    
    

  </div>
  <a  class="btn btn-info pre" href="App.php">Previous</a>
  <a class="btn btn-info next" href="Ser.php">Next</a>
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