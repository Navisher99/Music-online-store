
//<?php

define('DB_Host', 'localhost'); //localhost - domain name 
define('DB_USER', 'root'); //user name
define('DB_PASSWORD', ''); //password 
define('DB_DATABASE', 'shop'); // DB 

$conn = mysqli_connect(DB_Host,DB_USER, DB_PASSWORD, DB_DATABASE ); 


if(mysqli_connect_errno()){
	die("Database connection failed". "(". mysqli_connect_errno()."-".mysqli_errno().")");
}
?>
-->


     