/* Delete Message.js */

let deleteUrl = '';

function openModal(url) {
  deleteUrl = url;
  $('#modalConfirm').modal('show');
}

$('#confirmDeleteBtn').on('click', function() {
  window.location.href = deleteUrl;
});