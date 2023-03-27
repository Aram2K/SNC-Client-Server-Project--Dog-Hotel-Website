// validator.js
// An example of input validation using the change and submit events

// The event handler function for the name text box
function chkName() {
	var thefirstName = document.getElementById("firstName");

	var pos = thefirstName.value.search(/^[A-Z]*[a-z]+?$/); //the first letter must be capitalized
	if (pos != 0) {
		alert("The name you entered (" + thefirstName.value +
			") is not in the correct form.  Please fix your name.");

		thefirstName.select();
		thefirstName.focus();
		return false;
	}
	else
		return true;
}
// The event handler function for the surname text box
function chkSurname() {
	var thelastName = document.getElementById("lastName");

	var hos = thelastName.value.search(/^[A-Z]*[a-z]+?$/);
	if (hos != 0) {
		alert("The name you entered (" + thelastName.value +
			") is not in the correct form.  Please fix your name.");

		thelastName.select();
		thelastName.focus();
		return false;
	}
	else
		return true;
}

// The event handler function for the name text box
function chkPassword() {
	var thePassword = document.getElementById("password");
	
	// Test the format of the password
	if (thePassword.value.length < 6) {
	   alert("The password you entered is too short ... must be at least 6 characters");
	   thePassword.focus();
	   thePassword.select();
	   return false;
	}
	else
	   return true;
} 
// The event handler function for the name text box
function chkEmail() {
	var theEmail = document.getElementById("email");

	// Test the format of the password
	if (theEmail.value.length < 4) {
		alert("enter an email");
		theEmail.focus();
		theEmail.select();
		return false;
	}
	else
		return true;
} 
// The event handler function for the Date text box
function chkDate() {
	var theDate = document.getElementById("date");

	// Test the format of the password
	var pos = theDate.value.search(/^(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])-\d{4}$/); //
	if (pos!=0) {
		alert("The date you entered (" + theDate.value + ") must follow the MM-DD-YYYY format");
		theDate.focus();
		theDate.select();
		return false;
	}
	else
		return true;
}
function submitMe() {
	if (chkName() && chkSurname() && chkEmail() && chkPassword() )
		return true;
	return false;
}
function checkdisabler() {
	document.getElementById("myCheck").disabled = true;
}