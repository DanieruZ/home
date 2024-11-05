const shoppingCart = [];

function addToShoppingCart(itemId, itemName, stock, price) {
  price = parseFloat(price);  // Make sure that the price is a number.
  
  if(isNaN(price) || price <= 0) {
    showMessage("Invalid price.");
    return;
  }

  const existingItem  = shoppingCart.find(item => item.itemId === itemId);
    
  if(existingItem) {
    if(existingItem .quantity + 1 > stock) {
      showMessage(`You can't add more than ${stock} ${itemName} unit/s.`);
      return;
    }
    existingItem .quantity += 1;
    } 
    else {
      shoppingCart.push({ itemId, itemName, price, quantity: 1 });
    }
    updateShoppingCart();
}


// Shows messages in the stock modal.
function showMessage(messageText) {
  const stockMessageText = document.getElementById("stockMessageText");
  stockMessageText.textContent = messageText;
  document.getElementById("modalStock").style.display = "block";
}


function updateShoppingCart() {
  const modalShoppingCart = document.getElementById('modalShoppingCartList');
  modalShoppingCart.innerHTML = '';
  let total = 0;
  let totalItems = 0;

  shoppingCart.forEach((item, index) => {
    totalItems += item.quantity;
    
    const liModal = document.createElement('li');
    liModal.textContent = `${item.itemName} - ${item.quantity} x ${item.price.toFixed(2)} = ${(item.price * item.quantity).toFixed(2)}`;
    
    const modalDeleteBtn = document.createElement('button');
    modalDeleteBtn.textContent = 'Delete';
    modalDeleteBtn.className = 'w3-button w3-right w3-black w3-round-large w3-tiny';
    modalDeleteBtn.onclick = () => deleteFomShoppingCart(index);
    
    liModal.appendChild(modalDeleteBtn);
    modalShoppingCart.appendChild(liModal);
    total += item.price * item.quantity;
  });


    // Update the badge.
    const badge = document.getElementById('badge');
    badge.textContent = totalItems;
    badge.style.display = totalItems > 0 ? 'inline' : 'none';

    document.getElementById('modalTotal').textContent = total.toFixed(2);
  }


function deleteFomShoppingCart(index) {
  shoppingCart.splice(index, 1);
  updateShoppingCart();
}