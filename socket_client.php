<?php

send_message('127.0.0.1', '8007', 'Message to send...');

function send_message($ipServer, $portServer, $message)
{
    $fp = stream_socket_client("tcp://$ipServer:$portServer", $errno, $errstr);
    if (!$fp) {
        echo "ERREUR : $errno - $errstr<br />\n";
    } else {
        fwrite($fp, "$message\n");
        $response = fread($fp, 2);
        if ($response != "OK") {
            echo 'The command couldn\'t be executed...\ncause :' . $response;
        } else {
            echo 'Execution successfull...';
            echo fread($fp, 1024);
        }
        fclose($fp);
    }
}