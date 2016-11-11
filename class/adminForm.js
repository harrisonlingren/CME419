function goToForm() {
	document.getElementById('formDiv').style.display="block";
	document.getElementById('tableDiv').style.display="none";
};

function goToTable() {
	document.getElementById('formDiv').style.display="none";
	document.getElementById('tableDiv').style.display="block";
}

goToTable();

/*
I also changed this code a bit to reflect the changes in the other file. Most
of it should be pretty standard, but feel free to let me know if you have any
feedback or questions as you're working through it.
*/
