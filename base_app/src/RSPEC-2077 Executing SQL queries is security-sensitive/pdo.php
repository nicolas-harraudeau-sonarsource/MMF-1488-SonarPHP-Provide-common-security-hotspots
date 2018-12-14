<?php

function executePDOQuery($dsn, $user, $password, $statement, $type, $obj) {
    $conn = new PDO($dsn, $user, $password);
    $conn->query($statement); // Questionable
    $conn->query($statement, PDO::FETCH_COLUMN, 42); // Questionable
    $conn->query($statement, PDO::FETCH_CLASS, 'MyClass'); // Questionable
    $conn->query($statement, PDO::FETCH_INTO, $obj); // Questionable

    $conn->prepare($statement);
    $conn->exec($statement);
}