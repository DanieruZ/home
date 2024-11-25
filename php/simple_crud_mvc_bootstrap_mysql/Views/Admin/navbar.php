<!-- Admin Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <div class="navbar-brand">Admin</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="adminNavbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> Users
        </a>
        <div class="dropdown-menu" aria-labelledby="usersDropdown">
          <a class="dropdown-item" href="?controller=Admin&action=UserListView"><i class="fas fa-users"></i> User List</a>
          <a class="dropdown-item" href="?controller=Admin&action=AddUserView"><i class="fas fa-user-plus"></i> Add User</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="itemsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-box"></i> Items
        </a>
        <div class="dropdown-menu" aria-labelledby="itemsDropdown">
          <a class="dropdown-item" href="?controller=Admin&action=ItemListView"><i class="fas fa-box"></i> Item List</a>
          <a class="dropdown-item" href="?controller=Admin&action=AddItemView"><i class="fas fa-box"></i> <i class="fas fa-plus w3-tiny"></i> Add Item</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="shoppingsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-shopping-cart"></i> Shoppings
        </a>
        <div class="dropdown-menu" aria-labelledby="shoppingsDropdown">
          <a class="dropdown-item" href="?controller=Admin&action=ShoppingListView"><i class="fas fa-shopping-cart"></i> Shopping List</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="signOutDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-sign-out-alt"></i> Sign Out
        </a>
        <div class="dropdown-menu" aria-labelledby="signOutDropdown">
          <a class="dropdown-item" href="?controller=Admin&action=Logout"><i class="fas fa-sign-out-alt"></i> Confirm Sign Out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>