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

      <p style="color: green;font-size:23px">Multi Threading</h3>
    <div style="text-align:left">
        <p><b>Multithreading in java</b> is a process of executing multiple threads simultaneously.</p>
<p>Thread is basically a lightweight sub-process, a smallest unit of processing. Multiprocessing and multithreading, both are used to achieve multitasking.</p>
<p>But we use multithreading than multiprocessing because threads share a common memory area. They don't allocate separate memory area so saves memory, and context-switching between the threads takes less time than process.
</p>
<p>Java Multithreading is mostly used in games, animation etc.</p>


<hr/>
<p style="color: green;font-size:23px">Advantages of Java Multithreading</p>
<p>1) It <b>doesn't block the user</b> because threads are independent and you can perform multiple operations at same time.</p>
<p>2) You <b>can perform many operations together so it saves time</b>.</p>
<p>3) Threads are <b>independent</b> so it doesn't affect other threads if exception occur in a single thread.</p>

<hr/> 
  <p style="color: green;font-size:20px">Multitasking</p>
<p>Multitasking is a process of executing multiple tasks simultaneously. We use multitasking to utilize the CPU.
Multitasking can be achieved by two ways:</p>
<ul style="font-size:18px">
<li>Process-based Multitasking(Multiprocessing)</li>
<li>Thread-based Multitasking(Multithreading)</li>
</ul>

<p style="color: green;font-size:20px">1) Process-based Multitasking (Multiprocessing)</h3>
<ul style="font-size:20px">
<li>Each process have its own address in memory i.e. each process allocates separate memory area.</li>
<li>Process is heavyweight.</li>
<li>Cost of communication between the process is high.</li>
<li>Switching from one process to another require some time for saving and loading registers, memory maps, updating lists etc.</li>
</ul>

<p style="color: green;font-size:20px">2) Thread-based Multitasking (Multithreading)</h3>
<ul style="font-size:18px">
<li>Threads share the same address space.</li>
<li>Thread is lightweight.</li>
<li>Cost of communication between the thread is low.</li>
</ul>
        <p style="color: green;font-size:20px">What is Thread in java</p>
<p>A thread is a lightweight sub process, a smallest unit of processing. It is a separate path of execution.</p>
<p>Threads are independent, if there occurs exception in one thread, it doesn't affect other threads. It shares a common memory area.
</p>
                                
                <img src="Mul2.jpg">                
                                
                                   </hr>
<p style="font-size:23px;color:green"> LifeCycle of MultiThread</p>
<p>A thread can be in one of the five states. According to sun, there is only 4 states in <b>thread life cycle in java</b> new, runnable, non-runnable and terminated. There is no running state. </p>
<p>But for better understanding the threads, we are explaining it in the 5 states.
The life cycle of the thread in java is controlled by JVM. The java thread states are as follows:
</p>
<ol style="font-size:18px">
<li>New</li>
<li>Runnable</li>
<li>Running</li>
<li>Non-Runnable (Blocked)</li>
<li>Terminated</li>
</ol>                                   
            <img src="Mul1.jpg">                    
                                
<p style="font-size:20px;color:green">1) New</h3>

<p>The thread is in new state if you create an instance of Thread class but before the invocation of start() method.
</p>
</table>
<a id="threadstaterunnable"></a>

<p style="font-size:20px;color:green">2) Runnable</p>
<p>
The thread is in runnable state after invocation of start() method, but the
thread scheduler has not selected it to be the running thread.
</p>
<a id="threadstaterunning"></a>

<p style="font-size:20px;color:green">3) Running</p>
<p>
The thread is in running state if the thread scheduler has selected it.
</p>
<a id="threadstateblocked"></a>

<p style="font-size:20px;color:green">4) Non-Runnable (Blocked)</p>
<p>This is the state when the thread is still alive, but is currently not eligible to run.
</p>

<a id="threadstateterminated"></a>

<p style="font-size:20px;color:green">5) Terminated</p>
<p>A thread is in terminated or dead state when its run() method exits.
</p>

                                     
<p style="font-size:18px"> <strong>Note </strong>Threads can be created by using two mechanisms :<p>
1. Extending the Thread class<br />
2. Implementing the Runnable Interface<br />
<br />&nbsp;<br />
<strong>Thread creation by extending the Thread class</strong><br />
<br />
We create a class that extends the <strong>java.lang.Thread</strong> class. This class overrides the run() method available in the Thread class. A thread begins its life inside run() method. We create an object of our new class and call start() method to start the execution of a thread. Start()  invokes the run() method on the Thread object.<br />
<br />&nbsp;</p>
<pre class="brush: java; title: ; notranslate" title="">
// Java code for thread creation by extending
// the Thread class
class MultithreadingDemo extends Thread
{
    public void run()
    {
        try
        {
            // Displaying the thread that is running
            System.out.println (&quot;Thread &quot; +
                  Thread.currentThread().getId() +
                  &quot; is running&quot;);

        }
        catch (Exception e)
        {
            // Throwing an exception
            System.out.println (&quot;Exception is caught&quot;);
        }
    }
}

// Main Class
public class Multithread
{
    public static void main(String[] args)
    {
        int n = 8; // Number of threads
        for (int i=0; i&lt;8; i++)
        {
            MultithreadingDemo object = new MultithreadingDemo();
            object.start();
        }
    }
}
</pre>
<p>Output :</p>
<pre>Thread 8 is running
Thread 9 is running
Thread 10 is running
Thread 11 is running
Thread 12 is running
Thread 13 is running
Thread 14 is running
Thread 15 is running</pre>
<p>&nbsp;<br />
<strong>Thread creation by implementing the Runnable Interface</strong><br />
<br />
We create a new class which implements java.lang.Runnable interface and override run() method. Then we instantiate a Thread object and call start() method on this object.</p>
<pre class="brush: java; title: ; notranslate" title="">
// Java code for thread creation by implementing
// the Runnable Interface
class MultithreadingDemo implements Runnable
{
    public void run()
    {
        try
        {
            // Displaying the thread that is running
            System.out.println (&quot;Thread &quot; +
                                Thread.currentThread().getId() +
                                &quot; is running&quot;);

        }
        catch (Exception e)
        {
            // Throwing an exception
            System.out.println (&quot;Exception is caught&quot;);
        }
    }
}

// Main Class
class Multithread
{
    public static void main(String[] args)
    {
        int n = 8; // Number of threads
        for (int i=0; i&lt;8; i++)
        {
            Thread object = new Thread(new MultithreadingDemo());
            object.start();
        }
    }
}
</pre>
<p>Output :
<pre>Thread 8 is running
Thread 9 is running
Thread 10 is running
Thread 11 is running
Thread 12 is running
Thread 13 is running
Thread 14 is running
Thread 15 is running</pre>
<p>&nbsp;</p>                            
                                                       
        <p style="font-size:20px;color:green">Commonly used Constructors of Thread class:</p>
<table >
<tr><td>
<ul style="font-size:18px">
<li>Thread()</li>
<li>Thread(String name)</li>
<li>Thread(Runnable r)</li>
<li>Thread(Runnable r,String name)</li>
</ul>
</td></tr>
</table>
                                               
            <br><br>  
                                                       
        <p style="font-size:20px;color:green">Commonly used methods of Thread class:</p>

<table>
<tr><td>
<ol style="font-size:18px">
<li><strong>public void run():  </strong> is used to perform action for a thread.</li>
<li><strong>public void start():  </strong>starts the execution of the thread.JVM calls the run() method on the thread.</li>
<li><strong>public void sleep(long miliseconds):  </strong> Causes the currently executing thread to sleep (temporarily cease execution) for the specified number of milliseconds.</li>
<li><strong>public void join():  </strong>waits for a thread to die.</li>
<li><strong>public void join(long miliseconds):  </strong>waits for a thread to die for the specified miliseconds.</li>
<li><strong>public int getPriority():  </strong>returns the priority of the thread.</li>
<li><strong>public int setPriority(int priority):  </strong>changes the priority of the thread.</li>
<li><strong>public String getName():  </strong>returns the name of the thread.</li>
<li><strong>public void setName(String name):  </strong>changes the name of the thread.</li>
<li><strong>public Thread currentThread():  </strong>returns the reference of currently executing thread.</li>
<li><strong>public int getId():  </strong>returns the id of the thread.</li>
<li><strong>public Thread.State getState():  </strong>returns the state of the thread.</li>
<li><strong>public boolean isAlive():  </strong>tests if the thread is alive.</li>
<li><strong>public void yield():  </strong>causes the currently executing thread object to temporarily pause and allow other threads to execute.</li>
<li><strong>public void suspend():  </strong>is used to suspend the thread(depricated).</li>
<li><strong>public void resume():  </strong>is used to resume the suspended thread(depricated).</li>
<li><strong>public void stop():  </strong>is used to stop the thread(depricated).</li>
<li><strong>public boolean isDaemon():  </strong>tests if the thread is a daemon thread.</li>
<li><strong>public void setDaemon(boolean b):  </strong>marks the thread as daemon or user thread.</li>
<li><strong>public void interrupt():  </strong>interrupts the thread.</li>
<li><strong>public boolean isInterrupted():  </strong>tests if the thread has been interrupted.</li>
<li><strong>public static boolean interrupted():  </strong>tests if the current thread has been interrupted.</li>
</ol>
</table>

<hr/>
                                               
    <p style="font-size;20px;color:green">1) Java Thread Example by extending Thread class</p>

<div class="codeblock"><pre>

class Multi extends Thread{
public void run(){
System.out.println("thread is running...");
}
public static void main(String args[]){
Multi t1=new Multi();
t1.start();
 }
}
</pre></div>
<div class="codeblock3"><pre>
Output:thread is running...
</pre></div>

<hr/>

<p style="font-size:20px;color:green">2) Java Thread Example by implementing Runnable interface</p>

<div class="codeblock"><pre >

class Multi3 implements Runnable{
public void run(){
System.out.println("thread is running...");
}

public static void main(String args[]){
Multi3 m1=new Multi3();
Thread t1 =new Thread(m1);
t1.start();
 }
}
</pre></div>

<div class="codeblock3"><pre>
Output:thread is running...
</pre></div>

<table  >
       
                            
                                
                                </div>
    
                       <iframe width="560" height="315" src="https://www.youtube.com/embed/Hysb7hXp8B0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

  </div>
  <a  class="btn btn-info pre" href="stringhandling.php">Previous</a>
  <a class="btn btn-info next" href="App.php">Next</a>
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