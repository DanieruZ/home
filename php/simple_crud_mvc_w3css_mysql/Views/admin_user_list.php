<!--═════ ADMIN - USER LIST ═════════════════════════-->

<div class="w3-container">
  <h2><i class="fas fa-users"></i> User List</h2>

	<!--═════ FILTERED SEARCH ═════════════════════════-->
	<div class="w3-row">
		<div class="w3-col s3">
			<p>Search for selected filter:</p>
		</div>
		<div class="w3-col s2">
			<select id="filterField" class="w3-select w3-border w3-center w3-round-large w3-blue-gray">
				<option value="0">Firstname</option>
				<option value="1" selected>Lastname </option>
				<option value="2">Email</option>
				<option value="4">User Type</option>
				<option value="5">isActive</option>
			</select>
		</div>
		<input class="w3-input w3-border w3-hover-border-blue-gray w3-padding" type="text" id="Input" onkeyup="filterTable()" placeholder="Search for...">
	</div>

  <!--═════ USER LIST TABLE ═════════════════════════-->
	<table class="w3-table-all" id="Table"> 
		<thead>
			<tr class="w3-blue-gray">
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
				<th>Password</th>
				<th>User Type</th>
				<th>isActive</th>
				<th></th>
			<tr>
		</thead>
		<tbody id="tableBody">  
		<?php 
		  if(isset($userList)) {
				foreach ($userList as $user) { 
		?>			   
					<tr class="w3-hover-pale-yellow">
						<td><?php echo $user->getFirstname(); ?></td>
						<td><?php echo $user->getLastname(); ?></td>
						<td><?php echo $user->getEmail(); ?></td>
						<td><?php echo $user->getUserPass(); ?></td>
						<td><?php echo $user->getUserType(); ?></td>
						<td><?php echo $user->getIsActive() ? 'Yes' : 'No'; ?></td>
						<td class="w3-right">
							<?php 
								$userUrl = FRONT_ROOT . 'Admin/UserProfileView/' . $user->getUserId();
								$updateUrl = FRONT_ROOT . 'Admin/UpdateUserView/' . $user->getUserId();
								$shoppingUrl = FRONT_ROOT . 'Admin/ShoppingUserListView/' . $user->getUserId();
								$deleteUrl = FRONT_ROOT . 'Admin/DeleteUserView/' . $user->getUserId();
							?>
						  <a href="<?php echo $userUrl; ?>" class="w3-btn w3-round-large w3-blue-gray"><i class="fas fa-user"></i></a>
						  <a href="<?php echo $updateUrl; ?>" class="w3-btn w3-round-large w3-blue-gray"><i class="fas fa-user-edit"></i></a>
							<a href="<?php echo $shoppingUrl; ?>" class="w3-btn w3-round-large w3-blue-gray"><i class="fas fa-shopping-cart"></i></a>
							<a href="#" class="w3-btn w3-round-large w3-blue-gray" onclick="openModal('<?php echo $deleteUrl; ?>')"><i class="fas fa-trash"></i></a>
						</td>
					</tr>
		<?php
			  }
			}
		?>			  
	  </tbody>
	</table>
</div>