<?php ob_start(); ?>
<?php

 //This gets all the other information from the form
 $Email=$_POST['Email'] ;
 $Password= $_POST['Password'] ;
 $PasswordConfirm= $_POST['PasswordConfirm'] ;
 $HashedPassword= password_hash('$Password', PASSWORD_DEFAULT, ['cost' => 10]);
 $Mobile= $_POST['Mobile'] ;
 $Updated_by= $_POST['Updated_by'] ;

 // Connects to your Database
 //$conn = new mysqli("localhost", "root", "", "billing") ;
 //mysql_select_db("billing") or die(mysql_error()) ;
$con = mysqli_connect('localhost', 'root', '', 'billing');
 //Writes the information to the database
 $sql="INSERT INTO login (Email,Password,PasswordConfirm,HashedPassword,Mobile,Updated_date,Updated_by)
		 VALUES ('$Email','$Password','$PasswordConfirm','$HashedPassword','$Mobile',now(),'$Updated_by')";

 header("Location: ../main.php");
 ?>
<?php ob_end_flush(); ?>
