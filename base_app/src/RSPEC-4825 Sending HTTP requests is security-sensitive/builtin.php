<?php

function sendHttpRequest($url) {

    // http://php.net/manual/en/ref.filesystem.php
    $opts = array(
        // Questionable when 'http' is in a context given to stream_context_set_default.
        // No issue is created when given to stream_context_create as an issue is already
        // created on the function using the created context.
        'http' => array(
            'method' => "GET",
        ),
    );

    stream_context_set_default($opts);
    $context = stream_context_create($opts);
    $hardCodedURL = 'http://example.com';
    $hardCodedURL = 'https://example.com'; // same for https
    
    // The following are questionable when used with a hard coded http or https url. The limitation is to avoid False positives.
    file_get_contents($hardCodedURL); // Questionable
    fopen($hardCodedURL, 'r');  // Questionable
    readfile($hardCodedURL); // Questionable
    copy($hardCodedURL, 'test.txt'); // Questionable
    file($hardCodedURL); // Questionable

    // Some of these function also accept a context. When this context is an 'http' context. See above.
    file_get_contents($url, false, $context); // Questionable
    fopen($url, 'r', false, $context); // Questionable
    file($url, 0, $context); // Questionable
    readfile($hardCodedURL, False, $context); // Questionable


    // http://php.net/manual/en/ref.url.php
    get_headers($url); // Questionable
    get_meta_tags($hardCodedURL); // Questionable, when used with a hard coded http or https url. The limitation is to avoid False positives.
    
}

// function sendHttpRequest2($url) {
//     $opts = array(
//         'http' => array( // Questionable when given to stream_context_set_default
//             'method' => "PUT",
//         ),
//     );
//     $context = stream_context_create($opts);
//     $pwd = '/Users/nicolasharraudeau/sonarsource/MMF/MMF-1488-SonarPHP_Provide_common_security_hotspots/code/base_app';
//     var_dump(readfile($url, False, $context));
// }

// sendHttpRequest2('http://example.com');