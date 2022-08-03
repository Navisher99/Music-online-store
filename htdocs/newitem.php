<?php 
require_once("inc/db_connection.php");
require_once("inc/db_functions.php");
global $conn;
session_start();
include('inc/header.php');
?>



<div class="container">
	

	<div class="col-lg-0">
		<div class="carousel slide my-4" id="CE" data-ride="carousel">
			
			
			

		

<a href="#CE" class="carousel-control-prev" role="button" data-slide="prev">
	<span class="carousel-control-prev-icon"></span></a>

	<a href="#CE" class="carousel-control-next" role="button" data-slide="next">
	<span class="carousel-control-next-icon"></span></a>

	</div>
</div>
<div class="row">
<h1 style="display: table; white-space: nowrap; border-bottom: 1px solid green;color: #D5412B" >New Items </h1>
	</div>
	<div class="row">

 <?php
 global $conn;

 $sql3="SELECT * FROM tblproduct inner join tbl_category on tblproduct.ct_ID = tbl_category.ct_ID where tblproduct.ct_ID=4 ORDER BY id ASC";
 $result3 = mysqli_query($conn,$sql3);
		while($row3=mysqli_fetch_assoc($result3)) {
			$product_array3[] = $row3;
		}		
		
	if (!empty($product_array3)) { 
		foreach($product_array3 as $key=>$value){
	?>
	<div class="col-lg-4">
<div class="card h-50">
		<div class="product-item">
			<form method="post" action="index4.php?action=add&Code=<?php echo $product_array3[$key]["Code"]; ?>"
			<!-- the action will be later used for shopping cart  -->
			<div class="product-image"><img src="<?php echo $product_array3[$key]["Image"]; ?>" height="250px" width="350px"></div>
			<h4 class="card-title"><a href="product.php">View product</a></h4>
			<div><strong><?php echo $product_array3[$key]["Name"]; ?></strong></div>
			<div><?php echo $product_array3[$key]["Description"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array3[$key]["Price"]; ?></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
			
		
			</form>
		</div>
		<div class="card-footer">
		&#9733; &#9733; &#9733; &#9733; &#9734;
</div>
</div>
</div>


	<?php
			}
	}
	?>
	
		<!-- Jazz music -->

</div>
</div>
 <!-- row-->



<footer class="py-5 bg-dark">
	<p  class="m-0 text-center text-white" style="color: #ccc"> Copyright &copy; 2019 Imusica.co.nz. All Rights Reserved </p>
</footer>



<script type="text/javascript" src="vendor/jquery/jquery.min.js"> </script>
<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"> </script>
</body>



</html>
