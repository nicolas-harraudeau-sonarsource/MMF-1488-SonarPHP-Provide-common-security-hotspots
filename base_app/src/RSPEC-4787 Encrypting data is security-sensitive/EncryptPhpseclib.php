<?php

// https://github.com/phpseclib/phpseclib
function myphpseclib($mode) {
    new phpseclib\Crypt\RSA(); // Questionable. Note: RSA can also be used for signing data.
    new phpseclib\Crypt\AES(); // Questionable
    new phpseclib\Crypt\Rijndael(); // Questionable
    new phpseclib\Crypt\Twofish(); // Questionable
    new phpseclib\Crypt\Blowfish(); // Questionable
    new phpseclib\Crypt\RC4(); // Questionable
    new phpseclib\Crypt\RC2(); // Questionable
    new phpseclib\Crypt\TripleDES(); // Questionable
    new phpseclib\Crypt\DES(); // Questionable

    new phpseclib\Crypt\AES($mode); // Questionable
    new phpseclib\Crypt\Rijndael($mode); // Questionable
    new phpseclib\Crypt\TripleDES($mode); // Questionable
    new phpseclib\Crypt\DES($mode); // Questionable
}