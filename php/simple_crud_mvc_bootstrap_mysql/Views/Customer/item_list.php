<!-- Customer - Item List -->

<div class="container-fluid">
  <h2 class="mx-auto my-4"><i class="fas fa-box"></i> Item List</h2>

  <!-- Filtered Search -->
  <div class="row mb-3">
    <div class="col-md-3">
      <p>Search for selected filter:</p>
    </div>
    <div class="col-md-2">
      <select id="filterField" class="form-control">
        <option value="0" selected>Name</option>
        <option value="1">Brand</option>
        <option value="2">Model</option>
      </select>
    </div>

    <!-- Shopping Cart Button -->
    <div class="col-md-6 text-right">
    <button class="btn btn-dark" onclick="$('#modalShoppingCart').modal('show')">
        <i class="fas fa-shopping-cart"></i>
        Shopping Cart 
        <span id="badge" class="badge badge-danger ml-2" style="display: none;">0</span>
      </button>
    </div>
    <div class="col-md-12 mt-2">
      <input class="form-control" type="text" id="Input" onkeyup="filterTable(); paginateFilteredTable();" placeholder="Search for...">
    </div>
  </div>

  <!-- Item Table -->
  <table class="table table-sm table-bordered table-hover table-striped" id="Table"> 
    <thead class="thead-dark">
      <tr>
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
              <tr class="table-hover">
                <td><?php echo $item->getItemName(); ?></td>
                <td><?php echo $item->getBrand(); ?></td>
                <td><?php echo $item->getModel(); ?></td>
                <td><?php echo $item->getStock(); ?></td>
                <td><?php echo number_format($item->getPrice(), 2); ?></td>
                <td class="text-center">
                  <?php if($item->getStock() > 0) { ?>
                          <button class="btn btn-dark btn-sm" 
                            onclick="addToShoppingCart(
                              <?php echo $item->getItemId(); ?>, 
                              '<?php echo ($item->getItemName()); ?>', 
                              <?php echo $item->getStock(); ?>,
                              <?php echo $item->getPrice(); ?>)">
                              <i class="fas fa-shopping-cart"></i><i class="fas fa-plus"></i></button>
                  <?php } 
                        else { ?>
                          <button class="btn btn-secondary btn-sm" disabled>
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