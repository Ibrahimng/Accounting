<?php ob_start(); ?>
<?php


 //This gets all the other information from the form
 $Email=$_POST['Email'] ;
 $Password= $_POST['Password'] ;
 $Salt= $_POST['Salt'] ;
 $Mobile= $_POST['Mobile'] ;
 $Updated_by= $_POST['Updated_by'] ;


 // Connects to your Database
 mysql_connect("localhost", "root", "1234") or die(mysql_error()) ;
 mysql_select_db("billing") or die(mysql_error()) ;

 //Writes the information to the database
 mysql_query("INSERT INTO `login`(Email,Password,Salt,Mobile,Updated_by)
		 VALUES ('$Email','$Password','$Salt','$Mobile','$Updated_by')") ;

 header("Location: main.php");
 ?>
<?php ob_end_flush(); ?>
