<!--═════ MODAL STOCK ═════════════════════════-->

<div id="modalStock" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-center w3-round-large" style="width:50%">
    <header class="w3-container w3-red">
      <span onclick="document.getElementById('modalStock').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
      <h2><i class="fas fa-exclamation-triangle"></i> Warning</h2>
    </header>

  <div class="w3-container">
    <b><p id="stockMessageText"></p></b>
  </div>
  
  <footer class="w3-container w3-center w3-padding">
    <button class="w3-button w3-red w3-round-large" onclick="document.getElementById('modalStock').style.display='none'">Close</button>
  </footer>
</div>