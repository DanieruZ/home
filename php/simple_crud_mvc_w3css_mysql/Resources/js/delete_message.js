let deleteUrl = '';

function openModal(url) {
  deleteUrl = url;
  document.getElementById('modalConfirm').style.display = 'block';
  document.getElementById('confirmDeleteBtn').onclick = function() {
    window.location.href = deleteUrl; 
  };
}