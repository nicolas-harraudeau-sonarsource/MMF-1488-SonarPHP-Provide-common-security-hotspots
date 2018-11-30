<?php

function myEncrypt($cipher, $key, $data, $mode, $iv, $options, $padding, $infile, $outfile, $recipcerts, $headers, $nonce, $ad, $pub_key_ids, $env_keys)
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
}