<!-- Customer - Shopping List -->

<div class="container-fluid">
  <h2 class="mx-auto my-4"><i class="fas fa-shopping-cart"></i> Shopping List</h2>
  
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
        <option value="6">Purchase Date</option>
      </select>
    </div>
    <div class="col-md-7">
      <input class="form-control" type="text" id="Input" onkeyup="filterTable()" placeholder="Search for...">
    </div>
  </div>

  <!-- Shopping List Table -->
  <table class="table table-sm table-bordered" id="Table"> 
    <thead class="thead-dark">
      <tr>
        <th>Name</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
        <th>Purchase Date</th>
      </tr>
    </thead>
    <tbody id="tableBody"> 
      <?php 
        if(isset($shoppingList)) {
          foreach ($shoppingList as $shopping) { 
            $item = $shopping->getItem();
            $totalPrice = $shopping->getQuantity() * $item->getPrice(); 
      ?>			   
            <tr class="table-hover">
              <td><?php echo $item->getItemName(); ?></td>
              <td><?php echo $item->getBrand(); ?></td>
              <td><?php echo $item->getModel(); ?></td>
              <td><?php echo $shopping->getQuantity(); ?></td>
              <td><?php echo number_format($item->getPrice(), 2); ?></td>
              <td><?php echo number_format($totalPrice, 2); ?></td>
              <td><?php echo $shopping->getCreatedAt(); ?></td>
            </tr>
      <?php
          }
        }
      ?>	  
    </tbody>
  </table>
</div>