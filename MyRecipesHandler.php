<?php require_once "Dao.php"?>
<?php
session_start();
$_SESSION["bad"] = array();
$_SESSION['good'] = array();
$logger = new KLogger ("logger.txt" , KLogger::DEBUG);
$dao = new Dao();
if( !$_SESSION["access_granted"]){
    $_SESSION['bad'][] = "Must be signed in to add a recipe to your account";
    header("Location:MyRecipes.php");
}else{
$search= $_POST["myrecipeSearch"];
$logger->LogDebug($search);
$logger->LogDebug("dfjfdgjagsfjsdgfjsfgjsdfgoeraiwrirteiwertiwrtiertwiwertiewrti");

if($search!=NULL){
    $logger->LogDebug("dfjfdgjagsfjsdgfjsfgjsdfgoeraiwrirteiwertiwrtiertwiwertiewrti");
    $_SESSION["mysearchresults"]=$search;
    $_SESSION["mysearch"]=$search;

}
    header("Location:MyRecipes.php");
}

header("Location:MyRecipes.php");

?>