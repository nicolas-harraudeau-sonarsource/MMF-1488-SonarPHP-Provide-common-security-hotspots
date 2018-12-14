<?php

use Joomla\Crypt\CipherInterface;

// https://github.com/joomla-framework/crypt

abstract class MyCipher implements CipherInterface // Questionable. Implementing custom cipher class
{}

function joomlaEncrypt() {
    new Joomla\Crypt\Cipher_Sodium(); // Questionable
    new Joomla\Crypt\Cipher_Simple(); // Questionable
    new Joomla\Crypt\Cipher_Rijndael256(); // Questionable
    new Joomla\Crypt\Cipher_Crypto(); // Questionable
    new Joomla\Crypt\Cipher_Blowfish(); // Questionable
    new Joomla\Crypt\Cipher_3DES(); // Questionable
}