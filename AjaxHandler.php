<?php
  // handlerAjax.php file
  require_once "Dao.php";

  $dao = new Dao();
  $dao->saveComment($_POST['comment'], $_POST['email']);
?>