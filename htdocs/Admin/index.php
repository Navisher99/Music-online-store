<?php
require_once("inc/db_connection.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Whitireia</title>
	<script
		src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
	</script>

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<script 
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js""></script>
</head>
<body>
	<div class="container">
		<div style="height: 50px;"></div>
		<div class="well" style="margin: auto; padding: auto;width: 80%; ">
			<span style="font-size: 25px; color: blue"><center><strong>Cafe Shop Products at Whitireia(Admin Panal)</strong></center></span>

			<span class="pull-left"><a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Add new</a></span>
			<div style="height: 50px;"></div>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<th>Item name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Category</th>
					<th>Action</th>
				</thead>

				<tbody>
					<?php

					//include('conn.php');
					global $conn;
					$query=mysqli_query($conn,"Select* from tblproduct inner JOIN tbl_category ON tblproduct.ct_ID =tbl_category.ct_ID");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $row['Name'];?></td>
							<td><?php echo $row['Description'];?></td>
							<td><?php echo $row['Price'];?></td>
							<td><?php echo $row['ct_ID'];?></td>
							<td>
								<a href="#edit<?php echo $row['ID'];?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Edit</a>||
								<a href="#del<?php echo $row['ID'];?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</a>

								<?php include('Uc_modal.php');

								?>
							</td>
								
						</tr>
						<?php
					}

					?>

				</tbody>
			</table>
		</div>

		<?php include('Add_modal.php');
		?>
	</div>
</body>
</html>