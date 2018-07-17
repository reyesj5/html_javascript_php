/* Jose Reyes */
/* Form Creation: Generating selection list of states */
/* Creation Date: 2/18/18 */
/* Last edit: 2/22/18 8:00PM */
/* Function List: */
/* getStates() */
/* validateForm() */
/* validateText() */
/* validateSelect() */
/* validateZip() */
/* validateEmail() */
/* validateRadio() */
/* validateCheck() */

/* Used google to find a list of all the US states and abbreviations: http://www.softschools.com/social_studies/state_abbreviations/ */
/* use the following website to learn about RegExp: https://www.w3schools.com/jsref/jsref_obj_regexp.asp */
/* Also looked at Professor sterner's javascript examples found on his server repository: https://cs101.cs.uchicago.edu/~sterner/javascript/ */

/* array of the state abbreviations */
var abbrev = ['AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 'ID', 'IL', 
              'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 
              'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 
              'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY'];

/* global variable for the alert message */
var alertMessage = "";

/* function to get all the states with a for loop */
function getStates() {
    for (var i = 0; i<abbrev.length; i++) {
        document.getElementById("state_selection").innerHTML += "<option value='" + abbrev[i] + "'>" + abbrev[i] + "</option>";
    }
}
getStates();

/* function to check and validate the form.
/* Decided to use a wrapper function for simplicity */
/* checks from bottom to top to focus on top first */
function validateForm(form) {    
    var validated = true;
    alertMessage = "";
    /* validating the checkbox */
    fieldset = document.getElementById('other_info');
    if (!validateCheck(fieldset)) {
        validated = false;
    }
    
    /* validating the payment method */
    var fieldset = document.getElementById('pay_method');
    if (!validateRadio(fieldset)) {
        validated = false;
    }
    
    /* validating the email */
    var email = document.getElementById('email');
    if (!validateEmail(email)) {
        validated = false;
    }
    
    /* validating the zip code */
    var zip = document.getElementById('zip_code');
    if (!validateZip(zip)) {
        validated = false;
    }
    
    /* validating the choice of a state */
    var states = document.getElementById('state');
    if (!validateSelect(states)) {
        validated = false;
    }
    
    var inputFields = form.getElementsByTagName('input');
    
    /* validating each text input, making sure they're not empty */
    for (var i = inputFields.length-1; i >=0 ; i--) {
        if (inputFields[i].type == 'text') {
            if(!validateText(inputFields[i])) { 
                validated = false;
            }
        }
    }
    
    /* returns true if passed all validations and prints the alert if it didn't */
    if (!validated) {
        alert(alertMessage);
    }
    return validated;
}

/* validates the text inputs */
function validateText(field) {
    if (field.value.length == 0) {
        var label = getLabel(field);
        alertMessage += label + ": Entry field is required.\n";
        field.focus();
        field.select();
        field.style.backgroundColor = "#2a518e";
        field.setAttribute('placeholder', 'Required field.');
        return false;
    } else {
        field.style.backgroundColor = "white";
    }
    return true;
}

/* validates the selection menu */
function validateSelect(field) {
    if (field.selectedIndex === 0) {
        var label = getLabel(field).toLowerCase();
        alertMessage += "You need to select a " + label + ".\n";
        field.focus();
        return false;
    }
    return true;
}

/* validates the zip code to 5 integer characters */
function validateZip(field) {
    var regexp = /^\d+$/;
    if (field.value.length !== 5 || !regexp.test(field.value)) {
        var label = getLabel(field);
        alertMessage += label + ": You must input 5 digits.\n";
        field.focus();
        field.select();
        return false;
    }
    return true;
}

/* validates the email input */
function validateEmail(field) {
    var regexp = /(.+)@(.+)\.(.+)/;
    var spaceRegExp = /\s/;
    if (!regexp.test(field.value) || spaceRegExp.test(field.value)) {
        var label = getLabel(field);
        alertMessage += label + ": You must input a valid email address without any white-space. E.g. user@example.com\n";
        field.focus();
        field.select();
        return false;
    }
    return true;
}

/* validates the radio inputs */
function validateRadio(fieldset) {
    var options = fieldset.getElementsByTagName('input');
    for (var i = options.length-1; i >= 0; i--) {
        if (options[i].type == 'radio' && options[i].checked) {
            return true;
        }
    }
    var label = options[0].getAttribute("name");
    alertMessage += "Please choose one of the " + label + " options.\n";
    options[0].focus();
    return false;
}

/* validates checkboxes */
function validateCheck(fieldset) {
    var options = fieldset.getElementsByTagName('input');
    for (var i = options.length-1; i >= 0; i--) {
        if (options[i].type == 'checkbox' && options[i].checked) {
            return true;
        }
    }
    alertMessage += "Please check at least one of the checkboxes.\n";
    options[0].focus();
    return false;
}

function getLabel(field) {
    var label = field.parentElement.getElementsByTagName('label');
    return label[0].innerHTML;
}