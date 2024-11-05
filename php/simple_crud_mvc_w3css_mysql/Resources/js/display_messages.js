// Add a click event to the body.
document.body.onclick = function(event) {
  var messageDiv = document.getElementById('message');
 
  // Verify if the click was outside the message.
  if(messageDiv && !messageDiv.contains(event.target)) {
    messageDiv.style.display = 'none';
  }
};
