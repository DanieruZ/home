<!-- Customer - Update Profile Form -->

<div class="card mx-auto my-5" style="width: 50%;">
  <div class="card-header bg-dark text-white">
    <h2><i class="fas fa-user-edit"></i> Update Profile</h2>
  </div>
  
  <form class="card-body" action="?controller=Customer&action=UpdateProfile" method="POST">
    <input type="hidden" name="userId" value="<?php echo $user->getUserId(); ?>">
    
    <div class="form-group">
      <label for="firstname"><b>Firstname</b></label>
      <input class="form-control" name="firstname" type="text" value="<?php echo $user->getFirstname(); ?>" required>
    </div>
    
    <div class="form-group">
      <label for="lastname"><b>Lastname</b></label>
      <input class="form-control" name="lastname" type="text" value="<?php echo $user->getLastname(); ?>" required>
    </div>
    
    <div class="form-group">
      <label for="email"><b>Email</b></label>
      <input class="form-control" name="email" type="email" value="<?php echo $user->getEmail(); ?>" required>
    </div>
    
    <div class="form-group">
      <label for="userPass"><b>Password</b></label>
      <input class="form-control" name="userPass" type="password" placeholder="Leave blank to keep current password.">
    </div>
    
    <button type="submit" class="btn btn-dark btn-block">Update</button>
    <a class="btn btn-link float-right mt-2" href="?controller=Customer&action=ItemListView">Go back</a>
  </form>
</div>