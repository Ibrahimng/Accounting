<?php ob_start(); ?>
<?php

 //This gets all the other information from the form
 $data = json_decode(file_get_contents("php://input"));

 $Name=$data->name;
 $Email=$data->email;
 $Password=$data->password;
 $Mobile=$data->mobile;
 $updatedBy=$data->updatedBy;

 $HashedPassword= password_hash('$Password', PASSWORD_DEFAULT, ['cost' => 10]);

 // Connects to your Database
 $con = mysqli_connect('localhost', 'root', '', 'billing');
 //Writes the information to the database
 $sql="INSERT INTO login (Email,Password,HashedPassword,Mobile,Updated_date,Updated_by)
		 VALUES ('$Email','$Password','$HashedPassword','$Mobile',now(),'$Updated_by')";

 //header("Location: ../main.php");
echo "true";
 ?>
<?php ob_end_flush(); ?>
