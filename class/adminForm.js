document.getElementById('addDiv').style.display="block";
document.getElementById('updateDiv').style.display="none";
document.getElementById('deleteDiv').style.display="none";

var ddValue = document.getElementById('adminChoice');
ddValue.onchange = newChoice;

function newChoice() {
	var adminChoice = document.getElementById('adminChoice').value;

	if(adminChoice == "add") {
		document.getElementById('addDiv').style.display="block";
		document.getElementById('updateDiv').style.display="none";
		document.getElementById('deleteDiv').style.display="none";
	} else if(adminChoice=="update") {
		document.getElementById('updateDiv').style.display="block";
		document.getElementById('addDiv').style.display="none";
		document.getElementById('deleteDiv').style.display="none";
	} else {
		document.getElementById('deleteDiv').style.display="block";
		document.getElementById('addDiv').style.display="none";
		document.getElementById('updateDiv').style.display="none";
	}
};
