<?php




function viewCustomers(){

global $conn; 
$query="select * from tbl_customer"; 
$result= mysqli_query($conn, $query);


	if($result->num_rows >0){

  // display table
  echo"<table border='1'>
  <tr>
   <th>Email</th>
   <th>Password</th>
 </tr>";
	while($row= $result->fetch_assoc()){
      echo"<tr> <td>" .$row["email"]."</td><td>
      ".$row["password"]."</td></tr>";
	}

echo"</table>";
}
	else{ echo "No data found";}

  // finish table

}

function userLogin($email, $password){
	global $conn;
	$sql="select * from tbl_customer where email='{$email}' and password='{$password}'";

	   //echo $sql;

$result=mysqli_query($conn, $sql);
if($result){
while($row= mysqli_fetch_assoc($result))
{

  return true;
}
}
else{
  return false;
}

}


function userRegister($username,$password,$confirm_password){
  global $conn;
  $sql="select* from "
}
?>


<?php
 $con=mysqli_connect("localhost","my_user","my_password","my_db");
 // Check connection
 if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

$sql="SELECT Lastname,Age FROM Persons ORDER BY Lastname";
 $result=mysqli_query($con,$sql);

// Associative array
 $row=mysqli_fetch_assoc($result);
printf ("%s (%s)\n",$row["Lastname"],$row["Age"]);

// Free result set
mysqli_free_result($result);

mysqli_close($con);
 ?>




<?php 

$email = "abc@abc.com";

//remove all illegal char from email
$email = filter_var($email, FITER_SANITIZE_EMAIL);

//validate email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)===FALSE){
	echo("$email is a valid email address");
}
else
{
	echo("email is not a valid email address");
}
?>