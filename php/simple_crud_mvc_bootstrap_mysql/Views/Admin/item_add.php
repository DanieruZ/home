<!-- Admin - New Item Form -->

<div class="card mx-auto my-5" style="width: 50%;">
  <div class="card-header bg-info text-white">
    <h2><i class="fas fa-box"></i><i class="fas fa-plus"></i> New Item</h2>
  </div>

  <form class="card-body" action="?controller=Admin&action=AddItem" method="POST">
    <div class="form-group">
      <label for="itemName"><b>Name</b></label>
      <input class="form-control" name="itemName" type="text" required>
    </div>  
    <div class="form-group">      
      <label for="brand"><b>Brand</b></label>
      <input class="form-control" name="brand" type="text" required>
    </div> 
    <div class="form-group">      
      <label for="model"><b>Model</b></label>
      <input class="form-control" name="model" type="text" required>
    </div> 
    <div class="form-group">      
      <label for="stock"><b>Stock</b></label>
      <input class="form-control" name="stock" type="text">
    </div>   
    <div class="form-group">  
      <label for="price"><b>Price</b></label>
      <input class="form-control" name="price" type="text" required>
    </div>     
    <div class="form-group">
      <label for="isActive"><b>isActive</b></label>
      <select class="form-control" name="isActive" required>
        <option value="1" selected>Yes</option>
        <option value="0">No</option>
      </select>
    </div>    
    <button type="submit" class="btn btn-info btn-block">Add</button>
    <a class="btn btn-link float-right mt-2" href="?controller=Admin&action=ItemListView">Go back</a> 
  </form>
</div>