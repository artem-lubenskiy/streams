<?php
$socket = stream_socket_server("tcp://0.0.0.0:8007", $errno, $errstr);

if (!$socket) {
    die("$errstr ($errno)\n");
}

while ($connect = stream_socket_accept($socket, -1)) {
    $headers = "HTTP/1.1 200 OK\r\nContent-Type: text/html\r\nConnection: close\r\n\r\n Hello";
    fwrite($connect, $headers);
    fclose($connect);
}

fclose($socket);