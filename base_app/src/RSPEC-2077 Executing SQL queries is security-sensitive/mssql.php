<?php


// The functions are Questionable whatever their argument unless specified otherwise.

function executeQuery($query) {
    mssql_query($query); // Questionable

    $hardcoded = "SELECT * FROM mytable";
    mssql_query($hardcoded); // OK
}