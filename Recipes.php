<?php require_once "headerLogo.php"; ?>
<?php require_once "Dao.php"?>
<?php
session_start();
$dao = new Dao();
$recipes= $dao->getRecipes();
?>

  </main>
  <body>
    <article>
      <div class="RTitle">
        <h2>Recipes</h2>
      </div>
      <div class="Search">
        <input type="text" placeholder="Search..">
        <button type="search">Search</button>
      </div>
      <form method="post" action ="RecipesHandler.php">
      <table id="results">
      <?php 
      echo "<tr>";
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
      foreach ($recipes as $recipe) {
        $_SESSION['recipes']= $recipe;
        $s = '$recipe[8]';
        $r ="submit[$s]";
    echo "<td>". " <input type='submit' name='submit[$s]' value='Add'>" . $recipe[8] . "</td>";
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
}

?>

 </form>
</table>
<?php 

      if (isset($_SESSION['bad'])) {
        foreach ($_SESSION['bad'] as $message){
          echo "<div class ='signupMessage'> ($message)</div>";
        }
        $_SESSION['bad'] = array();
      }
    ?>

    </article>
  </body>
</main>
<?php require_once "footer.php"; ?>