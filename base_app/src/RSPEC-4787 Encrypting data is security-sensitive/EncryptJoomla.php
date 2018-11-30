<?php

use Joomla\Crypt\CipherInterface;
use Joomla\Crypt\Cipher_Sodium;
use Joomla\Crypt\Cipher_Simple;
use Joomla\Crypt\Cipher_Rijndael256;
use Joomla\Crypt\Cipher_Crypto;
use Joomla\Crypt\Cipher_Blowfish;
use Joomla\Crypt\Cipher_3DES;


// https://github.com/joomla-framework/crypt

abstract class MyCipher implements CipherInterface // Questionable. Implementing custom cipher class
{}

function joomlaEncrypt() {
    new Cipher_Sodium(); // Questionable
    new Cipher_Simple(); // Questionable
    new Cipher_Rijndael256(); // Questionable
    new Cipher_Crypto(); // Questionable
    new Cipher_Blowfish(); // Questionable
    new Cipher_3DES(); // Questionable
}