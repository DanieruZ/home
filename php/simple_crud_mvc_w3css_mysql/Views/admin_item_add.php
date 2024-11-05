<!--═════ ADMIN - NEW ITEM FORM ═════════════════════════-->

<div class="w3-card-4 w3-display-middle w3-half  w3-round-large">
  <div class="w3-container w3-blue-grey">
    <h2><i class="fas fa-box"></i><i class="fas fa-plus w3-large"></i> New Item</h2>
  </div>

  <form class="w3-container" action="AddItem" method="POST">
    <p>      
      <label for="itemName"><b>Name</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="itemName" type="text" requerid>
    </p>  
    <p>      
      <label for="brand"><b>Brand</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="brand" type="text" requerid>
    </p> 
    <p>      
      <label for="model"><b>Model</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="model" type="text" requerid>
    </p> 
    <p>      
      <label for="stock"><b>Stock</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="stock" type="text">
    </p>   
    <p>  
      <label for="price"><b>Price</b></label>
      <input class="w3-input w3-border w3-light-gray w3-round-large" name="price" type="text" requerid>
    </p>     
    <p>
      <label for="isActive"><b>isActive</b></label>
      <select class="w3-input w3-border w3-light-gray w3-round-large" name="isActive" required>
        <option value="1" selected>Yes</option>
        <option value="0">No</option>
      </select>
    </p>    
    <button class="w3-btn w3-blue-gray w3-round-large">Add</button></p>
    <a class="w3-display-bottomright w3-margin w3-right" href="<?php echo FRONT_ROOT ?>Admin/ItemListView">Go back</a> 
  </form>
</div>