<?php

// The functions are Questionable whatever their argument unless specified otherwise.

// Disable deprecation warning and NOTICEs that query result are not fetched
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

function executeMysqlQuery($query)
{
    $errorMessage = "Database Query failed.\n";

    $result = mysql_query($query); // Questionable
    assert(!!$result, $errorMessage);
    $result = mysql_db_query('mysql', $query); // Questionable
    assert(!!$result, $errorMessage);
    $result = mysql_unbuffered_query($query); // Questionable
    assert(!!$result, $errorMessage);

    $hard_coded_query = "select * from db";
    $result = mysql_query($hard_coded_query); // OK
    $result = mysql_query($hard_coded_query); // OK
    mysql_db_query('mysql', $hard_coded_query); // OK
    mysql_unbuffered_query($hard_coded_query); // OK

    assert(!!$result, $errorMessage);
}


if (version_compare(PHP_VERSION, '7.0', '<')) {
    $link = mysql_connect('127.0.0.1', 'root', 'example');
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    $db_selected = mysql_select_db('mysql', $link);
    if (!$db_selected) {
        die ('Can\'t use mysql : ' . mysql_error());
    }
    executeMysqlQuery('select * from db');
    mysql_close($link);
}
