<!-- Admin - Item List -->

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
				<option value="5">isActive</option>
			</select>
		</div>
		<div class="col-md-7">
			<input class="form-control" type="text" id="Input" onkeyup="filterTable()" placeholder="Search for...">
		</div>
	</div>

  <!-- Item Table -->
	<table class="table table-sm table-bordered" id="Table"> 
		<thead class="bg-info text-white">
			<tr>
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
					<tr>
						<td><?php echo $item->getItemName(); ?></td>
						<td><?php echo $item->getBrand(); ?></td>
						<td><?php echo $item->getModel(); ?></td>
						<td><?php echo $item->getStock(); ?></td>
						<td><?php echo $item->getPrice(); ?></td>
						<td><?php echo $item->getIsActive() ? 'Yes' : 'No'; ?></td>
						<td class="text-center">
							<?php 
								$updateUrl = '?controller=Admin&action=UpdateItemView&itemId=' . $item->getItemId();
								$deleteUrl = '?controller=Admin&action=DeleteItem&itemId=' . $item->getItemId();
							?>
							<a href="<?php echo $updateUrl; ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
							<a href="#" class="btn btn-danger btn-sm" onclick="openModal('<?php echo $deleteUrl; ?>');"><i class="fas fa-trash"></i></a>

						</td>
					</tr>
		<?php
			  }
			}
		?>	  
	  </tbody>
	</table>
</div>