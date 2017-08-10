<?php ob_start(); ?>
<?php

 //This gets all the other information from the form
 $data = json_decode(file_get_contents("php://input"));

 $Name=$data->name;
 $Email=$data->email;
 $Password=$data->password;
 $Mobile=$data->mobile;
 $UpdatedBy=$data->updatedBy;

 //$HashedPassword= password_hash('pradeep', PASSWORD_DEFAULT, ['cost' => 10]);

 // Connects to your Database
 $con = mysqli_connect('localhost', 'root', '', 'billing');
 //Writes the information to the database
 $sql="INSERT INTO login (Email,Name,HashedPassword,Mobile,UpdatedDate,UpdatedBy)
		 VALUES ('$Email','$Name','test','$Mobile',now(),'$UpdatedBy')";

 //header("Location: ../main.php");
echo "true";
 ?>
<?php ob_end_flush(); ?>
