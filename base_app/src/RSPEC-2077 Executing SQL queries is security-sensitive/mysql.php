<?php

// The functions are Questionable whatever their argument unless specified otherwise.

function executeMysqlQuery($query, $database)
{
    mysql_query($query); // Questionable
    mysql_db_query($database, $query); // Questionable
    mysql_unbuffered_query($query); // Questionable

    $hard_coded_query = "select * from db";
    mysql_query($hard_coded_query); // OK
    mysql_query($hard_coded_query); // OK
    mysql_db_query($database, $hard_coded_query); // OK
    mysql_unbuffered_query($hard_coded_query); // OK

    $concatenated_query = "select * from db".$query;
    mysql_query($concatenated_query); // Questionablei
    mysql_query($concatenated_query); // Questionable
    mysql_db_query($database, $concatenated_query); // Questionable
    mysql_unbuffered_query($concatenated_query); // Questionable
}