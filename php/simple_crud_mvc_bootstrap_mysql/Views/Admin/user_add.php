<!-- Admin - New User Form-->

<div class="card mx-auto my-5" style="width: 50%;">
  <div class="card-header bg-info text-white">
    <h2><i class="fas fa-user-edit"></i> New User</h2>
  </div>
  
  <form class="card-body" action="?controller=Admin&action=AddUser" method="POST">
    <div class="form-group">
      <label for="firstname"><b>Firstname</b></label>
      <input class="form-control" name="firstname" type="text" required>
    </div> 
    <div class="form-group">
      <label for="lastname"><b>Lastname</b></label>
      <input class="form-control" name="lastname" type="text" required>
    </div> 
    <div class="form-group">
      <label for="email"><b>Email</b></label>
      <input class="form-control" name="email" type="email" required>
    </div> 
    <div class="form-group">
      <label for="userPass"><b>Password</b></label>
      <input class="form-control" name="userPass" type="password">
    </div>     
    <div class="form-group">
      <label for="userType"><b>User Type</b></label>
      <select class="form-control" name="userType" required>
        <option value="admin">Admin</option>
        <option value="customer" selected>Customer</option>
      </select>
    </div>   
    <div class="form-group">
      <label for="isActive"><b>Is Active</b></label>
      <select class="form-control" name="isActive" required>
        <option value="1" selected>Yes</option>
        <option value="0">No</option>
      </select>
    </div>   
    <button type="submit" class="btn btn-info btn-block">Add</button>
    <a class="btn btn-link float-right" href="?controller=Admin&action=UserListView">Go back</a>
  </form>
</div>