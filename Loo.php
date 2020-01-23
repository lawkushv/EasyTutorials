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

      <h3 style="color: green ;font-size:23px">Loop Statement</h3>
    <div style="text-align:left">
      <p style="font-size:22px;color:green">for loop statements:<p>
    </b>This is also a loop statement that provides a compact way to iterate
    over a range of values. From a&nbsp; user point of view, this is reliable because it
    executes the statements within this block repeatedly till the specified conditions
    is true .<br>
         <p>The Java <em>for loop</em> is used to iterate a part of the program several times. If the number of iteration is fixed, it is recommended to use for loop.</p>
<p>There are three types of for loops in java.</p>
<ul style="font-size:18px">
<li>Simple For Loop</li>
<li>For-each or Enhanced For Loop</li>
<li>Labeled For Loop</li>
</ul>

<p style="font-size:22px;color:green">Java Simple For Loop</p>
<p>The simple for loop is same as C/C++. We can initialize variable, check condition and increment/decrement value.</p>

<p><strong>Syntax:</strong></p>
<div class="codeblock"><pre >
for(initialization;condition;incr/decr){
//code to be executed
}
</pre></div>
<img src="Loo3.jpg" alt="for loop in java flowchart"/>

<p><strong>Example:</strong></p>
<div class="codeblock"><pre>
public class ForExample {
public static void main(String[] args) {
	for(int i=1;i<=10;i++){
		System.out.println(i);
	}
}
}
</pre></div>
<span class="testit"><a href="https://compiler.javatpoint.com/opr/test.jsp?filename=ForExample" target="_blank">Test it Now</a></span>
<p>Output:</p>
<div class="codeblock3"><pre>
1
2
3
4
5
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
<p style="font-size:22px;color:green">Java for-each Loop</p>
<p>The for-each loop is used to traverse array or collection in java. It is easier to use than simple for loop because we don't need to increment value and use subscript notation.</p>
<p>It works on elements basis not index. It returns element one by one in the defined variable.</p>
<p><strong>Syntax:</strong></p>
<div class="codeblock"><pre>
for(Type var:array){
//code to be executed
}
</pre></div>

<p><strong>Example:</strong></p>
<div class="codeblock"><pre >
public class ForEachExample {
public static void main(String[] args) {
	int arr[]={12,23,44,56,78};
	for(int i:arr){
		System.out.println(i);
	}
}
}
</pre></div>
<span class="testit"><a href="https://compiler.javatpoint.com/opr/test.jsp?filename=ForEachExample" target="_blank">Test it Now</a></span>
<p>Output:</p>
<div class="codeblock3"><pre>
12
23
44
56
78
</pre></div>

<p style="font-size:22px;color:green">Java Labeled For Loop</p>
<p>We can have name of each for loop. To do so, we use label before the for loop. It is useful if we have nested for loop so that we can break/continue specific for loop.</p>
<p>Normally, break and continue keywords breaks/continues the inner most for loop only.</p>
<p><strong>Syntax:</strong></p>
<div class="codeblock"><pre>
labelname:
for(initialization;condition;incr/decr){
//code to be executed
}
</pre></div>

<p><strong>Example:</strong></p>
<div class="codeblock"><pre >
public class LabeledForExample {
public static void main(String[] args) {
	aa:
		for(int i=1;i<=3;i++){
			bb:
				for(int j=1;j<=3;j++){
					if(i==2&amp;&amp;j==2){
						break aa;
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
</pre></div>

<p>If you use <strong>break bb;</strong>, it will break inner loop only which is the default behavior of any loop.</p>
<div class="codeblock"><pre>
public class LabeledForExample2 {
public static void main(String[] args) {
	aa:
		for(int i=1;i<=3;i++){
			bb:
				for(int j=1;j<=3;j++){
					if(i==2&amp;&amp;j==2){
						break bb;
					}
					System.out.println(i+" "+j);
				}
		}
}
}
    </pre>
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

<p style="font-size:22px;color:green">Java Infinitive For Loop</p>
<p>If you use two semicolons ;; in the for loop, it will be infinitive for loop.</p>
<p><strong>Syntax:</strong></p>
<div class="codeblock"><pre>
for(;;){
//code to be executed
}
</pre></div>
<p><strong>Example:</strong></p>
<div class="codeblock"><pre>
public class ForExample {
public static void main(String[] args) {
	for(;;){
		System.out.println("infinitive loop");
	}
}
}
</pre></div>
<p>Output:</p>
<div class="codeblock3"><pre>
infinitive loop
infinitive loop
infinitive loop
infinitive loop
infinitive loop
</pre></div>
              
<ol style="font-size:18px">
  <p style="font-size:22px;color:green">while loop statements:<p>
    </b>This is a looping or repeating statement. It executes a block of code
    or statements till the given condition is true. The expression must be
    evaluated to a boolean value. It continues testing the
    condition and executes the block of code. When the expression results to
    false control comes out of loop. <br>
<p>The Java <em>while loop</em> is used to iterate a part of the program several times. If the number of iteration is not fixed, it is recommended to use while loop.</p>

<p><strong>Syntax:</strong></p>
<div class="codeblock"><pre>
while(condition){
//code to be executed
}
</pre></div>
<img src="Loo1.jpg" alt="flowchart of java while loop"/>

<p><strong>Example:</strong></p>
<div class="codeblock"><pre >
public class WhileExample {
public static void main(String[] args) {
    int i=1;
    while(i<=10){
    	System.out.println(i);
    i++;
    }
}
}
</pre></div>
<span class="testit"><a href="https://compiler.javatpoint.com/opr/test.jsp?filename=WhileExample" target="_blank">Test it Now</a></span>
<p>Output:</p>
<div class="codeblock3"><pre>
1
2
3
4
5
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

<p style="font-size:22px;color:green">Java Infinitive While Loop</p>
<p>If you pass <strong>true</strong> in the while loop, it will be infinitive while loop.</p>
<p><strong>Syntax:</strong></p>
<div class="codeblock"><pre >
while(true){
//code to be executed
}
</textarea></div>
<p><strong>Example:</strong></p>
<div class="codeblock"><pre>
public class WhileExample2 {
public static void main(String[] args) {
	while(true){
		System.out.println("infinitive while loop");
	}
}
}
</pre></div>
<p>Output:</p>
<div class="codeblock3"><pre>
infinitive while loop
infinitive while loop
infinitive while loop
infinitive while loop
infinitive while loop
ctrl+c
</pre></div>
                       <br>
  <p style="font-size:22px;color:green">do-while loop statements:</p>
    <p>This is another looping statement that tests the given condition past so you can say that the do-while
    looping statement is a past-test loop
    statement.&nbsp;First the <b>do</b> block statements are executed then the condition
    given in <b> while</b> statement is checked. So in this case, even the condition is
    false in the first attempt, do block of code is executed at least once.<br>
    <p>The Java <em>do-while loop</em> is used to iterate a part of the program several times. If the number of iteration is not fixed and you must have to execute the loop at least once, it is recommended to use do-while loop.</p></p>
<p>The Java <em>do-while loop</em> is executed at least once because condition is checked after loop body.</p>

<p><strong>Syntax:</strong></p>
<div class="codeblock"><pre >
do{
//code to be executed
}while(condition);
</pre></div>
<img src="Loo2.jpg" alt="flowchart of do while loop in java"/>

<p><strong>Example:</strong></p>
<div class="codeblock"><pre>
public class DoWhileExample {
public static void main(String[] args) {
    int i=1;
    do{
    	System.out.println(i);
    i++;
    }while(i<=10);
}
}
</pre></div>
<span class="testit"><a href="https://compiler.javatpoint.com/opr/test.jsp?filename=DoWhileExample" target="_blank">Test it Now</a></span>
<p>Output:</p>
<div class="codeblock3"><pre>
1
2
3
4
5
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
<pstyle="font-size:22px:color:green" >Java Infinitive do-while Loop</h2>
<p>If you pass <strong>true</strong> in the do-while loop, it will be infinitive do-while loop.</p>
<p><strong>Syntax:</strong></p>
<div class="codeblock"><pre>
do{
//code to be executed
}while(true);
</pre></div>
<p><strong>Example:</strong></p>
<div class="codeblock"><pre >
public class DoWhileExample2 {
public static void main(String[] args) {
	do{
		System.out.println("infinitive do while loop");
	}while(true);
}
}
</pre></div>
<p>Output:</p>
<div class="codeblock3"><pre>
infinitive do while loop
infinitive do while loop
infinitive do while loop
ctrl+c
</pre></div>
                       <iframe width="560" height="315" src="https://www.youtube.com/embed/I-YyU_Db5q0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                
                                
                                
                                
                                
                                
                                </div>
    

  </div>
  <a  class="btn btn-info pre" href="Inh.php">Previous</a>
  <a class="btn btn-info next" href="If.php">Next</a>
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