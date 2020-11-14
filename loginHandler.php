<?php require_once "Dao.php"?>
<?php require_once "JMartinlogger.php"?>
<?php
// login_handler.php
session_start();
$_SESSION['email'] = $_POST['email'];
$_SESSION['bad'] = array();
$_SESSION['good'] = array();
$dao = new Dao();
$dao->getConnection();
// For simplification Lets pretend I got these login credentials from an SQL table.
$userEmail=$_POST['email'];
if(strlen($userEmail)>256||$userEmail==null){
    $_SESSION['status'] = "Email is not valid must be under 256 characters";
    header("Location:LogIn.php");
    
}
$pass=$_POST['password'];
if(strlen($pass)>64||$pass==null){
  $_SESSION["status"]= "Password is not valid must be under 64 characters";
    header("Location:LogIn.php");
    
}
$pass =hash("sha256", $pass . "fsaj^$%654%^*009#!@42(#~~+*\]p[[");
$resul=$dao->getUser($userEmail,$pass);
$user= $resul[0]['userEmail'];
$p=$resul[0]['pass'];
if ($p == $pass) {
  $_SESSION["access_granted"] = true;
  header("Location:granted.php");  
} else {
  $_SESSION["access_granted"]=false;
  $_SESSION["status"] = "Invalid username or password";
  header("Location:LogIn.php");
}
?>