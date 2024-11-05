<!--═════ ADMIN - USER PROFILE ═════════════════════════-->

<div class="w3-container w3-center">    
  <div class="w3-container w3-card-4 w3-round-large w3-blue-gray w3-margin-top" style="max-width: 400px; margin: auto; text-align: center;">
    <h2>Profile</h2>
    <img src="<?php echo IMAGES_PATH ?>img_avatar3.png" alt="Profile Image" class="w3-circle" style="width: 200px; height: 200px; margin: 20px auto;">  
    <ul class="w3-ul">
      <li class="w3-padding"><strong>Firstname: </strong><?php echo $user->getFirstname(); ?></li>
      <li class="w3-padding"><strong>Lastname: </strong><?php echo $user->getLastname(); ?></li>
      <li class="w3-padding"><strong>Email: </strong><?php echo $user->getEmail(); ?></li>
      <li class="w3-padding"><strong>Password: </strong><?php echo $user->getUserPass(); ?></li>
      <li class="w3-padding"><strong>User Type: </strong><?php echo $user->getUserType(); ?></li>
      <li class="w3-padding"><strong>isActive: </strong><?php echo $user->getIsActive() ? 'Yes' : 'No'; ?></li>
    </ul>
  </div>
  <a class="w3-container w3-margin w3-center" href="<?php echo FRONT_ROOT ?>Admin/UserListView">Go back</a>
</div>