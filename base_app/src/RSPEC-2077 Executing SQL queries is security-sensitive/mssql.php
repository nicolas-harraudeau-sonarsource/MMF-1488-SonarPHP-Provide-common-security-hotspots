<?php


// The functions are Questionable whatever their argument unless specified otherwise.

// Disable deprecation warning
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

function executeQuery($query) {
    mssql_query($query);
}