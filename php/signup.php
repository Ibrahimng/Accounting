<?php ob_start(); ?>
<?php
include("dbConnect.php");
 //This gets all the other information from the form
 $data = json_decode(file_get_contents("php://input"));

 $Name=$data->name;
 $Email=$data->email;
 $Password=$data->password;
 $Mobile=$data->mobile;
 $UpdatedBy=$data->updatedBy;

 $HashedPassword= password_hash('$Password', PASSWORD_DEFAULT, ['cost' => 10]);

 // Connects to your Database
 //$con = mysqli_connect('localhost', 'root', '', 'billing');
 //Writes the information to the database
 mysqli_query($conn,"INSERT INTO login (Email,Name,HashedPassword,Mobile,UpdatedDate,UpdatedBy)
		 VALUES ('$Email','$Name','$HashedPassword','$Mobile',now(),'$UpdatedBy')");

 header("Location: ../main.php");
//echo "true";
exit;
 ?>
<?php ob_end_flush(); ?>
