<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Last edit: 3/3/2018 7:00 PM -->
    <!-- Last validated error free: 3/3/2018 7:06 PM -->
    
    <meta charset="utf-8">
    <title>Jose Reyes HW6</title>
    <link rel="stylesheet" href="styles/style.css">
    
    <!-- Used some of the ideas and code suggestions presented in Chapter 16 of HTML and CSS: Visual QuickStart Guide, 8th Edition
    By Elizabeth Castro, Bruce Hyslop -->
    <!-- Based the javascript from the instructions and class notes -->
    <!-- Used some of the ideas and code suggestions presented in Chapter 3 of PHP for the Web: Visual QuickStart Guide, 4th Edition
    By Larry Ullman -->
    
</head>
<body>
    <!-- creates a header for the page -->
    <header>
        <h1>Fill This General Form</h1>
    </header>
    <main>
        <!-- this contains the entire form -->
        <form name="hw6_form" method="post" action="http://cs101.cs.uchicago.edu/~reyesj5/hw6/registerData.php">
            <!-- fieldset for name and last name -->
            <fieldset id="info">
                <h2>Name:</h2>
                <ul>
                    <li>
                        <div class="center_label">
                            <label for="first_name">First Name</label>
                        </div>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" autofocus="autofocus"/>
                    </li>
                    <li>
                        <div class="center_label">
                            <label for="last_name">Last Name</label>
                        </div>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter your last name"/>
                    </li>
                </ul>
            </fieldset>
            <!-- fieldset for billing address and email address-->
            <fieldset id="address">
                <h2>Address:</h2>
                <ul>
                    <li>
                        <div class="center_label">
                            <label for="street_address">Street</label>
                        </div>
                        <input type="text" id="street_address" name="street_address" placeholder="Enter your street address"/>
                    </li>
                    <li>
                        <div class="center_label">
                            <label for="city">City</label>
                        </div>
                        <input type="text" id="city" name="city" placeholder="Enter your city"/>
                    </li>
                    <!-- this is where the javascript will generate all the states in the optgroup tag -->
                    <li>
                        <div class="center_label">
                            <label for="state">State</label>
                        </div>
                        <select id="state" name="state">
                            <option id="selected_state" value="none">Select a State</option>
                            <optgroup id="state_selection" label="US States">
                            </optgroup>
                        </select>
                    </li>
                    <li>
                        <div class="center_label">
                            <label for="zip_code">Zip Code</label>
                        </div>
                        <input type="text" id="zip_code" name="zip_code" placeholder="12345"/>
                    </li>
                    <li>
                        <div class="center_label">
                            <label for="email">Email Address</label>
                        </div>
                        <input type="text" id="email" name="email" placeholder="username@example.com"/>
                    </li>
                </ul>
            </fieldset>
            <!-- fieldset for method of payment -->
            <fieldset id="pay_method">
                <h2>Choose a payment method:</h2>
                <ul>
                    <li>
                        <input type="radio" id="credit_card" name="payment" value="credit_card" />
                        <label for="credit_card">Credit Card</label>
                    </li>
                    <li>
                        <input type="radio" id="paypal" name="payment" value="paypal"/>
                        <label for="paypal">Paypal</label>
                    </li>
                </ul>
            </fieldset>
            <!-- button for submitting form -->
            <div class="center">
                <input type="submit" id="submit_form" name="submit" value="Submit">
            </div>
        </form>
    </main>
    <script src="js/states.js"></script>
</body>
</html>