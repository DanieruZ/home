<!-- Login Form -->

<div class="content d-flex align-items-center justify-content-center height-100">
  <header class="text-center">
    <h2>Sign In</h2>
  </header>
  <form action="<?php echo '?controller=Home&action=SignIn'; ?>"  method="POST" class="login-form bg-dark-alpha p-5 bg-light">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Input your email" required>
    </div>
    <div class="form-group">
      <label for="userPass">Password</label>
      <input type="userPass" id="userPass" name="userPass" class="form-control form-control-lg" placeholder="Input your password" required>
    </div>
    <button class="btn btn-dark btn-block btn-lg" type="submit">Sign In</button>
    <a href="index.php?controller=Customer&action=SignUp">Sign Up</a> 
  </form>
</div>