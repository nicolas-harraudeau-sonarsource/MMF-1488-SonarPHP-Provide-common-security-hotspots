<?php

//
// DO NOT IMPLEMENT THIS.
//


// Hereo is the total list of functions we could highlight. But we don't highlight them all as it would create too many issues.
// These functions are usually accompanied by file writing/reading/creation functions, which are already creating issues.
function handle_file_out_of_scope($filename, $directory, $group, $mode, $flags, $use_include_path, $pattern)
{
    // http://php.net/manual/en/ref.filesystem.php

    // the following functions are questionable if the filename is not hardcoded.
    chgrp($filename, $group); // Questionable.
    chmod($filename, $mode); // Questionable.
    chown($filename, $user); // Questionable.

    // The following functions could be used to check if a directory or file exists.
    disk_free_space($directory); // Questionable.
    diskfreespace($directory); // Questionable.
    disk_total_space($directory); // Questionable.
    file_exists($filename); // Questionable.
    fileatime($filename);
    filegroup($filename);
    fileinode($filename);
    filemtime($filename);
    fileowner($filename);
    fileperms($filename);
    filesize($filename);
    filetype($filename);
    glob($pattern);
    is_dir($directory);
    is_executable($filename);
    is_file($filename);
    is_link($filename);
    is_readable($filename);
    // is_uploaded_file($filename);
    is_writable($filename);
    is_writeable($filename);
    lchgrp($filename, $group);
    lchown($filename, $user);
    link($target, $link);
    linkinfo($path);
    lstat($filename);
    move_uploaded_file($filename, $destination);
    parse_ini_file($filename);
    stat($filename);
    symlink($target, $link);
    touch($filename);
    realpath($filename);

    readlink($path);

    // It could be used to check if a given directory exists.
    tempnam($dir, $prefix);

    // The following functions can also be used to perform network requests (http, socket, ftp, etc...)
    // In order to avoid duplicate issues with the corresponding rules no issue should be created
    // if the path or the context indicate that this is a network operation
    copy($source, $dest, $context);
    file_get_contents($filename, $use_include_path, $context);
    file_put_contents($filename, $data, $flags, $context);
    file($filename, $flags, $context);
    fopen($filename, $mode, $use_include_path, $context);
    mkdir($pathname, $mode, $recursive, $context);
    readfile($filename, $use_include_path, $context);
    rename($oldname, $newname, $context);

    rmdir($dirname, $context);
    unlink($filename, $context);


    // Review what data is read or written in those files
    tmpfile();

    // http://php.net/manual/en/ref.dir.php
    chdir($directory);
    chroot($directory);
    dir($directory);
    getcwd();
    opendir($path);
    scandir($directory);


    // http://php.net/manual/en/spl.iterators.php    
    new DirectoryIterator($directory); // Questionable
    new FilesystemIterator($directory);
    new GlobIterator($directory);
    new RecursiveDirectoryIterator($directory);


}