<?php ob_start(); ?>
<?php
include("dbConnect.php");
 //This gets all the other information from the form
 //$data = json_decode(file_get_contents("php://input"));

 $Name=$_POST['name'];
 $Email=$_POST['email'];
 $Password=$_POST['password'];
 $Mobile=$_POST['mobile'];
 $UpdatedBy=$_POST['updatedBy'];

 //$HashedPassword= password_hash($Password, PASSWORD_DEFAULT, ['cost' => 10]);
 $HashedPassword = crypt($Password);//Takes default salt

 // Connects to your Database
 //$con = mysqli_connect('localhost', 'root', '', 'billing');
 //Writes the information to the database
 $result = mysqli_query($conn,"INSERT INTO login (Email,Name,HashedPassword,Mobile,UpdatedDate,UpdatedBy)
		 VALUES ('$Email','$Name','$HashedPassword','$Mobile',now(),'$UpdatedBy')");

 echo mysqli_insert_id($conn);
exit;
 ?>
<?php ob_end_flush(); ?>
