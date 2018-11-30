<?php

use Zend\Crypt\FileCipher;
use Zend\Crypt\PublicKey\DiffieHellman;
use Zend\Crypt\PublicKey\Rsa;
use Zend\Crypt\Hybrid;
use Zend\Crypt\BlockCipher;

function myZendEncrypt($key, $data, $prime, $options, $generator, $lib)
{
    // https://docs.zendframework.com/zend-crypt/files/
    new FileCipher; // Questionable. This is used to encrypt files

    // https://docs.zendframework.com/zend-crypt/public-key/
    new DiffieHellman($prime, $generator, $key); // Questionable

    $rsa = Rsa::factory([ // Questionable
        'public_key'    => 'public_key.pub',
        'private_key'   => 'private_key.pem',
        'pass_phrase'   => 'mypassphrase',
        'binary_output' => false,
    ]);
    $rsa->encrypt($data); // OK. The configuration of the Rsa object is the line to review

    // https://docs.zendframework.com/zend-crypt/hybrid/
    $hybrid = new Hybrid(); // Questionable
    $hybrid->encrypt($data, $key); // OK. The Hybrid creation has already raised an issue.

    // https://docs.zendframework.com/zend-crypt/block-cipher/
    BlockCipher::factory($lib, $options); // Questionable
}