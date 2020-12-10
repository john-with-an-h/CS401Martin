<?php require_once "headerLogo.php"; ?>
<?php
// login.php
session_start();


?>
</main>
  <body>
    <article>
      <div class="loginTitle">
        <h1>Please Put in your information to log in</h1>
       
        <?php
    if (isset($_SESSION["status"])) {
      echo "<div class='message'>";
      foreach ($_SESSION["status"] as $message){
        //echo "<div class ='signupMessage'> ($message)</div>";
        //echo " <span class='closebtn' onclick='this.parentElement.style.display='none';' $_SESSION['status'] >&times";
        echo "<div class='bad'>{$message}<span class='fadeout'> X </span></div>";
      
      }
      echo "</div>";
      //echo " <script> $('#warning').delay(50).fadeOut();</script> ";
      unset($_SESSION["status"]);
    }
    ?>
    

    <form method="post" action ="loginHandler.php">
      <div class="loginUsername">
      <div> <label for="email">Enter your email:</label><input id="email" type ="text" name="email"
      <?php if (isset($_SESSION['bad'])) {
        $san= filter_var($_SESSION["email"],FILTER_SANITIZE_SPECIAL_CHARS);
      echo "value='{$san}'";
      }?> /></div>
      </div>
      <div class="loginPassword">
      <div> <label for="password">Enter your password:</label><input id="password" type ="password" name="password"/></div>
    </div>
      <div class="loginButton">
      <div> <input type="submit" value="Login"></div>
      </div>
      </form>
      <?php 
      if (isset($_SESSION['bad'])) {
        foreach ($_SESSION['bad'] as $message){
          echo "<div class ='signupMessage'> ($message)</div>";
         // echo " <span class='closebtn' onclick='this.parentElement.style.display='none';'($message)>&times";
        }
        $_SESSION['bad'] = array();
      }?>
    </article>
  </body>
<?php require_once "footer.php"; ?>
