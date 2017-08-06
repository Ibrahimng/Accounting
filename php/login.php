<?php
$data = json_decode(file_get_contents("php://input"));
$salt = bin2hex(mcrypt_create_iv(32,MCRYPT_DEV_URANDOM));
$hashedPwd = hash('sha256',$salt.$data.password);
echo $hashedPwd;
?>
