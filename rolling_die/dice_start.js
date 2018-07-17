/* Last edit: 2/3/2018 8:10 PM */
/* Last validated error free: 2/3/2018 8:30 PM */

var rollDice = function (event) {
    event.preventDefault();
    
    /* asking for name and guess */
    var name = prompt("What's your name?", "Guest");
    var numbers = prompt("Okay " + name + ", guess which two numbers you will get between 1-6, separated by a comma, like 3,5");
    
    /* checking if input is valid */
    var guess = numbers.split("");
    var invalidNumber = true;
    if ((guess[0] <= 6) && (guess[0] >= 1)) {
        if ((guess[2] <= 6) && (guess[2] >= 1)) {
            invalidNumber = false;
        }
    }
    if ((numbers.length !== 3) || (guess[1] !== ",") || invalidNumber) {
        alert("Please enter a valid guess, two numbers between 1 and 6, separated by a comma!");
        return;
    }
    
    /* rolling dice */
    var path = "";
    var die1, die2;
    for (var i=0; i<2; i++) {
        var pic = (Math.random() * 6) + 1;
        pic = Math.floor(pic);
        path = "dice/" + pic + ".png";
        var die = "";
        if (i==0) {
            die = "first";
            die1 = pic;
        } else {
            die = "second";
            die2 = pic;
        }
        document.getElementById(die).src = path;
    }
    
    /* reminding user of his guess and checking if they guessed correctly */
    alert(name + ", you entered: " + numbers + "\nDo you want to see if you guessed correctly?");
    if ((die1 === guess[0] && die2 === guess[2]) || (die2 === guess[0] && die1 === guess[2])) {
        alert("Wow! You guessed correctly!");
    } else if (die1 === guess[0] || die2 === guess[0]) {
        alert("You got " + guess[0] + " right!");
    } else if (die1 === guess[2] || die2 === guess[2]) {
        alert("You got " + guess[2] + " right!");
    } else {
        alert("You guessed incorrectly, better luck next time!");
    }
}

var link = document.getElementById("roll_dice");
link.addEventListener("click", rollDice);