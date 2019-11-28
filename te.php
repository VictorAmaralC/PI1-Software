<?php
$received = file_get_contents('php://input');
$h= fopen('token.txt','r');

file_put_contents("token.txt", $token);
while(!feof($h)){
    echo fgets($h);
}

fclose($h);