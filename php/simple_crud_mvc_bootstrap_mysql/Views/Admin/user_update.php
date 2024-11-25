<!-- Admin - Update User Form-->

<div class="card mx-auto my-5" style="width: 50%;">
  <div class="card-header bg-info text-white">
    <h2><i class="fas fa-user-edit"></i> Update User</h2>
  </div>
  
  <form class="card-body" action="?controller=Admin&action=UpdateUser" method="POST">
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
    
    <div class="form-group">
      <label for="userType"><b>User Type</b></label>
      <select class="form-control" name="userType" required>
        <option value="admin" <?php echo $user->getUserType() == 'admin' ? 'selected' : ''; ?>>Admin</option>
        <option value="customer" <?php echo $user->getUserType() == 'customer' ? 'selected' : ''; ?>>Customer</option>
      </select>
    </div>
    
    <div class="form-group">
      <label for="isActive"><b>Is Active</b></label>
      <select class="form-control" name="isActive" required>
        <option value="1" <?php echo $user->getIsActive() ? 'selected' : ''; ?>>Yes</option>
        <option value="0" <?php echo !$user->getIsActive() ? 'selected' : ''; ?>>No</option>
      </select>
    </div>
    
    <button type="submit" class="btn btn-info btn-block">Update</button>
    <a class="btn btn-link float-right mt-2" href="?controller=Admin&action=UserListView">Go back</a>
  </form>
</div>