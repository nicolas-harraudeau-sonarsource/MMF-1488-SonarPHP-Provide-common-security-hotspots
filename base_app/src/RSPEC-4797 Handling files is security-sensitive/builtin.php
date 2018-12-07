<?php

function handle_file($filename, $directory, $group, $data, $mode, $flags, $use_include_path, $pattern, $recursive, $context)
{

    // http://php.net/manual/en/ref.filesystem.php

    file_put_contents($filename, $data, $flags); // Questionable
    copy($filename, $filename); // Questionable
    tmpfile(); // Questionable
    parse_ini_file($filename); // Questionable

    // The following calls will raise an issue if and only if the $filename or $directory is not hardcoded
    move_uploaded_file($filename, $filename); // Questionable
    rmdir($directory); // Questionable
    unlink($filename); // Questionable

    $hardcoded_path = "mypath";
    move_uploaded_file($hardcoded_path, $hardcoded_path); // Compliant
    rmdir($hardcoded_path); // Compliant
    unlink($hardcoded_path); // Compliant

    // The following functions can also be used to perform network requests (http, socket, ftp, etc...)
    // in some case they won't raise issues, see below.
    file_get_contents($filename, $use_include_path); // Questionable
    file($filename, $flags); // Questionable
    fopen($filename, $mode, $use_include_path); // Questionable
    readfile($filename, $use_include_path); // Questionable

    // No issue is raised if the source path is hardcoded and contains '://' and it doesn't start
    // with one of the following 'file://', 'compress.zlib://', 'compress.bzip2://', 'zip://',
    // 'glob://', 'rar://', 'ogg://'
    $hardcoded_path = "http://example.com";
    file_get_contents($hardcoded_path, $use_include_path); // Compliant
    file($hardcoded_path, $flags); // Compliant
    fopen($hardcoded_path, $mode, $use_include_path); // Compliant
    readfile($hardcoded_path, $use_include_path); // Compliant

    // No issue is created if a context is given as there is a high chance that it is not a filesystem access.
    // Note that this will create some false negatives with "zip" contexts.
    file_get_contents($filename, $use_include_path, $context); // Compliant
    file($filename, $flags, $context); // Compliant
    fopen($filename, $mode, $use_include_path, $context); // Compliant
    readfile($filename, $use_include_path, $context); // Compliant
}
