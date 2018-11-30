<?php
// http://php.net/manual/en/ref.filesystem.php
// http://php.net/manual/en/function.stream-get-contents.php

// Any reference to STDIN is questionable
$varstdin = STDIN; // Questionable
stream_get_line(STDIN, 40); // Questionable
stream_copy_to_stream(STDIN, STDOUT); // Questionable
fread(STDIN, 2); // Questionable
fpassthru(STDIN); // Questionable
stream_get_contents(STDIN, 1); // Questionable
fgetc(STDIN); // Questionable
fgets(STDIN); // Questionable
fgetss(STDIN); // Questionable
$number = 42;
fscanf(STDIN, "%d\n", $number); // Questionable
stream_get_contents(STDIN, 1); // Questionable
fgetcsv(STDIN); // Questionable


// Except those references
ftruncate(STDIN, 5); // OK
ftell(STDIN); // OK
feof(STDIN); // OK
fseek(STDIN, 5); // OK
fclose(STDIN); // OK


// STDIN can also be referenced like this
$mystdin = 'php://stdin';

file_get_contents($mystdin); // Questionable
readfile($mystdin); // Questionable

$input = fopen($mystdin, 'r'); // Questionable
fclose($input); // OK