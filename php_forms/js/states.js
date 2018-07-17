/* Jose Reyes */
/* Form Creation: Generating selection list of states */
/* Creation Date: 3/28/18 */
/* Last edit: 3/3/18 9:35PM */
/* Function List: */
/* getStates() */

/* Used google to find a list of all the US states and abbreviations: http://www.softschools.com/social_studies/state_abbreviations/ */

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

/* function to get all the states with a for loop */
function getStates() {
    for (var i = 0; i<abbrev.length; i++) {
        if (state===abbrev[i]) {
            document.getElementById("state_selection").innerHTML += "<option value='" + abbrev[i] + "' selected='selected'>" + abbrev[i] + "</option>";
        } else {
            document.getElementById("state_selection").innerHTML += "<option value='" + abbrev[i] + "'>" + abbrev[i] + "</option>";
        }
    }
}
getStates();