<!-- Pagination -->
 
<div>
  <?php 
    $paginationColor = "btn-brown";
      
    if(isset($_SESSION['userType'])) {
      ($_SESSION['userType'] === 'admin')
        ? $paginationColor = "btn-info"
        : $paginationColor = "btn-dark";
    }
  ?>

  <div class="d-flex justify-content-center align-items-center my-3" id="pagination">
    <button class="btn <?php echo $paginationColor; ?> mr-2 btn-sm" 
      onclick="changePage(-1)" id="prevBtn"><i class="fas fa-chevron-left"></i> Prev</button>

    <span id="pageInfo" class="mx-2">Page 1 of 1</span>   
    
    <button class="btn <?php echo $paginationColor; ?> btn-sm" 
      onclick="changePage(1)" id="nextBtn">Next <i class="fas fa-chevron-right"></i></button>
  </div>
</div>