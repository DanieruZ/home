<!--═════ ADMIN NAVBAR ═════════════════════════-->

<div class="w3-container w3-blue-gray">
  <h4>Admin</h4>
</div>

<div class="w3-bar w3-blue-gray  w3-border-top">
  <div class="w3-dropdown-hover w3-blue-gray">
    <button class="w3-button "><i class="fas fa-user"></i> Users</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-blue-gray">
      <a href="<?php echo FRONT_ROOT; ?>Admin/UserListView" class="w3-bar-item w3-button"><i class="fas fa-users"></i> User List</a>
      <a href="<?php echo FRONT_ROOT; ?>Admin/AddUserView" class="w3-bar-item w3-button"><i class="fas fa-user-plus"></i> Add User</a>
    </div>
  </div>

  <div class="w3-dropdown-hover">
    <button class="w3-button"><i class="fas fa-box"></i> Items</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-blue-gray">
      <a href="<?php echo FRONT_ROOT; ?>Admin/ItemListView" class="w3-bar-item w3-button"><i class="fas fa-box"></i> Item List</a>
      <a href="<?php echo FRONT_ROOT; ?>Admin/AddItemView" class="w3-bar-item w3-button"><i class="fas fa-box"></i><i class="fas fa-plus w3-tiny"></i> Add Item</a>
    </div>
  </div>

  <div class="w3-dropdown-hover">
    <button class="w3-button"><i class="fas fa-shopping-cart"></i> Shoppings</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-blue-gray">
      <a href="<?php echo FRONT_ROOT; ?>Admin/ShoppingListView" class="w3-bar-item w3-button"><i class="fas fa-shopping-cart"></i> Shopping List</a>
    </div>
  </div>

  <div class="w3-dropdown-hover">
    <button class="w3-button"><i class="fas fa-sign-out-alt"></i> Sign Out</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-blue-gray">
      <a href="<?php echo FRONT_ROOT; ?>Admin/Logout" class="w3-bar-item w3-button"><i class="fas fa-sign-out-alt"></i> Confirm Sign Out</a>
    </div>
  </div>
</div>

