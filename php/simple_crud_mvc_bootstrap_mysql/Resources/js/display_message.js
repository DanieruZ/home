/* Display Message.js */

document.addEventListener('click', function(event) {
  var messageDiv = document.getElementById('message');

  if(messageDiv && !messageDiv.contains(event.target)) {
    messageDiv.style.display = 'none';
  }
});