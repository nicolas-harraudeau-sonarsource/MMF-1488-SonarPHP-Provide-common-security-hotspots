<?php

require_once "/path/to/sodium_compat/autoload.php";

function mySodiumCompatEncrypt($data, $ad, $nonce, $key) {
    ParagonIE_Sodium_Compat::crypto_aead_chacha20poly1305_ietf_encrypt($data, $ad, $nonce, $key); // Questionable
    ParagonIE_Sodium_Compat::crypto_aead_xchacha20poly1305_ietf_encrypt($data, $ad, $nonce, $key); // Questionable
    ParagonIE_Sodium_Compat::crypto_aead_chacha20poly1305_encrypt($data, $ad, $nonce, $key); // Questionable
    
    ParagonIE_Sodium_Compat::crypto_aead_aes256gcm_encrypt($data, $ad, $nonce, $key); // Questionable

    ParagonIE_Sodium_Compat::crypto_box($data, $nonce, $key); // Questionable
    ParagonIE_Sodium_Compat::crypto_secretbox($data, $nonce, $key); // Questionable
    ParagonIE_Sodium_Compat::crypto_box_seal($data, $key); // Questionable
    ParagonIE_Sodium_Compat::crypto_secretbox_xchacha20poly1305($data, $nonce, $key); // Questionable
}