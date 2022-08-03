<?php 

include('inc/db_connection.php');

$itemname=$_POST['itemname'];
$description=$_POST['description'];
$price=$_POST['price'];
$category=$_POST['category'];

mysqli_query($conn," INSERT INTO product ('pr_ItemName', 'pr_Description', 'pr_Price', 'pr_id', 'ct_ID', 'pr_ct_Name') VALUES ('{$itemname}','{$description}','{$price}','{$category}')" );
header('location:index.php');

?>