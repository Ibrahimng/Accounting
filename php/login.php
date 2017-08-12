<?php ob_start(); ?>
<?php
include("dbConnect.php");

$data = json_decode(file_get_contents("php://input"));

$Email=$data->userName;
$Password=$data->password;
$HashedPassword= password_hash('$Password', PASSWORD_DEFAULT, ['cost' => 10]);

$result =	mysqli_query($conn,"SELECT * FROM login WHERE Email='$Email' ");
				//$password="Admin@123";

				while($row = mysqli_fetch_array($result))
				  {
				  $loginId = $row['Email'];
          $password = $row['HashedPassword'];
				  }

				if (password_verify($password, $HashedPassword))
				{
					header("Location: ../main.php");
          echo="true";
				}
				else
				{
					header('location:../index.html?err=1');
				}
?>
