<?php

function executeMysqliQuery($statement, $column) {
    // Object oriented style
    $mysqli = new mysqli("localhost", "myUser", "myPassword", "myDatabase");
    $mysqli->query($statement); // Questionable
    $mysqli->real_query($statement); // Questionable
    $mysqli->multi_query($statement); // Questionable
    $mysqli->send_query($statement); // Questionable. Plus this method has been removed as of PHP 5.3.0
 
    // Procedural style
    $link = mysqli_connect("localhost", "myUser", "myPassword", "myDatabase");
    mysqli_query($link, $statement); // Questionable
    mysqli_real_query($link, $statement); // Questionable
    mysqli_multi_query($link, $statement); // Questionable
    mysqli_send_query($link, $statement); // Questionable


    $hardcoded = 'SELECT * from mytable';

    $mysqli->query($hardcoded); // Compliant
    $mysqli->real_query($hardcoded); // Compliant
    $mysqli->multi_query($hardcoded); // Compliant
    $mysqli->send_query($hardcoded); // Compliant
    mysqli_query($link, $hardcoded); // Compliant
    mysqli_real_query($link, $hardcoded); // Compliant
    mysqli_multi_query($link, $hardcoded); // Compliant
    mysqli_send_query($link, $hardcoded); // Compliant


    $dangerous_hardcoded = "SELECT $column from mytable"; // The string contains a variable

    $mysqli->query($dangerous_hardcoded); // Questionable
    $mysqli->real_query($dangerous_hardcoded); // Questionable
    $mysqli->multi_query($dangerous_hardcoded); // Questionable
    $mysqli->send_query($dangerous_hardcoded); // Questionable.
    mysqli_query($link, $dangerous_hardcoded); // Questionable
    mysqli_real_query($link, $dangerous_hardcoded); // Questionable
    mysqli_multi_query($link, $dangerous_hardcoded); // Questionable
    mysqli_send_query($link, $dangerous_hardcoded); // Questionable
}
