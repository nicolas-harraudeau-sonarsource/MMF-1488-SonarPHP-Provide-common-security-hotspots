<?php

use Illuminate\Support\Facades\Crypt;

// Note: the encryption key is stored in config/app.php
function myLaravelEncrypt($data)
{
    // https://laravel.com/docs/5.7/encryption
    Crypt::encryptString($data); // Questionable
    Crypt::encrypt($data); // Questionable
    // encrypt using the Laravel "encrypt" helper
    encrypt($data); // Questionable
}