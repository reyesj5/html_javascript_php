/* Jose Reyes */
/* Form Creation: Generating selection list of states */
/* Creation Date: 2/18/18 */
/* Last edit: 2/18/18 */
/* Function List:
/* getStates()
*/

/* Used google to find a list of all the US states and abbreviations: http://www.softschools.com/social_studies/state_abbreviations/ */

/* array of all the state names */
var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 
              'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 
              'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 
              'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 
              'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 
              'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 
              'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];

/* array of the state abbreviations */
var abbrev = ['AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 'ID', 'IL', 
              'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 
              'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 
              'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY']


/* function to get all the states with a for loop */
var getStates = function() {
    console.log(states.length);
    console.log(states.length === abbrev.length);
    for (var i = 0; i<states.length; i++) {
        document.getElementById("state_selection").innerHTML += "<option value='" + abbrev[i] + "'>" + states[i] + "</option>";
    }
}

getStates();