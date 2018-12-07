<?php

// http://php.net/manual/en/book.curl.php

$url = 'http://example.com';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//Execute the request.
$data = curl_exec($ch); // Questionable
//Close the cURL handle.
curl_close($ch);