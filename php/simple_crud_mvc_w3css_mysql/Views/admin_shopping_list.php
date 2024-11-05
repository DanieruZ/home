<!--═════ ADMIN - SHOPPING LIST ═════════════════════════-->

<div class="w3-container">
  <h2><i class="fas fa-shopping-cart"></i> Shopping List</h2>

	<!--═════ FILTERED SEARCH ═════════════════════════-->
	<div class="w3-row">
		<div class="w3-col s3">
			<p>Search for selected filter:</p>
		</div>
		<div class="w3-col s2">
			<select id="filterField" class="w3-select w3-border w3-center w3-round-large w3-blue-gray">
				<option value="0" selected>Name</option>
				<option value="1">Brand</option>
				<option value="2">Model</option>
				<option value="6">Purchase Date</option>
			</select>
		</div>
		<input class="w3-input w3-border w3-hover-border-blue-gray w3-padding" type="text" id="Input" onkeyup="filterTable()" placeholder="Search for...">
	</div>

	<!--═════ SHOPPING LIST TABLE ═════════════════════════-->
	<table class="w3-table-all" id="Table"> 
		<thead>
			<tr class="w3-blue-gray">
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
						<tr class="w3-hover-pale-yellow">
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