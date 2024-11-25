<!-- Sign Up Form -->

<div class="container mt-5">
  <div class="card mx-auto" style="max-width: 500px;">
    <div class="card-header bg-brown text-white">
      <h2><i class="fas fa-user-plus"></i> Sign Up</h2>
    </div>
    
    <form action="?controller=Customer&action=SignUp" method="POST" class="p-4">
      <div class="form-group">
        <label for="firstname"><b>Firstname</b></label>
        <input class="form-control" name="firstname" type="text" required>
      </div> 
      <div class="form-group">
        <label for="lastname"><b>Lastname</b></label>
        <input class="form-control" name="lastname" type="text" required>
      </div> 
      <div class="form-group">
        <label for="email"><b>Email</b></label>
        <input class="form-control" name="email" type="email" required>
      </div> 
      <div class="form-group">
        <label for="userPass"><b>Password</b></label>
        <input class="form-control" name="userPass" type="password" placeholder="Leave blank to keep current password (123).">
      </div>    
      <div class="form-group text-center">
        <button class="btn btn-brown btn-block">Send</button>
      </div>
      <div class="text-right">
        <a href="<?php echo FRONT_ROOT ?>index.php" class="btn btn-link">Back to main</a>
      </div>
    </form>
  </div>
</div>