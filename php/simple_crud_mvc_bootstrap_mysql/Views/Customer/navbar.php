<!-- Customer Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-1">
  <div class="navbar-brand">Customer</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="?controller=Customer&action=ItemListView"><i class="fas fa-box"></i> Item List</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> My Profile
        </a>
        <div class="dropdown-menu" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="?controller=Customer&action=ProfileView"><i class="fas fa-user"></i> Profile</a>
          <a class="dropdown-item" href="?controller=Customer&action=UpdateProfileView"><i class="fas fa-user-edit"></i> Update Profile</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?controller=Customer&action=ShoppingListView"><i class="fas fa-shopping-cart"></i> My Shopping</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="signOutDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-sign-out-alt"></i> Sign Out
        </a>
        <div class="dropdown-menu" aria-labelledby="signOutDropdown">
          <a class="dropdown-item" href="?controller=Customer&action=Logout"><i class="fas fa-sign-out-alt"></i> Confirm Sign Out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>