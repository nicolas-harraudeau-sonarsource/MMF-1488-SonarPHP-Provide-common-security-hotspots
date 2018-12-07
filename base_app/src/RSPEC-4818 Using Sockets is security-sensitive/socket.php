<?php

function handle_sockets($domain, $type, $protocol, $port, $backlog, $addr, $hostname, $local_socket, $remote_socket, $fd) {
    // http://php.net/manual/en/ref.sockets.php
    socket_create($domain, $type, $protocol); // Questionable
    socket_create_listen($port, $backlog); // Questionable
    socket_addrinfo_bind($addr); // Questionable
    socket_addrinfo_connect($addr); // Questionable
    socket_create_pair($domain, $type, $protocol, $fd);

    // http://php.net/manual/en/ref.stream.php
    fsockopen($hostname); // Questionable
    pfsockopen($hostname); // Questionable
    stream_socket_server($local_socket); // Questionable
    stream_socket_client($remote_socket); // Questionable
    stream_socket_pair($domain, $type, $protocol); // Questionable
}