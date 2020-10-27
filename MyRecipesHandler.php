<?php require_once "Dao.php"?>
<?php
session_start();
$_SESSION["bad"] = array();
$_SESSION['good'] = array();
$dao = new Dao();
if( !$_SESSION["access_granted"]){
    $_SESSION['bad'][] = "Must be signed in to add a recipe to your account";
    header("Location:Recipes.php");
}else{
    header("Location:Recipes.php");
}

header("Location:Recipes.php");

?>