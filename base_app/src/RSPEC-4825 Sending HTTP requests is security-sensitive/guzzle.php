<?php

require_once 'vendor/autoload.php';

// http://docs.guzzlephp.org/en/stable/quickstart.html#making-a-request

function guzzle($url)
{
    $client = new GuzzleHttp\Client(); // Questionable
    $res = $client->request('GET', $url, [
        'auth' => ['user', 'pass'],
    ]); // OK as an issue was already created on the Client
    echo $res->getBody();
}

guzzle('http://example.com');
