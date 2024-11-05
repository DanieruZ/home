let filteredRows = [];

 function filterTable() {
  const input = document.getElementById("Input");
  const filter = input.value.toUpperCase();
  const tableBody = document.getElementById("tableBody");
  const rows = Array.from(tableBody.getElementsByTagName("tr"));
  
  filteredRows = rows.filter(row => {
    const td = row.getElementsByTagName("td");
    const selectedFieldIndex = document.getElementById("filterField").value;
    
    if(td.length > selectedFieldIndex) {
      const txtValue = td[selectedFieldIndex].textContent || td[selectedFieldIndex].innerText;
      return txtValue.toUpperCase().indexOf(filter) > -1;
    }
    return false;
  });
  currentPage = 1;  // Reset current page.
  paginateFilteredTable();  // Update table & pagination.
}
  




