<?php

use Defuse\Crypto\Crypto;
use Defuse\Crypto\File;

// https://github.com/defuse/php-encryption
function mypPhpEncryption($data, $key, $password, $inputFilename, $outputFilename, $inputHandle, $outputHandle) {
    Crypto::encrypt($data, $key); // Questionable
    Crypto::encryptWithPassword($data, $password); // Questionable
    File::encryptFile($inputFilename, $outputFilename, $key); // Questionable
    File::encryptFileWithPassword($inputFilename, $outputFilename, $password); // Questionable
    File::encryptResource($inputHandle, $outputHandle, $key); // Questionable
    File::encryptResourceWithPassword($inputHandle, $outputHandle, $password); // Questionable
}