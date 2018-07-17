<!-- Last edit: 3/3/2018 10:35 PM -->
<!-- Last validated error free: 3/3/2018 10:36 PM -->

<!-- use the following website to learn about RegExp: https://www.w3schools.com/jsref/jsref_obj_regexp.asp -->
<!-- Used some of the ideas and code suggestions presented in Chapter 3 of PHP for the Web: Visual QuickStart Guide, 4th Edition
    By Larry Ullman -->
<?php
    // Setting error display on
    ini_set('display_errors', 1); error_reporting(E_ALL | E_STRICT);
    // inlcuding headers for html file
    include('headers.html');
  
//testing the variable values of $_POST
/*
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $street_address = $_POST['street_address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    $email = $_POST['email'];
    $payment = $_POST['payment'];
  
    echo "<p>$first_name</p>";
    echo "<p>$last_name</p>";
    echo "<p>$street_address</p>";
    echo "<p>$city</p>";
    echo "<p>$state</p>";
    echo "<p>$zip_code</p>";
    echo "<p>$email</p>";
    echo "<p>$payment</p>";
  
    print "<pre>";
    print_r($_POST);
    print "</pre>";
*/

    // setting up array of keys
    $storeNV= ['first_name' => "",
               'last_name' => "",
               'street_address' => "",
               'city' => "",
               'state' => "",
               'zip_code' => "",
               'email' => "",
               'payment' => ""];
    $inputNames = array_keys($storeNV);
    // array to keep track of failed elements
    $resultElements = $storeNV;
    
    // loop to set $_POST values to $storeNV array
    foreach ($inputNames as $name) {
        $storeNV[$name] = $_POST[$name];
    }

    // variables to give back to user if they give a wrong format
    $zip_code = $_POST['zip_code'];
    $email = $_POST['email'];

    // validating the given inputs
    $errorCount = 0;
    foreach ($storeNV as $name => $input) {
        switch ($name) {
            case 'first_name':
            case 'last_name':
            case 'street_address':
            case 'city':
            case 'payment':
                if(empty($input)) {
                    $resultElements[$name] = false;
                    $storeNV[$name] = "This field is required!";
                    $errorCount++;
                } else {
                    $resultElements[$name] = true;
                }
                break;
            case 'state':
                if(preg_match('/^[A-Z]{2}$/', $input) != 1 || strlen($input) != 2) {
                    $resultElements[$name] = false;
                    $storeNV[$name] = "Please select a state!";
                    $errorCount++;
                } else {
                    $resultElements[$name] = true;
                }
                break;
            case 'zip_code':
                if(preg_match('/^\d+$/', $input) != 1 || strlen($input) != 5) {
                    $resultElements[$name] = false;
                    $storeNV[$name] = "Must input 5 numbers between 0-9.";
                    $errorCount++;
                } else {
                    $resultElements[$name] = true;
                }
                break;
            case 'email':
                if(preg_match('/(.+)@(.+)\.(.+)/', $input) != 1 || preg_match('/\s/', $input) == 1) {
                    $resultElements[$name] = false;
                    $storeNV[$name] = "Must use the format: user@example.domain";
                    $errorCount++;
                } else {
                    $resultElements[$name] = true;
                }
                break;
            default:
                break;
        }
    }
    // checking if page was valid and remaking the html from there.
    if ($errorCount) {
        echo "
        <!-- creates a header for the page -->
        <header>
            <h1 class='red_text'>Oops! Please fix the marked fields...</h1>
        </header>
        <main>
            <!-- this contains the entire form -->
            <form name='hw6_form' method='post' action='http://cs101.cs.uchicago.edu/~reyesj5/hw6/registerData.php'>
                <!-- fieldset for name and last name -->
                <fieldset id='info'>
                    <h2>Name:</h2>
                    <ul>
                        <li>
                            <div class='center_label'>
                                <label for='first_name'>First Name</label>
                            </div>
                            <input type='text' id='first_name' name='first_name' placeholder='Enter your first name' ",(
                                $resultElements['first_name'] ? "value='".$storeNV['first_name']."'" : 
                                                                "autofocus='autofocus' style='border:1px solid red;'"),">
                            <p class='inline red_text'>", (
                                !$resultElements['first_name'] ? $storeNV['first_name'] : ''),"</p>
                        </li>
                        <li>
                            <div class='center_label'>
                                <label for='last_name'>Last Name</label>
                            </div>
                            <input type='text' id='last_name' name='last_name' placeholder='Enter your last name' ",(
                                $resultElements['last_name'] ? "value='".$storeNV['last_name']."'" : "style='border:1px solid red;'"),">
                            <p class='inline red_text'>", (
                                !$resultElements['last_name'] ? $storeNV['last_name'] : ''),"</p>
                        </li>
                    </ul>
                </fieldset>
                <!-- fieldset for billing address and email address-->
                <fieldset id='address'>
                    <h2>Address:</h2>
                    <ul>
                        <li>
                            <div class='center_label'>
                                <label for='street_address'>Street</label>
                            </div>
                            <input type='text' id='street_address' name='street_address' placeholder='Enter your street address' ",(
                                $resultElements['street_address'] ? "value='".$storeNV['street_address']."'" : 
                                                                    "style='border:1px solid red;'"),">
                            <p class='inline red_text'>", (
                                !$resultElements['street_address'] ? $storeNV['street_address'] : ''),"</p>
                        </li>
                        <li>
                            <div class='center_label'>
                                <label for='city'>City</label>
                            </div>
                            <input type='text' id='city' name='city' placeholder='Enter your city' ",(
                                $resultElements['city'] ? "value='".$storeNV['city']."'" : "style='border:1px solid red;'"),">
                            <p class='inline red_text'>", (
                                !$resultElements['city'] ? $storeNV['city'] : ''),"</p>
                        </li>
                        <!-- this is where the javascript will generate all the states in the optgroup tag -->
                        <li>
                            <div class='center_label'>
                                <label for='state'>State</label>
                            </div>
                            <select id='state' name='state'>
                                <option id='selected_state' value='none' ",(
                                $resultElements['state'] ? "class='".$storeNV['state']."'" : ''),">Select a State</option>
                                <optgroup id='state_selection' label='US States'>
                                </optgroup>
                            </select>
                            <p class='inline red_text'>", (
                                !$resultElements['state'] ? $storeNV['state'] : ''),"</p>
                        </li>
                        <li>
                            <div class='center_label'>
                                <label for='zip_code'>Zip Code</label>
                            </div>
                            <input type='text' id='zip_code' name='zip_code' placeholder='12345' ",(
                                $resultElements['zip_code'] ? "value='".$storeNV['zip_code']."'" : 
                                                                "value='$zip_code' style='border:1px solid red;'"),">
                            <p class='inline red_text'>", (
                                !$resultElements['zip_code'] ? $storeNV['zip_code'] : ''),"</p>
                        </li>
                        <li>
                            <div class='center_label'>
                                <label for='email'>Email Address</label>
                            </div>
                            <input type='text' id='email' name='email' placeholder='username@example.com' ",(
                                $resultElements['email'] ? "value='".$storeNV['email']."'" : 
                                                                "value='$email' style='border:1px solid red;'"),">
                            <p class='inline red_text'>", (
                                !$resultElements['email'] ? $storeNV['email'] : ''),"</p>
                        </li>
                    </ul>
                </fieldset>
                <!-- fieldset for method of payment -->
                <fieldset id='pay_method'>
                    <h2>Payment method:</h2>
                    <p class='red_text'>", (
                                !$resultElements['payment'] ? $storeNV['payment'] : ''),"</p>
                    <ul>
                        <li>
                            <input type='radio' id='credit_card' name='payment' value='credit_card'",(
					           $storeNV['payment'] === 'credit_card' ? ' checked="checked"' : '')," />
                            <label for='credit_card'>Credit Card</label>
                        </li>
                        <li>
                            <input type='radio' id='paypal' name='payment' value='paypal'",(
					           $storeNV['payment'] === 'paypal' ? ' checked="checked"' : '')," />
                            <label for='paypal'>Paypal</label>
                        </li>
                    </ul>
                </fieldset>
                <!-- button for submitting form -->
                <div class='center'>
                    <input type='submit' id='submit_form' name='submit' value='Submit'>
                </div>
            </form>
        </main>
        <script src='js/states.js'></script>";
    } else {
        echo "
        <!-- creates a header for the page -->
        <header>
            <h1>Thank you!</h1>
        </header>
        <main>
            <article>
                <h2 id='confirmation_header'>Information Confirmation:</h2>
                <ul>
                    <li>
                        <div class='center_label'>
                            <p class='inline'>First Name:</p>
                        </div>
                        <p class='inline'>",$storeNV['first_name'],"</p>
                    </li>
                    <li>
                        <div class='center_label'>
                            <p class='inline'>Last Name:</p>
                        </div>
                        <p class='inline'>",$storeNV['last_name'],"</p>
                    </li>                    <li>
                        <div class='center_label'>
                            <p class='inline'>Address:</p>
                        </div>
                        <p class='inline'>",$storeNV['street_address'],"<br></p>
                        <p class='inline' id='valid_address'>",$storeNV['city'],", ",$storeNV['state']," ",$storeNV['zip_code'],"</p>
                    </li>                    
                    <li>
                        <div class='center_label'>
                            <p class='inline'>Email:</p>
                        </div>
                        <p class='inline'>",$storeNV['email'],"</p>
                    </li>                    <li>
                        <div class='center_label'>
                            <p class='inline'>Payment:</p>
                        </div>
                        <p class='inline'>",(
					       $storeNV['payment'] === 'credit_card' ? 'Credit Card' : 'Paypal'),"</p>
                    </li>
                </ul>
            </article>
        </main>";
        $history = fopen("history.txt", "a") or die("Unable to open file!");
        $date = date("YmdHis");
        $result = $date."|||".$storeNV['first_name']."|||".$storeNV['last_name']."|||".
            $storeNV['street_address']."|||".$storeNV['city']."|||".$storeNV['state']."|||".
            $storeNV['zip_code']."|||".$storeNV['email']."|||".$storeNV['payment']."\n";
        fwrite($history, $result);
        fclose($history);
    }
?> 