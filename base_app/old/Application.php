<?php
namespace App;

include "Regex.php";

class Application
{
    public static function main()
    {
        $hash_value = hash('ripemd160', 'The quick brown fox jumped over the lazy dog.');
        echo $hash_value . PHP_EOL;

        // $ctx = hash_init('md5', HASH_HMAC, '123');
        // hash_update($ctx, 'The quick brown fox ');
        // hash_update($ctx, 'jumped over the lazy dog.');
        // echo hash_final($ctx) . PHP_EOL;
        $op = openssl_pbkdf2("password", "123", 10, 42, "sha256");
        $ha = hash_pbkdf2("sha256", "password", "123", 42, 10, TRUE);
        echo ($op === $ha ? 'true' : 'false') . PHP_EOL;

        Regex::main();
    }
}
