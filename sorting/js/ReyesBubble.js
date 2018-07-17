/* Jose Reyes */
/* Sorting Algorithm: Bubble Sort */
/* Creation Date: 2/15/18 */
/* Last edit: 2/15/18 */
/* Function List:
/* bubSrt(array)
/* initAll()
*/

/* Use the pseudo code from the instructions pdf page to base the algorithm code and tests */
/* Also consulted with classmate Marco Anaya for optimizing the algorithm */

var bubArray = new Array(10);// Working space for data and sorting

function bubSrt(array) {
    var swap = true;
    var n = array.length;
    while (swap) {
        swap = false;
        for (var i = 0; i<n-1; i++) {
            if (array[i+1]<array[i]) {
                var temp = array[i];
                array[i] = array[i+1];
                array[i+1] = temp;
                swap = true;
            }
        }
        n--;
    }
}
        
function initAll() {
	for (var i=0; i<bubArray.length; i++) {// Has space for 10.
		var newNum = Math.floor(Math.random() * 25) + 1;

		document.getElementById("square" + i).innerHTML = " " + newNum + " ";
		bubArray[i] = newNum;
		//alert(bubArray[i]); // debug code for checking array elements.
		
	}
	
	bubSrt(bubArray); // this will throw an error message until you create the function!
    
    for (var i=0; i<bubArray.length; i++) {// Have space for 10; 5 is easier to follow at first.

		document.getElementById("squareS" + i).innerHTML = " " + bubArray[i] + " ";
		//alert(bubArray[i]); // debug code for checking array elements.
		
	}
    
}

initAll(); // "initAll" is just a generic function name; see the actual function above.