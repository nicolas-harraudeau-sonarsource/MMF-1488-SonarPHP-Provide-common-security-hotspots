<?php

use Cake\Utility\Security;
use Zend\Crypt\FileCipher;
use Zend\Crypt\PublicKey\DiffieHellman;
use Zend\Crypt\PublicKey\Rsa;
use Zend\Crypt\Hybrid;
use Zend\Crypt\BlockCipher;
use Illuminate\Support\Facades\Crypt;

function myEncrypt($cipher, $key, $data, $mode, $iv, $options, $padding, $infile, $outfile, $recipcerts, $headers, $nonce, $ad, $pub_key_ids, $env_keys, $engine, $prime, $generator, $lib)
{
    mcrypt_ecb ($cipher, $key, $data, $mode); // Questionable
    mcrypt_cfb($cipher, $key, $data, $mode, $iv); // Questionable
    mcrypt_cbc($cipher, $key, $data, $mode, $iv); // Questionable
    mcrypt_encrypt($cipher, $key, $data, $mode); // Questionable
    

    // http://php.net/manual/en/book.openssl.php
    openssl_encrypt($data, $cipher, $key, $options, $iv); // Questionable
    openssl_public_encrypt($data, $crypted, $key, $padding); // Questionable
    openssl_pkcs7_encrypt($infile, $outfile, $recipcerts, $headers); // Questionable
    openssl_seal($data, $sealed_data, $env_keys, $pub_key_ids); // Questionable
    
    // Used for signing data. This is a different Security Hotspot
    openssl_private_encrypt($data, $crypted, $key); // OK

    // http://php.net/manual/en/book.sodium.php
    sodium_crypto_aead_aes256gcm_encrypt ($data, $ad, $nonce, $key); // Questionable
    sodium_crypto_aead_chacha20poly1305_encrypt ($data, $ad, $nonce, $key); // Questionable
    sodium_crypto_aead_chacha20poly1305_ietf_encrypt ($data, $ad, $nonce, $key); // Questionable
    sodium_crypto_aead_xchacha20poly1305_ietf_encrypt ($data, $ad, $nonce, $key); // Questionable
    sodium_crypto_box_seal ($data, $key); // Questionable
    sodium_crypto_box ($data, $nonce, $key); // Questionable
    sodium_crypto_secretbox ($data, $nonce, $key); // Questionable
    sodium_crypto_stream_xor ($data, $nonce, $key); // Questionable


    // https://book.cakephp.org/3.0/en/core-libraries/security.html
    Security::encrypt($data, $key); // Questionable
    Security::engine($engine); // Questionable

    // https://docs.zendframework.com/zend-crypt/files/
    $fileCipher = new FileCipher; // Questionable. This is used to encrypt files

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
    $hybrid = new Hybrid();
    $hybrid->encrypt($data, $key); // Questionable

    // https://docs.zendframework.com/zend-crypt/block-cipher/
    BlockCipher::factory($lib, $options); // Questionable

    // https://laravel.com/docs/5.7/encryption
    Crypt::encryptString($data); // Questionable
    Crypt::encrypt($data); // Questionable
    // encrypt using the Laravel "encrypt" helper
    encrypt($data); // Questionable

}