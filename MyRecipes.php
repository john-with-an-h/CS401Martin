<?php require_once "headerLogo.php"; ?>
<?php require_once "Dao.php"?>
<?php require_once "JMartinlogger.php"?>

<?php
session_start();
$dao = new Dao();
$userEmail=$_SESSION['email'];
$logger = new KLogger ("logger.txt" , KLogger::DEBUG);
if (isset($_SESSION["mysearchresults"])){
  $logger->LogDebug($_SESSION["searchresults"]);
  $name=$_SESSION["mysearchresults"];
  $logger->LogDebug($name);
  $logger->LogDebug("fsdjdsfgjsdfgjsdfgkjqwerii xcndvxmfgmxcbmxcbvm");
  $recipes=$dao->searchSavedRecipes($name, $userEmail);
  //$recipes=$dao->searchRecipes($name);
  $logger->LogDebug(sizeof($recipes));
  $logger->LogDebug(" this actually did something");
  unset($_SESSION["mysearchresults"]);
}else{
  $recipes= $dao->getSavedRecipe($userEmail);
}

?>

  <body>
    <article>
      <div class="myrecipesTitle">
        <h1>The selected recipes</h1>
      </div>
      <?php 

      if ($_SESSION["access_granted"]) {
        
          echo "<div class ='signedInMessage'> ". "You are currently logged in". "</div>";
      }
    ?>
  <form method="post" action ="MyRecipesHandler.php">
  <div class="recipeSearcher">
      <input id="recipeSearch" type ="text" placeholder="Search.." name="myrecipeSearch" 
      <?php 
      //$logger->LogDebug( $_SESSION["search"]);
      $s=$_SESSION["mysearch"];
      $san= filter_var($s,FILTER_SANITIZE_SPECIAL_CHARS);
      echo "value='{$san}'";
      unset($_SESSION["mysearch"]);
      ?>
      />
      <input type="submit"  value="Search"/>
      </div>
      </form>
      <form method="post" action ="MyRecipesHandler.php">
      <div class="resultsTable">
      <table id="results">
      <?php
      //if(isset($_SESSION['putIn'])){
      echo "<tr>";
      //echo "<th>" . "  " . "</th>";
      echo "<th>" . "Title  " . "</th>";
      echo "<th>" . "Gluten   " . "</th>";
      echo "<th>" . "Lactose  " . "</th>";
      echo "<th>" . "Peanuts  " . "</th>";
      echo "<th>" . "Tree Nuts  " . "</th>";
      echo "<th>" . "Shellfish " . "</th>";
      echo "<th>" . "Eggs   " . "</th>";
      echo "<th>" . "Soy  " . "</th>";
      echo "<th>" . "Link   " . "</th>";
      echo "</tr>";
      echo "<tr>";
      $i = 0;
      foreach ($recipes as $recipe) {
        $_SESSION['putIn'] = true;
        $_SESSION['removed'[$i]]= $recipe[0];
    //echo "<td>".'<input type="submit" name="clicked['.$i.']" value="Remove" />'."</td>";
    echo "<td>" . $recipe[8] . "</td>";
   if($recipe[1] ==1){
    $recipe[1]="yes";
   }else{
    $recipe[1]="no";
   }
    echo "<td>" . $recipe[1] .   "</td>" ;
  
    if($recipe[2] ==1){
      $recipe[2]="yes";
     }else{
      $recipe[2]="no";
     }
    echo "<td>" . $recipe[2] . "</td>";
    if($recipe[3] ==1){
      $recipe[3]="yes";
     }else{
      $recipe[3]="no";
     }
    echo"<td>" . $recipe[3] . "</td>";
    if($recipe[4] ==1){
      $recipe[4]="yes";
     }else{
      $recipe[4]="no";
     }
    echo "<td>" . $recipe[4] . "</td>";
    if($recipe[5] ==1){
      $recipe[5]="yes";
     }else{
      $recipe[5]="no";
     }
    echo "<td>" . $recipe[5] . "</td>";
    if($recipe[6] ==1){
      $recipe[6]="yes";
     }else{
      $recipe[6]="no";
     }
    echo "<td>" . $recipe[6] . "</td>";
    if($recipe[7] ==1){
      $recipe[7]="yes";
     }else{
      $recipe[7]="no";
     }
    echo "<td>" . $recipe[7] . "</td>";
    echo "<td>" . $recipe[9] . "</td>";
    echo "</tr>";
  $i=$i+1;
}
//}

?>

 </form>
 </table>
 </div>

<?php 

      if (isset($_SESSION['bad'])) {
        foreach ($_SESSION['bad'] as $message){
          echo "<div class ='myrecipe'> ". $message. "</div>";
        }
        $_SESSION['bad'] = array();
      }
    ?>
    </article>
  </body>
<?php require_once "footer.php"; ?>
