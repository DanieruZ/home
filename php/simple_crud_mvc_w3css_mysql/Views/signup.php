<!--═════ SIGN UP FORM ═════════════════════════-->

<div class="w3-container w3-padding-24 w3-brown">
  <h2>Welcome</h2>
</div>

<div class="w3-card-4 w3-display-middle w3-half w3-round-large">
  <div class="w3-container w3-brown">
    <h2><i class="fas fa-user-plus"></i> Sign Up</h2>
  </div>
  
  <form class="w3-container" action="<?php echo FRONT_ROOT; ?>Customer/SignUp" method="POST">
    <p>      
      <label for="firstname"><b>Firstname</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="firstname" type="text" required>
    </p> 
    <p>      
      <label for="lastname"><b>Lastname</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="lastname" type="text" required>
    </p> 
    <p>      
      <label for="email"><b>Email</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="email" type="email" required>
    </p> 
    <p>      
      <label for="userPass"><b>Password</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="userPass" type="password" placeholder="Leave blank to keep current password (123).">
    </p>    
    <p>  
      <button class="w3-btn w3-brown w3-round-large">Send</button>
      <a class="w3-display-bottomright w3-margin w3-right" href="<?php echo FRONT_ROOT ?>index.php">Back to main</a>
    </p>
  </form>
</div>
