<?php
session_start();
$_SESSION["access_granted"]=false;
session_destroy();
header("Location:index.php");
exit();

?>