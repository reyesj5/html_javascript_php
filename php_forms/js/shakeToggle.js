/* Jose Reyes */
/* Form Creation: Generating selection list of states */
/* Creation Date: 3/10/18 */
/* Last edit: 3/13/18 9:35PM */
/* Function List: */
/* getStates() */
/* hiliteMe() */
/* unhiliteMe() */
/* togglePlotSum() */
/* shakeToggles() */

/* Used google to find a list of all the US states and abbreviations: http://www.softschools.com/social_studies/state_abbreviations/ */

/* function to get all the states with a for loop */
function getStates() {
    /* array of the state abbreviations */
    var abbrev = ['AL', 'AK', 'AZ', 'AR', 'CA',
                  'CO', 'CT', 'DE', 'FL', 'GA', 
                  'HI', 'ID', 'IL', 'IN', 'IA', 
                  'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 
                  'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 
                  'VA', 'WA', 'WV', 'WI', 'WY'];
    /* PHP will add an id and the class to the option so we can select the right one with javascript in the validation*/
    var selected_state = document.getElementById('selected_state');
    var state = selected_state.className;
    /* Loop checks for a valid state if checked, or just recreates the list of states */
    for (var i = 0; i<abbrev.length; i++) {
        if (state===abbrev[i]) {
            document.getElementById("state_selection").innerHTML += "<option value='" + abbrev[i] + "' selected='selected'>" + abbrev[i] + "</option>";
        } else {
            document.getElementById("state_selection").innerHTML += "<option value='" + abbrev[i] + "'>" + abbrev[i] + "</option>";
        }
    }
}

/* adds a class to the element to be hilited */
function hiliteMe() {
    if (this.className.search(/\bhilited\b/) == -1) {
        this.className += " hilited";
    }
}

/* removes the hilited class from the list of classes */
function unhiliteMe() {
    this.classList.remove('hilited');
}

/* shows or hides the summaries */
function togglePlotSum() {
    var elem = this.id.replace('play', '');
    var summary = 'summary' + elem;
    summary = document.getElementById(summary);
    if (summary.style.display === "block") {
        summary.style.display = "none"; 
    } else { 
        summary.style.display = "block"; 
    }
}

/* gets called onload to add the listening events to the html page */
function shakeToggles() {
    headers = document.getElementsByClassName('play_header');
    summaries = document.getElementsByClassName('play_summary');
    for (var i = 0; i<headers.length; i++) {
        headers[i].onmouseover = hiliteMe;
        headers[i].onmouseout = unhiliteMe;
        headers[i].onclick = togglePlotSum;
    }
}

/* checks which page is calling and calls the neccessary functions */
window.onload = function() {
	var path = window.location.pathname.split('/');
	var page = path[path.length - 1];
	switch(page){
		case 'home.html':
			shakeToggles();
			break;
		case 'purchase.php':
		case 'complete.php':
			getStates();
			break;
		default:
            break;
	}
}