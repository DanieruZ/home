<!--═════ MODAL DELETE CONFIRM ═════════════════════════-->

<div id="modalConfirm" class="w3-modal">
  <div class="w3-modal-content  w3-card-4 w3-center w3-round-large" style="width:50%">
    <header class="w3-container w3-red">
      <span onclick="document.getElementById('modalConfirm').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
      <h2><i class="fas fa-exclamation-triangle"></i> Confirm</h2>
    </header>

    <div class="w3-container">
      <b><p>Are you sure you want to delete?</p><p>This action can't be undone.</p></b>
    </div>
    
    <footer class="w3-container w3-center w3-padding">
      <button class="w3-button w3-red w3-round-large" id="confirmDeleteBtn">Delete</button>
      <button class="w3-button w3-blue-gray w3-round-large" onclick="document.getElementById('modalConfirm').style.display='none'">Cancel</button>
    </footer>
  </div>
</div>