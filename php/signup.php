<?php ob_start(); ?>
<?php
$server="localhost";
$username="root";
$password="";
$database="billing";
$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("connection failed:" . $conn->connect_error);
}


 //This gets all the other information from the form
 $Email=$_POST['Email'] ;
 $Password= $_POST['Password'] ;
 $PasswordConfirm= $_POST['PasswordConfirm'] ;
 $Hashed= password_hash('$Password', PASSWORD_DEFAULT, ['cost' => 10]);
 //$Salt= $_POST['Salt'] ;
 $Mobile= $_POST['Mobile'] ;
 $Updated_by= $_POST['Updated_by'] ;

 // Connects to your Database
 //$conn = new mysqli("localhost", "root", "", "billing") ;
 //mysql_select_db("billing") or die(mysql_error()) ;

 //Writes the information to the database
 $sql="INSERT INTO `login`(Email,Password,PasswordConfirm,Hashed,Mobile,Updated_date,Updated_by)
		 VALUES ('$Email','$Password','$PasswordConfirm','$Hashed','$Mobile',now(),'$Updated_by')";

 header("Location: ../main.php");
 ?>
<?php ob_end_flush(); ?>
