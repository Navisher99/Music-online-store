<?php

include('inc/db_connection.php');

$id=$_GET['id'];

$Name=$_POST['itemname'];
$Description=$_POST['description'];
$Price=$_POST['price'];
$ct_ID=$_POST['category'];

mysqli_query($conn, " UPDATE tblproduct SET Name='{$itemname}', Description='{$description}', Price='{$price}', ct_ID='{$category}' WHERE ID='{$id}'");
header('location:index.php');

?>