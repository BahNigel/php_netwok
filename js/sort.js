function sort(indexx) {
	if(testSort(indexx)) sortTableInverse(indexx);
	else if(testSortInverse(indexx)) sortTable(indexx);
	else sortTable(indexx);
}
function sortTable(indexx) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[indexx];
      y = rows[i + 1].getElementsByTagName("TD")[indexx];
      //check if the two rows should switch place:
      if (indexx == 0 && Number(x.innerHTML) > Number(y.innerHTML) || indexx > 0 && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
function sortTableInverse(indexx) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[indexx];
      y = rows[i + 1].getElementsByTagName("TD")[indexx];
      //check if the two rows should switch place:
      if (indexx == 0 && Number(x.innerHTML) < Number(y.innerHTML) || indexx > 0 && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
function testSort(indexx) {
    var table = document.getElementById("myTable");
    var rows = table.getElementsByTagName("TR");
	for (i = 1; i < (rows.length - 1); i++) {
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[indexx];
      y = rows[i + 1].getElementsByTagName("TD")[indexx];
      //check if the two rows should switch place:
      if (indexx == 0 && Number(x.innerHTML) > Number(y.innerHTML) || indexx > 0 && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        return false;
      }
    }
	return true;
}
function testSortInverse(indexx) {
    var table = document.getElementById("myTable");
    var rows = table.getElementsByTagName("TR");
	for (i = 1; i < (rows.length - 1); i++) {
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[indexx];
      y = rows[i + 1].getElementsByTagName("TD")[indexx];
      //check if the two rows should switch place:
      if (indexx == 0 && Number(x.innerHTML) < Number(y.innerHTML) || indexx > 0 && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        return false;
      }
    }
	return true;
}