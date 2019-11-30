<?php
$received = file_get_contents('php://input');


$token= $_POST['token'];
echo $token;
echo $token.": POSt";
file_put_contents("token.txt", $token);

$token= $_GET['token'];
echo $token.": GET";

$received = file_get_contents('php://input');
$timeNow = date("F j, Y, g:i a");
$subject = "Email Subject - ".time();
 
$bound_text = "----*%$!$%*";
$bound = "--".$bound_text."\r\n";
$bound_last = "--".$bound_text."--\r\n";
 
$headers = "From: biochamada@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n" .
"Content-Type: multipart/mixed; boundary=\"$bound_text\""."\r\n" ;
$message =
'Content-Type: text/html; charset=UTF-8'."\r\n".
'Content-Transfer-Encoding: 7bit'."\r\n\r\n".
'
<html>
<head>
</head>
<body>
</body>
</html>'."\n\n".
$bound;
 
$message .= "Content-Type: image/jpeg; name=\"filename.jpg\"\r\n"
."Content-Transfer-Encoding: base64\r\n"
."Content-ID: <filename.jpg>\r\n"
."\r\n"
.chunk_split(base64_encode($received))
.$bound_last;
 
echo mail('biochamada@gmail.com', $subject, $message, $headers);