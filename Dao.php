<?php require_once "JMartinlogger.php"?>
<?php
class Dao {
/*private $host = "us-cdbr-east-02.cleardb.com"; 
private $db = "heroku_1a53cb3199aef08"; 
private $user = "baed73a328e2e0";
private $pass = "0e337b8e";*/
//public function getConnection () {
//return
//ew PDO("mysql:host={$this->host};dbname={$this->db}"

private $user = 'root';
private $pass = 'root';
private $db = 'sys';
private $host = 'localhost';
private $port = 8889;


public $logger;
public function __construct () {
    $this->logger = new KLogger ("logger.txt" , KLogger::DEBUG);
  }
/*$link = mysqli_init();
$success = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db,
   $port
);*/
public function getConnection () {
    
    try {
    $this->logger->LogDebug("getting a connection");
      $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
      return $conn;
    } catch (Exception $e) {
      //echo print_r($e,1);
      $this->logger->LogFatal("This did it not work: " . print_r($e, 1));
      exit;
    }
  }

  public function getUsers() {
    $conn = $this->getConnection();
    return $conn->query("SELECT userEmail FROM users");
  }

  public function getUser($userEmail,$pass) {
    $conn = $this->getConnection();
    $this->logger->LogDebug("go connection");
    $getQuery = "SELECT * FROM users WHERE userEmail = :userEmail";
    $this->logger->LogDebug(" the connection");
    $q = $conn->prepare($getQuery);
    $q->bindParam(":userEmail", $userEmail);
    //$q->bindParam(":pass", $pass);
    $this->logger->LogDebug(" connection");
    $r= $q->execute();
    $this->logger->LogDebug("success {$r} ");
    return $q->fetchAll();

  }

  public function saveUser ($userEmail , $pass, $glutenAllergy, $lactoseAllergy, $peanutsAllergy, $treeNutsAllergy, $shellFishAllergy, $eggsAllergy, $soyAllergy) {
    $this->logger->LogDebug("got it"); 
    $conn = $this->getConnection();
    $this->logger->LogDebug("got the connection");
    $this->logger->LogDebug("user =[{$userEmail}]");
    $this->logger->LogDebug("password =[{$pass}]");
    $this->logger->LogDebug("gluten =[{$glutenAllergy}]");
    $this->logger->LogDebug("gluten =[{$lactoseAllergy}]");
    $this->logger->LogDebug("gluten =[{$peanutsAllergy}]");
    $this->logger->LogDebug("gluten =[{$treeNutsAllergy}]");
    $this->logger->LogDebug("gluten =[{$shellFishAllergy}]");
    $this->logger->LogDebug("gluten =[{$eggsAllergy}]");
    $this->logger->LogDebug("gluten =[{$soyAllergy}]");
    $saveQuery =
        "INSERT INTO users
        (userEmail , pass, glutenAllergy, lactoseAllergy, peanutsAllergy, treeNutsAllergy, 
        shellFishAllergy, eggsAllergy, soyAllergy)
        VALUES
        (:userEmail , :pass, :glutenAllergy, :lactoseAllergy, :peanutsAllergy, :treeNutsAllergy, :shellFishAllergy, :eggsAllergy, :soyAllergy)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":userEmail", $userEmail);
    $q->bindParam(":pass", $pass);
    $q->bindParam(":glutenAllergy", $glutenAllergy);
    $q->bindParam(":lactoseAllergy", $lactoseAllergy);
    $q->bindParam(":peanutsAllergy", $peanutsAllergy);
    $q->bindParam(":treeNutsAllergy", $treeNutsAllergy);
    $q->bindParam(":shellFishAllergy", $shellFishAllergy);
    $q->bindParam(":eggsAllergy", $eggsAllergy);
    $q->bindParam(":soyAllergy", $soyAllergy);
    return $q->execute();

}
public function getRecipes() {
  $conn = $this->getConnection();
    $getQuery = "SELECT * FROM recipes";
    $q = $conn->prepare($getQuery);
    $q->execute();
    return $q->fetchAll();
  }

  public function getRecipe($link) {
    $conn = $this->getConnection();
    $getQuery = "SELECT link, glutenAllergy, lactoseAllergy, peanutAllergy, treeNutsAllergy, shellFishAllergy, eggsAlllergy, soyAllergy, title FROM recipes WHERE link = :link";
    $q = $conn->prepare($getQuery);
    $q->bindParam(":link", $link);
    $q->execute();
    return $q->fetchAll();
  }
  public function getSavedRecipes() {
    $conn = $this->getConnection();
    return $conn->query("SELECT userEmail FROM savedRecipes");
  }

  public function getSavedRecipe($userEmail) {
    $conn = $this->getConnection();
    $this->logger->LogDebug("user =[{$userEmail}]");
    $getQuery = "SELECT * FROM savedRecipes WHERE userEmail = :userEmail";
    $q = $conn->prepare($getQuery);
    $q->bindParam(":userEmail", $userEmail);
    $q->execute();
    $this->logger->LogDebug("user =");
    $e= $q->fetchAll();
    $this->logger->LogDebug("This did it not work: " . print_r($e, 1));
    return $q->fetchAll();
  }
public function saveRecipe($link, $lactoseAllergy, $peanutsAllergy, $treeNutsAllergy, $shellFishAllergy, $eggsAllergy, $soyAllergy, $title) {
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO recipes
        (link, glutenAllergy, lactoseAllergy, peanutsAllergy, treeNutsAllergy, 
        shellFishAllergy, eggsAllergy, soyAllergy, title)
        VALUES
        (:link, :glutenAllergy, :lactoseAllergy, :peanutsAllergy, :treeNutsAllergy, :shellFishAllergy, :eggsAllergy, :soyAllergy, :title)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":link", $link);
    $q->bindParam(":glutenAllergy", $glutenAllergy);
    $q->bindParam(":lactoseAllergy", $lactoseAllergy);
    $q->bindParam(":peanutsAllergy", $peanutsAllergy);
    $q->bindParam(":treeNutsAllergy", $treeNutsAllergy);
    $q->bindParam(":shellFishAllergy", $shellFishAllergy);
    $q->bindParam(":eggsAllergy", $eggsAllergy);
    $q->bindParam(":soyAllergy", $soyAllergy);
    $q->bindParam(":title", $title);
    $q->execute();
}
public function saveMyRecipe($userEmail, $lactoseAllergy, $peanutsAllergy, $treeNutsAllergy, $shellFishAllergy, $eggsAllergy, $soyAllergy, $title, $link) {
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO savedRecipes
        (userEmail, glutenAllergy, lactoseAllergy, peanutsAllergy, treeNutsAllergy, 
        shellFishAllergy, eggsAllergy, soyAllergy, title, link)
        VALUES
        (:userEmail, :glutenAllergy, :lactoseAllergy, :peanutsAllergy, :treeNutsAllergy, :shellFishAllergy, :eggsAllergy, :soyAllergy, :title, link)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":userEmail", $userEmail);
    $q->bindParam(":glutenAllergy", $glutenAllergy);
    $q->bindParam(":lactoseAllergy", $lactoseAllergy);
    $q->bindParam(":peanutsAllergy", $peanutsAllergy);
    $q->bindParam(":treeNutsAllergy", $treeNutsAllergy);
    $q->bindParam(":shellFishAllergy", $shellFishAllergy);
    $q->bindParam(":eggsAllergy", $eggsAllergy);
    $q->bindParam(":soyAllergy", $soyAllergy);
    $q->bindParam(":title", $title);
    $q->bindParam(":link", $link);
    $q->execute();
}
}
?>