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

var ddValue = document.getElementById('actionDropdown');
ddValue.onchange = function(adminChoice) {
	if (adminChoice==="add") {
		addProperty();
	} else if (adminChoice==="update") {
		updateProperty();
	} else if (adminChoice==="delete") {
		deleteProperty();
	}
}(ddValue.value);

updateProperty();
