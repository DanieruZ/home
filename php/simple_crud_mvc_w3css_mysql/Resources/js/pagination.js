let currentPage = 1;
const rowsPerPage = 10;

function paginateFilteredTable() {
  const tableBody = document.getElementById("tableBody");
  const rows = Array.from(tableBody.getElementsByTagName("tr"));

  // Hide all rows.
  rows.forEach(row => row.style.display = "none");

  // Calculate the total number of pages.
  const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
  const start = (currentPage - 1) * rowsPerPage;
  const end = start + rowsPerPage;

  // Show only the rows of the current page.
  for(let i = start; i < end && i < filteredRows.length; i++) {
    filteredRows[i].style.display = "";  // Show current row.
  }

  // Update pagination information.
  document.getElementById("pageInfo").innerText = `Page ${currentPage} of ${totalPages}`;
  document.getElementById("prevBtn").disabled = currentPage === 1;
  document.getElementById("nextBtn").disabled = currentPage === totalPages;
}


function changePage(direction) {
  const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
  currentPage += direction;

  // Ensure that currentPage is within limits.
  if(currentPage < 1) {
    currentPage = 1;
  } 
  else if(currentPage > totalPages) {
    currentPage = totalPages;
  }
  paginateFilteredTable();
}


// Calls filterTable() on page load to display the first page.
document.addEventListener("DOMContentLoaded", function() {
  filterTable();  // Initializes the table on page load.
});