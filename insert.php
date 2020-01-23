<?php	
session_start();
require("dbconfig/config.php");
$name = $_SESSION['username'];
$comments = $_REQUEST['comments'];
mysqli_query($con, "INSERT INTO comments(name, comments) VALUES('$name','$comments')");
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