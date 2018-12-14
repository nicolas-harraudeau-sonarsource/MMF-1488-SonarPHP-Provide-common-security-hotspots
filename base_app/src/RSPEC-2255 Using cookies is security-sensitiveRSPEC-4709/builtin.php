<?php

function handle_cookie($name) {
    global $HTTP_COOKIE_VARS;
    $value= "1234 1234 1234 1234"; 
    
    setcookie("CreditCardNumber", $value); // Questionable
    setrawcookie($name, $value); // Questionable

    $_COOKIE["name"]; // Questionable
    $HTTP_COOKIE_VARS["name"]; // Questionable

    // Unseting cookie values is fine
    unset($_COOKIE["cookie"]); // Compliant
    unset($HTTP_COOKIE_VARS["cookie"]); // Compliant
}