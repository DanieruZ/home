<!--═════ PAGINATION ═════════════════════════-->
<div>
  <?php 
    $paginationColor = "w3-brown";
      
    if(isset($_SESSION['userType'])) {
      ($_SESSION['userType'] === 'admin')
        ? $paginationColor = "w3-blue-gray"
        : $paginationColor = "w3-black";
    }
  ?>

  <div class="w3-center w3-padding-small w3-small" id="pagination">
    <button class="w3-button w3-round-large <?php echo $paginationColor; ?>" 
      onclick="changePage(-1)" id="prevBtn"><i class="fas fa-chevron-left"></i> Prev</button>

    <span id="pageInfo">Page 1 of 1</span>   
    
    <button class="w3-button w3-round-large <?php echo $paginationColor; ?>" 
      onclick="changePage(1)" id="nextBtn">Next <i class="fas fa-chevron-right"></i></button>
  </div>
</div>