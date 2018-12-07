<?php
// https://www.loggly.com/ultimate-guide/php-logging-libraries/

// Defining custom loggers
abstract class MyLogger implements Psr\Log\LoggerInterface { // Questionable
    // ...
}

abstract class MyLogger2 extends Psr\Log\AbstractLogger { // Questionable
    // ...
}

abstract class MyLogger3 {
    use Psr\Log\LoggerTrait; // Questionable
    // ...
}