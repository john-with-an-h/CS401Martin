<?php require_once "headerLogo.html"; ?>
</main>
  <body>
    <article>
      <div class="signupTitle">
        <h1>Please put in your information and food allergies</h1>
      </div>
      <div class="signupUsername">
        <input type="text" placeholder="Username">
      </div>
      <div class="signupPassword">
        <input type="text" placeholder="Password">
        <h2>Please confirm your password</h2>
        <input type="text" placeholder="Password Confirmation">
      </div>
      <div class="signupAllergies">
      <h3>Please click all that apply</h3>
      <input type="checkbox" value="1" id="gluten"/>
        <label for="gluten">Gluten Allergy</label>
        <input type="checkbox" value="1" id="lactose"/>
        <label for="lactose">Lactoce Allergy</label>
        <input type="checkbox" value="1" id="peanuts"/>
        <label for="peanuts">Peanuts Allergy</label>
        <br />
        <input type="checkbox" value="1" id="treenuts"/>
        <label for="treenuts">Tree Nuts Allergy</label>
        <input type="checkbox" value="1" id="shellfish"/>
        <label for="shellfish">Shell Fish Allergy</label>
        <input type="checkbox" value="1" id="eggs"/>
        <label for="eggs">Eggs Allergy</label>
        <input type="checkbox" value="1" id="soy"/>
        <label for="soy">Soy Allergy</label>
      </div>
      <div class="signupButton">
        <button type="signup">Sign Up</button>
      </div>
    </article>
  </body>
<?php require_once "footer.html"; ?>