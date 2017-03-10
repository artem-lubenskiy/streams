<?php
$socket = stream_socket_server("tcp://0.0.0.0:8007", $errno, $errstr);

if (!$socket) {
    die("$errstr ($errno)\n");
}

while ($connect = stream_socket_accept($socket, -1)) {
    $name = stream_socket_get_name($connect, true);
    $headers = "OK\n Hello $name \n";
    fwrite($connect, $headers);
    fclose($connect);
}

fclose($socket);