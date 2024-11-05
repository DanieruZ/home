<!--═════ ADMIN - UPDATE ITEM FORM ═════════════════════════-->

<div class="w3-card-4 w3-display-middle w3-half w3-round-large">
  <div class="w3-container w3-blue-grey">
    <h2><i class="fas fa-box"></i><i class="fas fa-edit w3-large"></i> Update Item</h2>
  </div>
  
  <form class="w3-container" action="<?php echo FRONT_ROOT; ?>Admin/UpdateItem" method="POST">
    <input type="hidden" name="itemId" value="<?php echo $item->getItemId(); ?>">
    <p>      
      <label for="itemName"><b>Name</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="itemName" type="text" value="<?php echo $item->getItemName(); ?>">
    </p>
    <p>        
      <label for="brand"><b>Brand</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="brand" type="text" value="<?php echo $item->getBrand(); ?>">
    </p>
    <p>      
      <label for="model"><b>Model</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="model" type="text" value="<?php echo $item->getModel(); ?>">
    </p>
    <p>      
      <label for="stock"><b>Stock</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="stock" type="text" value="<?php echo $item->getStock(); ?>">
    </p>
    <p>      
      <label for="price"><b>Price</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="price" type="text" value="<?php echo $item->getPrice(); ?>">
    </p>
    <p>
      <label for="isActive"><b>isActive</b></label>
      <select class="w3-input w3-border w3-light-gray w3-round-large" name="isActive" value="<?php echo $item->getIsActive(); ?>">
        <option value="1">Yes</option>
        <option value="0">No</option>
      </select>
    </p> 
    <p>     
      <button type="submit" class="w3-btn w3-round-large w3-blue-gray">Update</button>
      <a class="w3-display-bottomright w3-margin w3-right" href="<?php echo FRONT_ROOT ?>Admin/ItemListView">Go back</a>
    </p>
  </form>
</div>