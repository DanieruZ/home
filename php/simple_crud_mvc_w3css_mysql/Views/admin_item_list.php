<!--═════ ADMIN - ITEM LIST ═════════════════════════-->

<div class="w3-container">
  <h2><i class="fas fa-box"></i> Item List</h2>
	
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
				<option value="5">isActive</option>
			</select>
		</div>
		<input class="w3-input w3-border w3-hover-border-blue-gray w3-padding" type="text" id="Input" onkeyup="filterTable()" placeholder="Search for...">
	</div>

  <!--═════ ITEM LIST TABLE ═════════════════════════-->
	<table class="w3-table-all" id="Table"> 
		<thead>
			<tr class="w3-blue-gray">
				<th>Name</th>
				<th>Brand</th>
				<th>Model</th>
				<th>Stock</th>
				<th>Price</th>
				<th>isActive</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="tableBody">   
		<?php 
		  if(isset($itemList)) {
			  foreach ($itemList as $item) { 
		?>			   
					<tr class="w3-hover-pale-yellow">
						<td><?php echo $item->getItemName(); ?></td>
						<td><?php echo $item->getBrand(); ?></td>
						<td><?php echo $item->getModel(); ?></td>
						<td><?php echo $item->getStock(); ?></td>
						<td><?php echo $item->getPrice(); ?></td>
						<td><?php echo $item->getIsActive() ? 'Yes' : 'No'; ?></td>
						<td class="w3-right">
							<?php 
								$updateUrl =  FRONT_ROOT . 'Admin/UpdateItemView/' . $item->getItemId();
								$deleteUrl =  FRONT_ROOT . 'Admin/DeleteItem/' . $item->getItemId();
							?>
							<a href="<?php echo $updateUrl; ?>" class="w3-btn w3-round-large w3-blue-gray"><i class="fas fa-edit"></i></a>
							<a href="#" class="w3-btn w3-round-large w3-blue-gray" onclick="openModal('<?php echo $deleteUrl; ?>')"><i class="fas fa-trash"></i></a>
						</td>
					</tr>
		<?php
			  }
			}
		?>	  
	  </tbody>
	</table>
</div>