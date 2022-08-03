<!--delete-->

<div class="modal fade" id="del<?php echo $row['ID'];?>"tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<center><h4 class="modal-title" id="myModalLabel" >Delete</h4></center>
</div>
<div class="modlal-body">
<?php

$del=mysqli_query($conn,"SELECT * FROM tblproduct WHERE ID = '{$row["ID"]}'");
$drow=mysqli_fetch_array($del);
?>
<div class="container-fluid">
<h5> <center>Product name:<strong><?php echo $drow["Name"];?></strong></center></h5>
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancel</button> 
<a href="delete.php?id=<?php echo $drow["ID"];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</a>

</div>
</div>
</div>
</div>
<!--/.modal-->

<!--edit-->

<div class="modal fade" id="edit<?php echo $row["ID"];?>"tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
			</div>
			<div class="modal-body">
				<?php
				$edit=mysqli_query($conn,"SELECT * FROM tblproduct WHERE ID='{$row["ID"]}'");
				$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
					<form method="POST" action="edit.php? id=<?php echo $erow["ID"];?>">
						<div class="row">
							<div class="col-lg-2">
								<label style="position: relative; top: 7px;">Item Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="itemname" class="form-control" value="<?php echo $erow['Name'];?>">
							</div>
						</div>
						<div style="height: 10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label style="position: relative;top: 7px;">Description:</label>
							</div>
							<div class="col-lg-10">
									<input type="text" name="description" class="form-control" value="<?php echo $erow['Description'];?>">
							</div>
						</div>

						<div style="height: 10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label style="position: relative;top: 7px;">Price:</label>
							</div>

							<div class="col-lg-10">
									<input type="text" name="price" class="form-control" value="<?php echo $erow['Price'];?>">
							</div>
						</div>

						<div style="height: 10px;"></div>
						<div class="row">

							<div class="col-lg-2">
								<label style="position: relative;top: 7px;">Category ID:</label>
							</div>

							<div class="col-lg-10">
									<input type="text" name="category" class="form-control" value="<?php echo $erow['ct_ID'];?>">
							</div>
						</div>

					
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancel</button>
					<button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span>Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--modal-->