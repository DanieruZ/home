<!--═════ CUSTOMER - ITEM LIST ═════════════════════════-->

<div class="w3-container">
  <h2><i class="fas fa-box"></i> Item List</h2>

  <!--═════ FILTERED SEARCH ═════════════════════════-->
	<div class="w3-row">
	  <div class="w3-col s3">
	   	<p>Search for selected filter:</p>
		</div>
		<div class="w3-col s2">
			<select id="filterField" class="w3-select w3-border w3-center w3-round-large w3-black">
				<option value="0" selected>Name</option>
				<option value="1">Brand</option>
				<option value="2">Model</option>
			</select>
		</div>

    <!--═════ SHOPPING CART BUTTON ═════════════════════════-->
    <div class="w3-col s6">
      <button class="w3-button w3-round-large w3-black w3-right" onclick="document.getElementById('modalShoppingCart').style.display='block'">
        <i class="fas fa-shopping-cart"></i>
        Shopping Cart 
        <span id="badge" class="w3-badge w3-margin-left w3-red" style="display: none;">0</span>
      </button>
    </div>
      <input class="w3-input w3-border w3-hover-border-black w3-padding" type="text" id="Input" onkeyup="filterTable(); paginateFilteredTable();" placeholder="Search for...">
	</div>

  <!--═════ ITEM LIST TABLE ═════════════════════════-->
	<table class="w3-table-all" id="Table"> 
    <thead>
      <tr class="w3-black">
        <th>Name</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Stock</th>
        <th>Price</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="tableBody">  
      <?php 
        if(isset($itemList)) {
          foreach ($itemList as $item) { 
            if($item->getIsActive()) {
      ?>			   
              <tr class="w3-hover-dark-grey">
                <td><?php echo $item->getItemName(); ?></td>
                <td><?php echo $item->getBrand(); ?></td>
                <td><?php echo $item->getModel(); ?></td>
                <td><?php echo $item->getStock(); ?></td>
                <td><?php echo number_format($item->getPrice(), 2); ?></td>
                <td>
                  <?php if($item->getStock() > 0) { ?>
                          <button class="w3-button w3-small w3-round-large w3-black" 
                            onclick="addToShoppingCart(
                              <?php echo $item->getItemId(); ?>, 
                              '<?php echo ($item->getItemName()); ?>', 
                              <?php echo $item->getStock(); ?>,
                              <?php echo $item->getPrice(); ?>)">
                              <i class="fas fa-shopping-cart"></i><i class="fas fa-plus"></i></button>
                  <?php } 
                        else { ?>
                          <button class="w3-button w3-small w3-round-large w3-grey" disabled>
                            <i class="fas fa-shopping-cart"></i><i class="fas fa-plus"></i></button>
                  <?php } ?>
                </td>
              </tr>
      <?php
            }
          }
        }  
      ?>	  
    </tbody>
  </table>
</div>