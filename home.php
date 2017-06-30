<?php
session_start();
if(isset($_SESSION['message']))
echo $_SESSION['message'].'<br>';

$db=mysqli_connect("localhost","root","","database");

if(isset($_POST['create'])){
$note=$_POST['note'];
$sql="INSERT INTO notes(note) VALUES('$note')";
mysqli_query($db,$sql);
}
?>





<html>
<body>
<h1>welcome</h1><br><?php echo "user:".$_SESSION['username']."<br>"; ?>
<form method="POST" action="home.php">
Add a note:<input type="text" name="note"><br>
<input type="submit" value="create" name="create"><br>
</form>




<a href="logout.php"> Logout </a>
</body>
</html>