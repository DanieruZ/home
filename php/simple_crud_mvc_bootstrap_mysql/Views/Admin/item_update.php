<!-- Admin - Update Item Form -->

<div class="card mx-auto my-5" style="width: 50%;">
  <div class="card-header bg-info text-white">
    <h2><i class="fas fa-box"></i><i class="fas fa-edit"></i> Update Item</h2>
  </div>
  
  <form class="card-body" action="?controller=Admin&action=UpdateItem" method="POST">
    <input type="hidden" name="itemId" value="<?php echo $item->getItemId(); ?>">
    
    <div class="form-group">      
      <label for="itemName"><b>Name</b></label>
      <input class="form-control" name="itemName" type="text" value="<?php echo $item->getItemName(); ?>" required>
    </div>
    
    <div class="form-group">        
      <label for="brand"><b>Brand</b></label>
      <input class="form-control" name="brand" type="text" value="<?php echo $item->getBrand(); ?>" required>
    </div>
    
    <div class="form-group">      
      <label for="model"><b>Model</b></label>
      <input class="form-control" name="model" type="text" value="<?php echo $item->getModel(); ?>" required>
    </div>
    
    <div class="form-group">      
      <label for="stock"><b>Stock</b></label>
      <input class="form-control" name="stock" type="text" value="<?php echo $item->getStock(); ?>" required>
    </div>
    
    <div class="form-group">      
      <label for="price"><b>Price</b></label>
      <input class="form-control" name="price" type="text" value="<?php echo $item->getPrice(); ?>" required>
    </div>
    
    <div class="form-group">
      <label for="isActive"><b>isActive</b></label>
      <select class="form-control" name="isActive" required>
        <option value="1" <?php echo $item->getIsActive() == 1 ? 'selected' : ''; ?>>Yes</option>
        <option value="0" <?php echo $item->getIsActive() == 0 ? 'selected' : ''; ?>>No</option>
      </select>
    </div> 
    
    <button type="submit" class="btn btn-info btn-block">Update</button>
    <a class="btn btn-link float-right mt-2" href="?controller=Admin&action=ItemListView">Go back</a>
  </form>
</div>