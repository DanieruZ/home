<!--═════ ADMIN - UPDATE USER FORM ═════════════════════════-->

<div class="w3-card-4 w3-display-middle w3-half w3-round-large">
  <div class="w3-container w3-blue-grey">
    <h2><i class="fas fa-user-edit"></i> Update User</h2>
  </div>
  
  <form class="w3-container" action="<?php echo FRONT_ROOT; ?>Admin/UpdateUser" method="POST">
      <input type="hidden" name="userId" value="<?php echo $user->getUserId(); ?>">
    <p>      
      <label for="firstname"><b>Firstname</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="firstname" type="text" value="<?php echo $user->getFirstname(); ?>">
    </p>
    <p>      
      <label for="lastname"><b>Lastname</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="lastname" type="text" value="<?php echo $user->getLastname(); ?>">
    </p>
    <p>      
      <label for="email"><b>Email</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="email" type="email" value="<?php echo $user->getEmail(); ?>">
    </p>
    <p>      
      <label for="userPass"><b>Password</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="userPass" type="password" placeholder="Leave blank to keep current password.">
    </p>
    <p>
      <label for="userType"><b>User Type</b></label>
      <select class="w3-input w3-border w3-light-gray w3-round-large" name="userType" required>
        <option value="admin">Admin</option>
        <option value="customer" selected>Customer</option>
      </select>
    </p>
    <p>
      <label for="isActive"><b>isActive</b></label>
      <select class="w3-input w3-border w3-light-gray w3-round-large" name="isActive" required>
        <option value="1" selected>Yes</option>
        <option value="0">No</option>
      </select>
    </p> 
    <p>     
      <button type="submit" class="w3-btn w3-blue-gray w3-round-large">Update</button>
      <a class="w3-display-bottomright w3-margin w3-right" href="<?php echo FRONT_ROOT ?>Admin/UserListView">Go back</a>
    </p>
  </form>
</div>