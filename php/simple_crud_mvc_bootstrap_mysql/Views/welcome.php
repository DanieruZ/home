<!-- Welcome Page -->

<div class="container-fluid bg-brown text-white py-4">
  <h2>STORE ONLINE</h2>
</div>

<div class="container-fluid py-4">

  <div class="row">

    <!-- Filtered Search -->
    <div class="col-md-3">
      <p>Search for selected filter:</p>
    </div>
    <div class="col-md-2">
      <select id="filterField" class="form-control">
        <option value="0" selected>Name</option>
        <option value="1">Brand</option>
        <option value="2">Model</option>
      </select>
    </div>

    <!-- Columns Button -->
    <div class="col-md-7 text-right">
      <!-- Sign In Button -->
      <button type="button" class="btn btn-brown rounded" data-toggle="modal" data-target="#modalLogin">
        <i class="fas fa-sign-in-alt"></i> Sign In
      </button>
      
      <!-- Sign Up Button -->
      <?php $signupUrl = '?controller=Customer&action=SignUpView'; ?>
      <a href="<?php echo $signupUrl; ?>" class="btn btn-brown rounded ml-2">
        <i class="fas fa-user-plus"></i> Sign Up
      </a>  
    </div>
  </div>

  <!-- Login Modal -->
  <div id="modalLogin" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-brown text-white">
          <h5 class="modal-title">Sign In</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <img src="<?php echo IMAGES_PATH ?>img_avatar3.png" alt="Avatar" style="width:30%" class="rounded-circle mb-3">
          <!-- Login Form -->
          <form action="?controller=Home&action=SignIn" method="POST">
            <div class="form-group">
              <label for="email"><b>Email</b></label>
              <input class="form-control" type="email" placeholder="Enter your email." name="email" required>
            </div>
            <div class="form-group">
              <label for="userPass"><b>Password</b></label>
              <input class="form-control" type="password" placeholder="Enter your password." name="userPass" required>
            </div>
            <!-- Sign In Button -->
            <button class="btn btn-brown btn-block" type="submit">Sign In</button>
          </form>
        </div>
        <div class="modal-footer">
          <!-- Close Button -->
          <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
          <!-- Sign Up Button -->
          <p class="ml-2">Don't have an account?</p>
          <?php $signupUrl = '?controller=Customer&action=SignUpView'; ?>
          <a href="<?php echo $signupUrl; ?>" class="btn btn-brown">
            <i class="fas fa-user-plus"></i> Sign Up
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Search Input -->
  <input class="form-control mb-3 mt-3" type="text" id="Input" onkeyup="filterTable()" placeholder="Search for...">
  
  <!-- Item Table -->
  <table class="table table-sm table-bordered" id="Table"> 
    <thead class="bg-brown text-white">
      <tr>
        <th>Name</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Stock</th>
        <th>Price</th>
        <th>Buy</th>
      </tr>
    </thead>
    <tbody id="tableBody">  
      <?php 
        if(isset($itemList)) {
          foreach ($itemList as $item) { 
            if($item->getIsActive()) {
      ?>			   
              <tr class="table-hover">
                <td><?php echo $item->getItemName(); ?></td>
                <td><?php echo $item->getBrand(); ?></td>
                <td><?php echo $item->getModel(); ?></td>
                <td>
                <span class="badge badge-warning">Registered</span>
                </td>
                <td>
                  <span class="badge badge-warning">Registered</span>
                </td>
                <td>
                  <span class="badge badge-warning">Registered</span>
                </td>
              </tr>
      <?php
            }
          }
        }  
      ?>	  
    </tbody>
  </table>
</div>

</body>
</html>