<!-- Admin - User Profile -->

<div class="container text-center">    
  <div class="card mx-auto mt-4 bg-info" style="width: 50%;">
    <div class="card-body">
      <h2 class="card-title text-white">Profile</h2>
      
      <img src="<?php echo IMAGES_PATH ?>img_avatar3.png" alt="Profile Image" class="rounded-circle" style="width: 200px; height: 200px; margin: 20px auto;">  
      
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Firstname: </strong><?php echo $user->getFirstname(); ?></li>
        <li class="list-group-item"><strong>Lastname: </strong><?php echo $user->getLastname(); ?></li>
        <li class="list-group-item"><strong>Email: </strong><?php echo $user->getEmail(); ?></li>
        <li class="list-group-item"><strong>Password: </strong><?php echo $user->getUserPass(); ?></li>
        <li class="list-group-item"><strong>User Type: </strong><?php echo $user->getUserType(); ?></li>
        <li class="list-group-item"><strong>isActive: </strong><?php echo $user->getIsActive() ? 'Yes' : 'No'; ?></li>
      </ul>
    </div>
  </div>
  <a class="btn btn-link mt-3" href="?controller=Admin&action=UserListView">Go back</a>
</div>