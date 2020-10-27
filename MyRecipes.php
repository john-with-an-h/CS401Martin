<?php require_once "headerLogo.php"; ?>
<?php require_once "Dao.php"?>
<?php
session_start();
$dao = new Dao();
$userEmail=$_SESSION['email'];
$recipes= $dao->getSavedRecipe($userEmail)
?>

  <body>
    <article>
      <div class="myrecipesTitle">
        <h1>All of the recipes that you have selected</h1>
      </div>
      <?php 

      if ($_SESSION["access_granted"]) {
        
          echo "<div class ='signedInMessage'> ". "You are currently logged in". "</div>";
      }
    ?>
  <form method="post" action ="MyRecipesHandler.php">
  <div class="myrecipesSearch">
    <input type="text" placeholder="Search..">
  </div>

  
      <table id="results">
      <?php 
      echo "<tr>";
      foreach ($recipes as $recipe) {

  
   echo "<td>" . $recipe[7] .   "</td>" ;
   echo "<td>" . $recipe[8] .   "</td>" ;
    echo "<td>" . $recipe[1] .   "</td>" ;
    echo "<td>" . $recipe[2] . "</td>";
    echo"<td>" . $recipe[3] . "</td>";
    echo "<td>" . $recipe[4] . "</td>";
    echo "<td>" . $recipe[5] . "</td>";
    echo "<td>" . $recipe[6] . "</td>";
    echo "<td>" . $recipe[0] . "</td>";
    echo "</tr>";
}

?>

 </form>
 </table>

<?php 

      if (isset($_SESSION['bad'])) {
        foreach ($_SESSION['bad'] as $message){
          echo "<div class ='signupMessage'> ". $message. "</div>";
        }
        $_SESSION['bad'] = array();
      }
    ?>
    </article>
  </body>
<?php require_once "footer.php"; ?>
