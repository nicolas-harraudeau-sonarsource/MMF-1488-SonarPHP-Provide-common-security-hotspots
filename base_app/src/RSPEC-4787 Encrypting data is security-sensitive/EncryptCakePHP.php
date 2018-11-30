<?php

use Cake\Utility\Security;

function myCakeEncrypt($key, $data, $engine)
{
    // https://book.cakephp.org/3.0/en/core-libraries/security.html
    Security::encrypt($data, $key); // Questionable
    
    // Do not use custom made engines and remember that Mcrypt is deprecated.
    Security::engine($engine); // Questionable. Setting the encryption engine.
}