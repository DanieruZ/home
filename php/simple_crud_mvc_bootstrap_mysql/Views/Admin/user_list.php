<!-- Admin - User List -->

<div class="container-fluid">
  <h2 class="mx-auto my-4"><i class="fas fa-users"></i> User List</h2>

  <!-- Filtered Search -->
  <div class="row mb-3">
    <div class="col-md-3">
      <p>Search for selected filter:</p>
    </div>
    <div class="col-md-3">
      <select id="filterField" class="form-control">
        <option value="0">Firstname</option>
        <option value="1" selected>Lastname</option>
        <option value="2">Email</option>
        <option value="4">User Type</option>
        <option value="5">isActive</option>
      </select>
    </div>
    <div class="col-md-6">
      <input class="form-control" type="text" id="Input" onkeyup="filterTable()" placeholder="Search for...">
    </div>
  </div>
	
		<!-- User Table -->
		<table class="table table-sm table-striped table-bordered" id="Table"> 
			<thead class="bg-info text-white">
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Email</th>
					<th>Password</th>
        <th>User Type</th>
        <th>isActive</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="tableBody">  
      <?php 
        if (isset($userList)) {
          foreach ($userList as $user) { 
      ?>               
        <tr>
          <td><?php echo $user->getFirstname(); ?></td>
          <td><?php echo $user->getLastname(); ?></td>
          <td><?php echo $user->getEmail(); ?></td>
          <td><?php echo $user->getUserPass(); ?></td>
          <td><?php echo $user->getUserType(); ?></td>
          <td><?php echo $user->getIsActive() ? 'Yes' : 'No'; ?></td>
          <td class="text-center">
            <?php 
              $userUrl = '?controller=Admin&action=UserProfileView&userId=' . $user->getUserId();
              $updateUrl = '?controller=Admin&action=UpdateUserView&userId=' . $user->getUserId();
              $shoppingUrl = '?controller=Admin&action=ShoppingUserListView&userId=' . $user->getUserId();
              $deleteUrl = '?controller=Admin&action=DeleteUserView&userId=' . $user->getUserId();
            ?>
            <a href="<?php echo $userUrl; ?>" class="btn btn-info btn-sm"><i class="fas fa-user"></i></a>
            <a href="<?php echo $updateUrl; ?>" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></a>
            <a href="<?php echo $shoppingUrl; ?>" class="btn btn-success btn-sm"><i class="fas fa-shopping-cart"></i></a>
            <a href="#" class="btn btn-danger btn-sm" onclick="openModal('<?php echo $deleteUrl; ?>');"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      <?php
          }
        }
      ?>              
    </tbody>
  </table>
</div>