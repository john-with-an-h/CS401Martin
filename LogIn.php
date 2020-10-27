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
      echo "<div id=".$status.">" .  $_SESSION["status"] . "</div>";
      unset($_SESSION["status"]);
    }
    ?>
      <form method="post" action ="loginHandler.php">
      <div class="loginUsername">
      <div> <label for="username/email">Enter your email:</label><input id="email" type ="text" name="email"
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
        }
        $_SESSION['bad'] = array();
      }?>
    </article>
  </body>
<?php require_once "footer.php"; ?>
