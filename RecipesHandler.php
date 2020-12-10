<?php require_once "Dao.php"?>
<?php require_once "JMartinlogger.php"?>
<?php

// login.php
session_start();
$logger = new KLogger ("logger.txt" , KLogger::DEBUG);
$_SESSION["bad"] = array();
$_SESSION['good'] = array();
//$_SESSION["searchresults"] =array();
$dao = new Dao();
$search= $_POST["recipeSearch"];
$logger->LogDebug($search);
$logger->LogDebug("dfjfdgjagsfjsdgfjsfgjsdfgoeraiwrirteiwertiwrtiertwiwertiewrti");

if($search!=NULL){
    $logger->LogDebug("dfjfdgjagsfjsdgfjsfgjsdfgoeraiwrirteiwertiwrtiertwiwertiewrti");
    $_SESSION["searchresults"]=$search;
    $_SESSION["search"]=$search;

}

foreach ($r as $recipe) {
    $logger->LogDebug("zdjadsfjasdfj afsdjasdfjsadjasdfj");
$logger->LogDebug($r);
//$_SESSION["searchresults"]=$recipe;
}
$p=$_SESSION["searchresults"][0];
//$logger->LogDebug($p);

if( !$_SESSION["access_granted"]){
    if(Null!=$_POST['clicked']){
    $_SESSION['bad'][] = "Must be signed in to add a recipe to your account";
    unset($_POST['clicked']);
    }

    header("Location:Recipes.php");
}else{
    $key= key($_POST['clicked']);
    $logger->LogDebug($key);
    $_SESSION['putIn'] = true;
    $_SESSION['key'][$key+1]=$key+1;
    $link = $_SESSION['recipes'[$key]];
    $recipes= $dao->getRecipe($link);
    $email=$_SESSION['email'];
    $logger->LogDebug($recipes[0][1]);
    $logger->LogDebug($recipes[0][2]);
    $logger->LogDebug($recipes[0][3]);
    $logger->LogDebug($recipes[0][4]);
    $logger->LogDebug($recipes[0][5]);
    $logger->LogDebug($recipes[0][6]);
    $logger->LogDebug($recipes[0][7]);
    $logger->LogDebug($recipes[0][8]);
    $logger->LogDebug($recipes[0][0]);
    $logger->LogDebug($email);
    $logger->LogDebug($link);
    $check=$dao->checkRecipe($email, $link);
    $logger->LogDebug( "fasdjasdfjasdfjjasdfjsdaf");
    $logger->LogDebug($check[0][0]);
    if ($check[0][0]!=null){
        if(Null!=$_POST['clicked']){
        $_SESSION['bad'][] = "Recipe already added";
        }
    }else{
        $_SESSION['good'][] = "Recipe Added Successfully!";
    $dao->saveMyRecipe($email,$recipes[0][1], $recipes[0][2], $recipes[0][3], $recipes[0][4], $recipes[0][5], $recipes[0][6], $recipes[0][7], $recipes[0][8], $recipes[0][0]);
    $logger->LogDebug($recipes[0][0]);
    $logger->LogDebug($link);
    }
    header("Location:Recipes.php");
}

header("Location:Recipes.php");

?>