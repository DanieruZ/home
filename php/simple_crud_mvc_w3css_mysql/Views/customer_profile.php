<!--═════ CUSTOMER - PROFILE ═════════════════════════-->

<div class="w3-container w3-center">    
  <div class="w3-container w3-card-4 w3-center w3-round-large w3-black w3-margin-top" style="max-width: 400px; margin: auto;">
    <h2>My Profile</h2>

    <img src="<?php echo IMAGES_PATH ?>img_avatar3.png" alt="Profile Image" class="w3-circle" style="width: 200px; height: 200px; margin: 20px auto;">  
    
    <ul class="w3-ul">
      <li class="w3-padding"><strong>Firstname: </strong><?php echo $user->getFirstname(); ?></li>
      <li class="w3-padding"><strong>Lastname: </strong><?php echo $user->getLastname(); ?></li>
      <li class="w3-padding"><strong>Email: </strong><?php echo $user->getEmail(); ?></li>
      <li class="w3-padding"><strong>Password: </strong><?php echo $user->getUserPass(); ?></li>      
    </ul>
  </div>
    <a class="w3-container w3-center" href="<?php echo FRONT_ROOT ?>Customer/ItemListView">Go back</a>
</div>
