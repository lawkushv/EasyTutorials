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

      
    <p style="font-size:22px;color:green;text-align:center">Java Break Statement</p>
    <div style="text-align:left">
<p>When a break statement is encountered inside a loop, the loop is immediately terminated and the program control resumes at the next statement following the loop.</p> 
<p>The Java <em>break</em> is used to break loop or switch statement. It breaks the current flow of the program at specified condition. In case of inner loop, it breaks only inner loop.</p>

<p><strong>Syntax:</strong></p>
<div class="codeblock"><pre>
jump-statement;  
break; 
</pre></div>
<img src="Swi1.jpg" alt="java break statement flowchart"/>

 <p style="font-size:22px;color:green;text-align:center">Java Break Statement with Loop</p>
<p><strong>Example:</strong></p>
<div class="codeblock"><pre>
public class BreakExample {
public static void main(String[] args) {
    for(int i=1;i<=10;i++){
    	if(i==5){
    		break;
    	}
    	System.out.println(i);
    }
}
}
</pre></div>
<p>Output:</p>
<div class="codeblock3"><pre>
1
2
3
4
</pre></div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- CM_JTP_WTC_Responsive -->
<ins class="adsbygoogle cm_jtp_wtc_responsive"
     style="display:inline-block"
     data-ad-client="ca-pub-4699858549023382"
     data-ad-slot="6746133113"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
 <p style="font-size:22px;color:green;text-align:center">Java Break Statement with Inner Loop</p>
<p>It breaks inner loop only if you use break statement inside the inner loop.</p>
<p><strong>Example:</strong></p>
<div class="codeblock"><pre>
public class BreakExample2 {
public static void main(String[] args) {
	        for(int i=1;i<=3;i++){  
	                for(int j=1;j<=3;j++){  
	                    if(i==2&&j==2){  
	                        break;  
	                    }  
	                    System.out.println(i+" "+j);  
	                }  
	        }  
}
}
</pre></div>
<p>Output:</p>
<div class="codeblock3"><pre>
1 1
1 2
1 3
2 1
3 1
3 2
3 3
                       </pre></div>
                       <p style="font-size:22px;color:green;text-align:center">Java Continue Statement</p>
<p>The continue statement is used in loop control structure when you need to  immediately jump to the next iteration of the loop. It can be used with for loop or while loop.</p>
<p>The Java <em>continue statement</em> is used to continue loop. It continues the current flow of the program and skips the remaining code at specified condition. In case of inner loop, it continues only inner loop.</p>

<p><strong>Syntax:</strong></p>
<div class="codeblock"><pre>
jump-statement;  
continue; 
</pre></div>
                      <img src="Swi2.jpg">

<p style="font-size:22px;color:green;text-align:center">Java Continue Statement Example</p>
<p><strong>Example:</strong></p>
<div class="codeblock"><pre>
public class ContinueExample {
public static void main(String[] args) {
    for(int i=1;i<=10;i++){
    	if(i==5){
    		continue;
    	}
    	System.out.println(i);
    }
}
}
</pre></div>
<p>Output:</p>
<div class="codeblock3"><pre>
1
2
3
4
6
7
8
9
10
</pre></div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- CM_JTP_WTC_Responsive -->
<ins class="adsbygoogle cm_jtp_wtc_responsive"
     style="display:inline-block"
     data-ad-client="ca-pub-4699858549023382"
     data-ad-slot="6746133113"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<p style="font-size:22px;color:green;text-align:center">Java Continue Statement with Inner Loop</p>
<p>It continues inner loop only if you use continue statement inside the inner loop.</p>
<p><strong>Example:</strong></p>
<div class="codeblock"><pre>
public class ContinueExample2 {
public static void main(String[] args) {
	        for(int i=1;i<=3;i++){  
	                for(int j=1;j<=3;j++){  
	                    if(i==2&&j==2){  
	                        continue;  
	                    }  
	                    System.out.println(i+" "+j);  
	                }  
	        }  
}
}
</pre></div>
<p>Output:</p>
<div class="codeblock3"><pre>
1 1
1 2
1 3
2 1
2 3
3 1
3 2
3 3
</pre></div>
                       <p style="font-size:23px;color:green;text-align:center">Java Switch Statement</p>
<p>The Java <em>switch statement</em> executes one statement from multiple conditions. It is like if-else-if ladder statement.</p>

<p><strong>Syntax:</strong></p>
<div class="codeblock"><pre>
switch(expression){  
case value1:  
 //code to be executed;  
 break;  //optional
case value2:  
 //code to be executed;  
 break;  //optional
......  
  
default:   
 code to be executed if all cases are not matched;  
}  
</pre></div>
<img src="Swi3.jpg" alt="flow of switch statement in java"/>

<p><strong>Example:</strong></p>
<div class="codeblock"><pre>
public class SwitchExample {
public static void main(String[] args) {
	int number=20;
	switch(number){
	case 10: System.out.println("10");break;
	case 20: System.out.println("20");break;
	case 30: System.out.println("30");break;
	default:System.out.println("Not in 10, 20 or 30");
	}
}
}
</pre></div>
<span class="testit"><a href="https://compiler.javatpoint.com/opr/test.jsp?filename=SwitchExample" target="_blank">Test it Now</a></span>
<p>Output:</p>
<div class="codeblock3"><pre>
20
</pre></div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- CM_JTP_WTC_Responsive -->
<ins class="adsbygoogle cm_jtp_wtc_responsive"
     style="display:inline-block"
     data-ad-client="ca-pub-4699858549023382"
     data-ad-slot="6746133113"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<p style="font-size:23px;color:green;text-align:center">Java Switch Statement is fall-through</p>
<p>The java switch statement is fall-through. It means it executes all statement after first match if break statement is not used with switch cases.</p>
<p><strong>Example:</strong></p>
<div class="codeblock"><pre>
public class SwitchExample2 {
public static void main(String[] args) {
	int number=20;
	switch(number){
	case 10: System.out.println("10");
	case 20: System.out.println("20");
	case 30: System.out.println("30");
	default:System.out.println("Not in 10, 20 or 30");
	}
}
}
</pre></div>
<span class="testit"><a href="https://compiler.javatpoint.com/opr/test.jsp?filename=SwitchExample2" target="_blank">Test it Now</a></span>
<p>Output:</p>
<div class="codeblock3"><pre>
20
30
Not in 10, 20 or 30
</pre></div>
<iframe width="560" height="315" src="https://www.youtube.com/embed/s1FCSPO_kGM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    

  </div>
  <a  class="btn btn-info pre" href="If.php">Previous</a>
  <a class="btn btn-info next" href="stringhandling.php">Next</a>
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