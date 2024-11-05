<!--═════ MODAL SHOPPING CART ═════════════════════════-->

<div id="modalShoppingCart" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <header class="w3-container w3-black">
      <span onclick="document.getElementById('modalShoppingCart').style.display='none'" 
        class="w3-button w3-hover-dark-grey w3-display-topright">&times;</span>
      <h2><i class="fas fa-shopping-cart"></i> Shopping Cart</h2>
    </header>
    
    <div class="w3-container">
      <ul id="modalShoppingCartList" class="w3-ul w3-table w3-padding"></ul>
      <h3>Total: $<span id="modalTotal">0</span></h3>
    </div>
    
    <footer class="w3-container w3-black">
      <form method="POST" action="<?php echo FRONT_ROOT; ?>Customer/CreatePurchase" onsubmit="document.getElementById('itemsInput').value = JSON.stringify(shoppingCart);">
        <input type="hidden" name="items" id="itemsInput">
        <div class="w3-container w3-padding-16">
          <button type="submit" class="w3-button w3-left w3-white w3-round-large w3-hover-dark-grey">Buy</button>
          <button type="button" class="w3-button w3-white w3-right w3-round-large w3-hover-dark-grey" 
            onclick="document.getElementById('modalShoppingCart').style.display='none'">Close</button>
        </div>                
      </form>
    </footer>
  </div>
</div>