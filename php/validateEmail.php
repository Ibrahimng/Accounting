
<?php
include("dbConnect.php");
 //This gets all the other information from the form
 $data = json_decode(file_get_contents("php://input"));

 $Email=$data->email;
 $HashedPassword='';
$sql = "SELECT HashedPassword from login where Email='$Email'";

 if ($result=mysqli_query($conn,$sql))
   {
   // Fetch one and one row
   while ($row=mysqli_fetch_array($result))
     {
       $HashedPassword = $row['HashedPassword'];

     }
   // Free result set
   mysqli_free_result($result);
 }

 mysqli_close($conn);
 echo $HashedPassword;

 ?>
