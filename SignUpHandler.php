session_start();
<?php require_once "Dao.php"?>
<?php require_once "JMartinlogger.php"?>
<?php

$logger = new KLogger ("log.txt" , KLogger::DEBUG);
$_SESSION['bad'] = array();
$_SESSION['good'] = array();
session_start();
$dao = new Dao();
$_SESSION["email"] = $_POST["signupemail"];

$userEmail=$_POST['signupemail'];
if(strlen($userEmail)>256||$userEmail==null){
    $_SESSION['bad'][] = "Email is not valid must be under 256 characters";
    header("Location:SignUp.php");
    
}
$signupPassword=$_POST["signuppassword"];
if(strlen($signupPassword)>64||$signupPassword==null){
    $_SESSION['bad'][] = "Password is not valid must be under 64 characters";
    header("Location:SignUp.php");
    
}
$confirmPassword=$_POST["confirmpassword"];
if(strlen($confirmPassword)>64||$confirmPassword==null){
    $_SESSION['bad'][] = "Password is not valid must be under 64 characters";
    header("Location:SignUp.php");
    exit();
}
$glutenAllergy=$_POST["gluten"];
$_SESSION["gluten"] = $_POST["gluten"];
if($glutenAllergy=="Yes"){
    $glutenAllergy=1;
}else if($glutenAllergy==null){
    $glutenAllergy=0;
}else{
    $_SESSION['bad'][] = "Invalid input for checkbox";
    header("Location:SignUp.php");
    

}
$lactoseAllergy=$_POST["lactose"];
$_SESSION["lactose"] = $_POST["lactose"];
if($lactoseAllergy=="Yes"){
    $lactoseAllergy=1;
}else if($lactoseAllergy==null){
    $lactoseAllergy=0;
}else{
    $_SESSION['bad'][] = "Invalid input for checkbox";
    header("Location:SignUp.php");
    
}
$peanutsAllergy=$_POST["peanuts"];
$_SESSION["peanuts"] = $_POST["peanuts"];
if($peanutsAllergy=="Yes"){
    $peanutsAllergy=1;
}else if($peanutsAllergy==null){
    $peanutsAllergy=0;
}else{
    $_SESSION['bad'][] = "Invalid input for checkbox";
    header("Location:SignUp.php");
    

}
$treeNutsAllergy=$_POST["treenuts"];
$_SESSION["treenuts"] = $_POST["treenuts"];
if($treeNutsAllergy=="Yes"){
    $treeNutsAllergy=1;
}else if($treeNutsAllergy==null){
    $treeNutsAllergy=0;
}else{
    $_SESSION['bad'][] = "Invalid input for checkbox";
    header("Location:SignUp.php");
    
}
$shellFishAllergy=$_POST["shellfish"];
$_SESSION["shellfish"] = $_POST["shellfish"];
if($shellFishAllergy=="Yes"){
    $shellFishAllergy=1;
}else if($shellFishAllergy==null){
    $shellFishAllergy=0;
}else{
    $_SESSION['bad'][] = "Invalid input for checkbox";
    header("Location:SignUp.php");
    

}
$eggsAllergy=$_POST["eggs"];
$_SESSION["eggs"] = $_POST["eggs"];
if($eggsAllergy=="Yes"){
    $eggsAllergy=1;
}else if($eggsAllergy==null){
    $eggsAllergy=0;
}else{
    $_SESSION['bad'][] = "Invalid input for checkbox";
    header("Location:SignUp.php");
    
}
$soyAllergy=$_POST["soy"];
$_SESSION["soy"] = $_POST["soy"];
if($soyAllergy=="Yes"){
    $soyAllergy=1;
}else if($soyAllergy==null){
    $soyAllergy=0;
}else{
    $_SESSION['bad'][] = "Invalid input for checkbox";
}
if($_SESSION["access_granted"]){
    $status =  "You are already signed in.";
  $_SESSION["status"] = $status;
header("Location:SignUp.php");
}else{
if ($signupPassword==$confirmPassword) {
    if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
    $signupPassword =hash("sha256", $signupPassword . "fsaj^$%654%^*009#!@42(#~~+*\]p[[");
    $worked=$dao->saveUser($userEmail , $signupPassword, $glutenAllergy, $lactoseAllergy, $peanutsAllergy, $treeNutsAllergy, $shellFishAllergy, $eggsAllergy, $soyAllergy);
    
    if($worked){
    $_SESSION["access_granted"] = true;
    header("Location:granted.php"); 
   }else{
    $_SESSION["access_granted"] = false;
    $_SESSION['status'] = "There is already an account with that email please login";
    header("Location:SignUp.php");
   } 
    }else {
    $status = "Not a valid email";
  $_SESSION["status"] = $status;
  $_SESSION["access_granted"] = false;
  header("Location:SignUp.php");
    }
  
} else {
  $status = "Passwords do not match";
  $_SESSION["status"] = $status;
  $_SESSION["access_granted"] = false;
  header("Location:SignUp.php");
  exit();
}
}
?>