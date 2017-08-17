<?php ob_start(); ?>
<?php
include("dbConnect.php");

//$data = json_decode(file_get_contents("php://input"));

$Email=$_POST['email'];
$Password=$_POST['password'];

$result =	mysqli_query($conn,"SELECT HashedPassword FROM login WHERE Email='$Email' ");

				while($row = mysqli_fetch_array($result))
				  {
          $password_hash = $row['HashedPassword'];
				  }
					
					//http://php.net/manual/en/function.password-verify.php
			  if(hash_equals($password_hash, crypt($Password, $password_hash))){
					$IsValid = 'true';
				}else{
					$IsValid= 'false';
				}

				echo $IsValid;

exit;
?>
<?php ob_end_flush(); ?>
