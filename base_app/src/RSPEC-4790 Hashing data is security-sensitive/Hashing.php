<?php

// The functions are Questionable whatever their argument unless specified otherwise.

// Disable deprecation warning
error_reporting(E_ALL ^ E_DEPRECATED);

function hashData($data, $salt) {
    hash("md5", $data); // Questionable
    
    hash_init("md5"); // Questionable
    hash_init("md5", HASH_HMAC, "mykey"); // OK

    crypt($data, $salt); // Questionable
    password_hash($data, PASSWORD_DEFAULT); // Questionable
    hash_pbkdf2("sha256", $data, $salt, 42); // Questionable
    openssl_pbkdf2($data, $salt, 42, 42); // Questionable
    md5($data); // Questionable
    sha1($data); // Questionable
}

hashData('sensitive data', 'mysalt');