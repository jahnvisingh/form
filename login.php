<?php
session_start();
$error=false;
$var="";
$usererror="";
$passError="";

$db=mysqli_connect("localhost","root","","database");
if(isset($_POST['login']))
{
  $username=mysql_real_escape_string($_POST['username']);
  $password=mysql_real_escape_string($_POST['password1']);
  

  if(empty($username)){
  $error=true;
  $usererror="please enter username";
  }

  if (empty($password)){
   $error=true;
   $passError="Please enter password.";
  }

$password=md5($password);
  
  if(!$error){
  	$sql= "SELECT*FROM db WHERE username='$username' AND password='$password' ";
  	$result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result)>=1)
     {
  	  $_SESSION['message']="you are now logged in";
  	  $_SESSION['username']=$username;
  	  header("location: home.php");
     }
    else
     {
       $var="incorrect username/password combination"."<br>";
     }
   }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
if(isset($_SESSION['message']))
echo $_SESSION['message'].'<br>';
?>
LOGIN
<form action="login.php" method="POST">
USERNAME:<br><input type="text" name="username" placeholder="*"><br><span class="text-danger" ><?php echo $usererror; ?></span><br>
PASSWORD:<br><input type="password" name="password1" ><br><span class="text-danger"><?php echo $passError; ?></span><br>
<input type="submit" name="login" value="login"><br>
<?php echo $var ?>
<br>
</form>
<a href="register.php">create new account!</a>
</body>
</html>