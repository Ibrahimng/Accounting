<?php ob_start(); ?>
<?php
include("dbConnect.php");

$data = json_decode(file_get_contents("php://input"));

$Email=$data->email;
$Password=$data->password;


$result =	mysqli_query($conn,"SELECT HashedPassword FROM login WHERE Email='$Email' ");

				while($row = mysqli_fetch_array($result))
				  {
				  //$loginId = $row['Email'];
          $password_hash = $row['HashedPassword'];
				  }
					//http://php.net/manual/en/function.password-verify.php
				if (password_verify($Password, $password_hash))
				{
          echo "true";
				}
				else
				{
					echo "false";
				}
?>
