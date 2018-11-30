<?php

function globfunc() {
    global $argv; // Questionable. Reference to global $argv
    foreach ($argv as $arg) { // Questionable.
        // ...
    }
}

function myfunc($argv) {
    $param = $argv[0]; // OK. Reference to local $argv parameter
    // ...
}

foreach ($argv as $arg) { // Questionable. Reference to $argv.
    // ...
}

$myargv = $_SERVER['argv']; // Questionable. Equivalent to $argv.

function serve() {
    $myargv = $_SERVER['argv']; // Questionable.
    // ...
}

myfunc($argv); // Questionable

$myvar = $HTTP_SERVER_VARS[0]; // Questionable. Note: HTTP_SERVER_VARS has ben removed since PHP 5.4.

$options = getopt('a:b:'); // Questionable. Parsing arguments.

$GLOBALS["argv"]; // Questionable. Equivalent to $argv.

function myglobals() {
    $GLOBALS["argv"]; // Questionable
}

$argv = [1,2,3]; // Questionable. It is a bad idea to override argv.