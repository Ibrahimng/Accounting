<?php
$data = json_decode(file_get_contents("php://input"));

$con = mysqli_connect('localhost', 'root', '', 'billing');
mysqli_query($con,"");
password_verify();
echo $data->email;
?>
