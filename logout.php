<?php
session_start();
session_destroy();
unset($_SESSION['fname']);
unset($_SESSION['lname']);
header("location:login.php");

?>