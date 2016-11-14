function addProperty() {
	document.getElementById('addDiv').style.display="block";
	document.getElementById('updateDiv').style.display="none";
	document.getElementById('deleteDiv').style.display="none";
};

function updateProperty() {
	document.getElementById('addDiv').style.display="none";
	document.getElementById('updateDiv').style.display="block";
	document.getElementById('deleteDiv').style.display="none";
}

function deleteProperty() {
	document.getElementById('addDiv').style.display="none";
	document.getElementById('updateDiv').style.display="none";
	document.getElementById('deleteDiv').style.display="block";
}

function newChoice() {
	var adminChoice = document.getElementById('actionDropdown').value;

	if (adminChoice==="add") {
		addProperty();
	} else if (adminChoice==="update") {
		updateProperty();
	} else if (adminChoice==="delete") {
		deleteProperty();
	}
};

var ddValue = document.getElementById('actionDropdown');
ddValue.onchange = newChoice;
updateProperty();
