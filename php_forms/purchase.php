<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Last edit: 3/10/2018 7:00 PM -->
    <!-- Last validated error free: 3/14/2018 7:06 PM -->
    
    <meta charset="utf-8">
    <title>Jose Reyes Final</title>
    <link rel="stylesheet" href="styles/shakeStyle.css">
    
    <!-- Used some of the ideas and code suggestions presented in Chapter 16 of HTML and CSS: Visual QuickStart Guide, 8th Edition
    By Elizabeth Castro, Bruce Hyslop -->
    <!-- Based the javascript from the instructions and class notes -->
    <!-- Used some of the ideas and code suggestions presented in Chapter 3 of PHP for the Web: Visual QuickStart Guide, 4th Edition
    By Larry Ullman -->
    
</head>
<body>
    <?php
        // Setting error display on
        ini_set('display_errors', 1); 
        error_reporting(E_ALL | E_STRICT);
    ?>
    <!-- page header -->
    <header role="banner">
        <h1>Chicago Shakespeare Repertory Theater</h1>
    </header>
    <main>
        <!-- this contains the entire form -->
        <form name="play_form" method="post" action="http://cs101.cs.uchicago.edu/~reyesj5/final/complete.php">
            <legend class="center">Tickets</legend>
            <fieldset class="center">
                <input type="hidden" value=<?php $_POST['selected_play'] ?>
                <p class="bold"><?php echo $_POST['selected_play'] ?></p>
                <p>Tickets are $50.00 each.</p>
                <label for="tickets">How many tickets would you like to buy?</label>
                <select id="tickets" name="tickets">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option> 
                </select>
            </fieldset>
            <legend class="center">Billing Infromation</legend>
            <!-- fieldset for name and last name -->
            <fieldset id="info">
                <ul>
                    <li class="inline name">
                        <div class="center_label">
                            <label for="first_name">First Name:</label>
                        </div>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" autofocus="autofocus"/>
                    </li>
                    <li class="inline name">
                        <div class="center_label">
                            <label for="last_name">Last Name:</label>
                        </div>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter your last name"/>
                    </li>
                </ul>
                <ul>
                    <li>
                        <div class="center_label">
                            <label for="street_address">Address:</label>
                        </div>
                        <input type="text" id="street_address" name="street_address" placeholder="Enter your street address"/>
                    </li>
                    <li class="inline">
                        <div class="center_label">
                            <label for="city">City:</label>
                        </div>
                        <input type="text" id="city" name="city" placeholder="Enter your city"/>
                    </li>
                    <!-- this is where the javascript will generate all the states in the optgroup tag -->
                    <li class="inline">
                        <div class="center_label">
                            <label for="state">State:</label>
                        </div>
                        <select id="state" name="state">
                            <option id="selected_state" value="none">Select a State</option>
                            <optgroup id="state_selection" label="US States">
                            </optgroup>
                        </select>
                    </li>
                    <li class="inline">
                        <div class="center_label">
                            <label for="zip_code">Zip Code:</label>
                        </div>
                        <input type="text" id="zip_code" name="zip_code" placeholder="Eg.12345"/>
                    </li>
                </ul>
                <ul>
                    <li>
                        <div class="center_label">
                            <label for="email">Email:</label>
                        </div>
                        <input type="text" id="email" name="email" placeholder="Eg. username@example.com"/>
                    </li>
                </ul>
                <ul>
                    <li class="inline">
                        <div class="center_label">
                            <label for="credit_card">Credit Card:</label>
                        </div>
                        <select id="credit_card" name="credit_card">
                            <option value="visa">Visa</option>
                            <option value="master">Mastercard</option>
                            <option value="discover">Discover</option>
                            <option value="amex">AmEx</option>
                        </select>
                    </li>
                    <li class="inline">
                        <input id="card_number" type="text" name="card_number" placeholder="Enter 15-16 digits"/>
                    </li>
                    <li class=inline>
                        <div class="center_label">
                            <label for="cvv">CVV:</label>
                        </div>
                        <input type="text" id="cvv" name="cvv" placeholder="123"/>
                    </li>
                </ul>
            <!-- button for submitting form -->
            <div class="center">
                <input type="submit" id="submit_form" name="submit" value="Submit">
            </div>
        </form>
    </main>
    <footer>
        <p id="footer">©2017 Chicago Shakespeare Repertory Theater</p>
    </footer>
    <script src="js/shakeToggle.js"></script>
</body>
</html>