<!-- Modal Shopping Cart -->

<div class="modal fade" id="modalShoppingCart" tabindex="-1" role="dialog" aria-labelledby="modalShoppingCartLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="modalShoppingCartLabel"><i class="fas fa-shopping-cart"></i> Shopping Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <ul id="modalShoppingCartList" class="list-group"></ul>
        <h3>Total: $<span id="modalTotal">0</span></h3>
      </div>
      
      <div class="modal-footer bg-dark">
        <form method="POST" action="?controller=Customer&action=CreatePurchase" onsubmit="document.getElementById('itemsInput').value = JSON.stringify(shoppingCart);">
          <input type="hidden" name="items" id="itemsInput">
          <button type="submit" class="btn btn-light">Buy</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>