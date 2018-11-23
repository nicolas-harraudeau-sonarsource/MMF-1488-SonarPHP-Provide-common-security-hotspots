<?php

// The functions are Questionable whatever their argument unless specified otherwise.

function executePostgresQuery($conn, $query, $tableName) {
    pg_query($query); // Questionable
    pg_query($conn, $query); // Questionable
    pg_send_query ($conn, $query); // Questionable

    // Hard coded query without any concatenation
    $hard_coded_query = 'INSERT INTO test (ID) VALUES (1)';
    pg_send_query ($conn, $hard_coded_query); // OK
    pg_query($hard_coded_query); // OK
    pg_query($conn, $hard_coded_query); // OK

    $concatenated_query = 'INSERT INTO test (ID) VALUES ('. $query .')';
    pg_send_query ($conn, $concatenated_query); // Questionable
    pg_query($concatenated_query); // Questionable
    pg_query($conn, $concatenated_query); // Questionable

    $cond = array('id'=>'1');
    $data = array('id'=>'2');
    pg_update($conn, $tableName, $data, $cond); // Questionable
}