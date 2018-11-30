<?php
use phpseclib\Crypt\RSA;
use phpseclib\Crypt\AES;
use phpseclib\Crypt\Rijndael;
use phpseclib\Crypt\Twofish;
use phpseclib\Crypt\Blowfish;
use phpseclib\Crypt\RC4;
use phpseclib\Crypt\RC2;
use phpseclib\Crypt\TripleDES;
use phpseclib\Crypt\DES;

// https://github.com/phpseclib/phpseclib
function myphpseclib($mode) {
    new RSA(); // Questionable. Note: RSA can also be used for signing data.
    new AES(); // Questionable
    new Rijndael(); // Questionable
    new Twofish(); // Questionable
    new Blowfish(); // Questionable
    new RC4(); // Questionable
    new RC2(); // Questionable
    new TripleDES(); // Questionable
    new DES(); // Questionable

    new AES($mode); // Questionable
    new Rijndael($mode); // Questionable
    new TripleDES($mode); // Questionable
    new DES($mode); // Questionable
}