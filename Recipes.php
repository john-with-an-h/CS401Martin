<?php require_once "headerLogo.php"; ?>
<?php require_once "Dao.php"?>
<?php
session_start();
$logger = new KLogger ("logger.txt" , KLogger::DEBUG);
$dao = new Dao();
if (isset($_SESSION["searchresults"])){
  $logger->LogDebug($_SESSION["searchresults"]);
  $name=$_SESSION["searchresults"];
  $logger->LogDebug($name);
  $logger->LogDebug("fsdjdsfgjsdfgjsdfgkjqwerii xcndvxmfgmxcbmxcbvm");
  $recipes=$dao->searchRecipes($name);
  $logger->LogDebug(" this actually did something");
  unset($_SESSION["searchresults"]);
}else{
  $recipes= $dao->getRecipes();
}
///$recipes=$dao->searchRecipes("gluten");
?>

  </main>
  <body>
    <article>
      <div class="RTitle">
        <h2>Recipes</h2>
      </div>
      <?php 

      if (isset($_SESSION['bad'])) {
        foreach ($_SESSION['bad'] as $message){
          echo "<div class='bad'>{$message}<span class='fadeout'> X </span></div>";
        }
       
      }
      if (isset($_SESSION['good'])) {
        foreach ($_SESSION['good'] as $message){
          echo "<div class='good'>{$message}<span class='fadeout'> X </span></div>";
        }
       
      }
      unset($_SESSION["good"]);
      unset($_SESSION["bad"]);
      $_SESSION['bad'] = array();
    ?>
      <form method="post" action ="RecipesHandler.php">

      <div class="recipeSearcher">
      <input id="recipeSearch" type ="text" placeholder="Search.." name="recipeSearch" 
      <?php 
      $logger->LogDebug( $_SESSION["search"]);
      $s=$_SESSION["search"];
      $san= filter_var($s,FILTER_SANITIZE_SPECIAL_CHARS);
      echo "value='{$san}'";
      unset($_SESSION["search"]);
      ?>
      />
      <input type="submit"  value="Search"/>
      </div>
      </form>
      <form method="post" action ="RecipesHandler.php">
      <div class="resultsTable">
      <table id="results">
      <?php 
      echo "<tr>";
      echo "<th>" . "  " . "</th>";
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
        
        $_SESSION['recipes'[$i]]= $recipe[0];
        //$s = '$recipe[8]';
        //$r ="submit[$s]";
    
      echo "<td>".'<input type="submit" name="clicked['.$i.']" value="Add" />'."</td>";
    //echo "<td>". " <input type='submit' name='submit[$s]' value='Add'>"."</td>";
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
    echo "<td>" . $recipe[0] . "</td>";
    echo "</tr>";
  $i=$i+1;
}

?>

 </form>
</table>
</div>


    </article>
  </body>
</main>
<?php require_once "footer.php"; ?>