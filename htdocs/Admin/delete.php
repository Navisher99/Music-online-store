<?php

include('inc/db_connection.php');
$id=$_GET['id'];
mysqli_query($conn," DELETE from tblproduct where ID ='{$id}'");
header('location:index.php');

?>

