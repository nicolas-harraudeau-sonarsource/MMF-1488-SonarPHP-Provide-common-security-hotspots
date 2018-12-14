<?php

use GetOptionKit\OptionCollection;
use GetOptionKit\OptionParser;
use GetOptionKit\OptionPrinter\ConsoleOptionPrinter;

$specifications = new OptionCollection;
$specifications->add('f|foo:', 'an option.' )
    ->isa('String');

$specifications->add('v|verbose', 'print more information.' );

$optionPrinter = new ConsoleOptionPrinter();
echo $optionPrinter->render($specifications);

$optionParser = new OptionParser($specifications);

echo "Enabled options: \n";
try {
    $result = $optionParser->parse( $argv ); // This one is ok as it needs $argv. Thus nothing special for this library
    foreach ($result->keys as $key => $spec) {
        print_r($spec);
    }

    $opt = $result->keys['foo']; // return the option object.
    $str = $result->keys['foo']->value; // return the option value
    
    print_r($opt);
    var_dump($str);
    
} catch( Exception $e ) {
    echo $e->getMessage();
}