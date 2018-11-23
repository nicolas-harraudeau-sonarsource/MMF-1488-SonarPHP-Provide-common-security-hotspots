<?php

// The functions are Questionable whatever their argument unless specified otherwise.

// Disable deprecation warning
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

function executePostgresQuery($conn, $query) {
    $result = pg_query($query); // Questionable
    assert(!!$result, "Database Query failed.\n");
    $result = pg_query($conn, $query); // Questionable
    pg_send_query ($conn, $query); // Questionable

    $hard_coded_query = 'INSERT INTO test (ID) VALUES (1)';
    pg_send_query ($conn, $hard_coded_query); // OK
    pg_query($hard_coded_query); // OK
    pg_query($conn, $hard_coded_query); // OK

    $cond = array('id'=>'1');
    $data = array('id'=>'2');
    $result = pg_update($conn, 'test', $data, $cond); // Questionable
}


$conn = pg_pconnect("host=127.0.0.1 port=5432 user=root password=example dbname=postgres");
if (!$conn) {
  echo "An error occurred.\n";
  exit;
}

pg_query($conn, 'DROP TABLE IF EXISTS Test;');
pg_query($conn, 'CREATE TABLE test (id int);');

executePostgresQuery($conn, 'SELECT * from test');