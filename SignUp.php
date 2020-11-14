<?php require_once "headerLogo.php"; ?>
<?php require_once "JMartinlogger.php"; ?>
<?php
// login.php
$logger = new KLogger ("log.txt" , KLogger::DEBUG);
$_SESSION['bad'] = array();
$_SESSION['good'] = array();
session_start();



?>
</main>
  <body>
    <article>
      <div class="signupTitle">
        <h1>Please put in your information and food allergies</h1>
      </div>
      <?php
    if (isset($_SESSION["status"])) {
      echo "<div id=".$status.">" .  $_SESSION["status"] . "</div>";
      unset($_SESSION["status"]);
    }
    ?>
      <form method="post" action ="SignUpHandler.php">
      <div class="signupUsername">
      <div> <label for="email">Enter your email:</label><input id="email" type ="text" name="signupemail" 
      <?php if (isset($_SESSION['email'])) {
        $san= filter_var($_SESSION["email"],FILTER_SANITIZE_SPECIAL_CHARS);
      echo "value='{$san}'";
  
      }?>
      ></div>
      </div>
      <div class="signupPassword">
      <div> <label for="password">Enter your password: </label><input id="password" type ="password" name="signuppassword"/></div>
      </div>
      <div class="confirmPassword">
    <div> <label for="passwords">Please confirm your password: </label><input id="passwords" type ="password" name="confirmpassword"/></div>
      </div>
   
      <div class="signupAllergies">
      <h3>Please click all that apply</h3>
      <div>  <input type="checkbox" name="gluten" value="Yes"  
      <?php if (isset($_SESSION['gluten'])) {
        
        echo "checked={$_SESSION['gluten']}";
        unset($_SESSION['gluten']);
        }?>
        >Gluten Allergy </input>
     
     
      </div>
      
      <input type="checkbox" name="lactose" value="Yes"
      <?php if (isset($_SESSION['lactose'])) {
        
        echo "checked={$_SESSION['lactose']}";
        unset($_SESSION['lactose']);
        }?>
        >Lactose Allergy</input>
      <input type="checkbox" name="peanuts" value="Yes"
      <?php if (isset($_SESSION['peanuts'])) {
        
        echo "checked={$_SESSION['peanuts']}";
        unset($_SESSION['peanuts']);
        }?>
        >Peanuts Allergy</input>
      <br />
      <input type="checkbox" name="treenuts" value="Yes"
      <?php if (isset($_SESSION['treenuts'])) {
        
        echo "checked={$_SESSION['treenuts']}";
        unset($_SESSION['treenuts']);
        }?>
        >Tree Nuts Allergy</input>
      <input type="checkbox" name="shellfish" value="Yes"
      <?php if (isset($_SESSION['shellfish'])) {
        
        echo "checked={$_SESSION['shellfish']}";
        unset($_SESSION['shellfish']);
        }?>
        >Shell Fish Allergy</input>
      <input type="checkbox" name="eggs" value="Yes"
      <?php if (isset($_SESSION['eggs'])) {
        
        echo "checked={$_SESSION['eggs']}";
        unset($_SESSION['eggs']);
        }?>
        >Eggs Allergy</input>
      <input type="checkbox" name="soy" value="Yes"
      <?php if (isset($_SESSION['soy'])) {
        
        echo "checked={$_SESSION['soy']}";
        unset($_SESSION['soy']);
        }?>
        >Soy Allergy</input>
      </div>
      <div class="signupButton">
      <div> <input type="submit" value="Sign Up"></div>
      </div>
      </form>
      <?php 
      if (isset($_SESSION['bad'])) {
        foreach ($_SESSION['bad'] as $message){
          echo "<div class ='signupMessage'> ($message)</div>";
        }
        $_SESSION['bad'] = array();
      }?>

    </article>
  </body>
<?php require_once "footer.php"; ?>