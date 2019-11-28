<?php
$act="Aq";
#$received = file_get_contents('php://input');
$h = fopen('act.txt','w');
fwrite($h,$act);
