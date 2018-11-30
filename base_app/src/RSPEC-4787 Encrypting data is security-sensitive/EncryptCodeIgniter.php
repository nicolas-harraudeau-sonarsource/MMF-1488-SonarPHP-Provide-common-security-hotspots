<?php

// The functions are Questionable whatever their argument unless specified otherwise.

// https://www.codeigniter.com/user_guide/libraries/encryption.html
class EncryptionController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
    }

    public function index()
    {

        // Note: for this framework we raise issues on key creation as it is not provided to the "encrypt" function but stored instead in "application/config/config.php".
        $this->encryption->hkdf(
            $key,
            'sha512',
            NULL,
            NULL,
            'authentication'
        );
        $this->encryption->create_key(16); // Questionable. Calling "encryption->create_key". Review the key length.
        $this->encryption->initialize( // Questionable. Calling "encryption->initialize"
            array(
                'cipher' => 'aes-256',
                'mode' => 'ctr',
                'key' => 'the key',
            )
        );
        $this->encryption->encrypt("mysecretdata"); // Questionable. Calling "encryption->encrypt"



    }
}
