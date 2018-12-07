<?php
// https://www.loggly.com/ultimate-guide/php-logging-basics/

// The functions are Questionable whatever their argument unless specified otherwise.

function configure_logging() {

    // http://php.net/manual/en/function.error-reporting.php
    error_reporting(E_ALL); // Questionable

    // http://php.net/manual/en/errorfunc.configuration.php

    // It is recommended to set log_errors_max_length to 0, which means unlimited
    ini_set('log_errors_max_length', '1'); // Questionable
    // it is recommended to set error_reporting to 'E_ALL' or '32767' 
    ini_set('error_reporting', 'NULL'); // Questionable
    // Check that the log file is safe
    ini_set('error_log', "path/to/logfile"); // Questionable

    // The following calls are questionable for these exact values as they are either dangerous or not recommended
    ini_set('docref_root', '1'); // Questionable
    ini_set('display_errors', '1'); // Questionable
    ini_set('display_startup_errors', '1'); // Questionable
    ini_set('log_errors', '0'); // Questionable
    ini_set('ignore_repeated_errors', '1'); // Questionable
    ini_set('ignore_repeated_source', '0'); // Questionable
    ini_set('track_errors', '0'); // Questionable

    // Same is true for ini_alter which is an alias of ini_set
    ini_alter('log_errors_max_length', '1'); // Questionable
    ini_alter('error_reporting', 'NULL'); // Questionable
    ini_alter('error_log', "path/to/logfile"); // Questionable
    ini_alter('docref_root', '1'); // Questionable
    ini_alter('display_errors', '1'); // Questionable
    ini_alter('display_startup_errors', '1'); // Questionable
    ini_alter('log_errors', '0'); // Questionable
    ini_alter('ignore_repeated_errors', '1'); // Questionable
    ini_alter('ignore_repeated_source', '0'); // Questionable
    ini_alter('track_errors', '0'); // Questionable
}

