document.getElementById('actionDropdown')
	.addEventListener("onchange", function(action) {
		if (action==="add") {
			addProperty();
		} else if (action==="update") {
			updateProperty();
		} else if (action==="delete") {
			deleteProperty();
		}
	}(document.getElementById('actionDropdown').value));

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

updateProperty();
