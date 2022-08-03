<?php 
session_start();
//include 'inc/header.php';
require_once("inc/db_connection.php");
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			 $sql_="SELECT * FROM tblproduct WHERE Code='" . $_GET["Code"] . "'";
			 $result = mysqli_query($conn,$sql_);
		   while($row=mysqli_fetch_assoc($result)) {
		   	$productByCode = $row;
		    }
			
			$itemArray = array($productByCode["Code"]=>array('Name'=>$productByCode["Name"], 
			'Code'=>$productByCode["Code"], 'quantity'=>$_POST["quantity"], 
			'Price'=>$productByCode["Price"]));
			
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode["Code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode["Code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["Code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>







<!DOCTYPE html>
<html >
<head>

	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<link rel="stylesheet" href="css/shop-homepage.css">




</head>
<body background="img/party.jpg" align="center" width="500px"style="padding: 0px; background-size: 100%; background-repeat: no-repeat; background-position: center; background-size: cover">

	

<nav class="navbar  navbar-expand-lg navbarfixed-top navbar-dark bg-primary">
<a href="Bootstrap Index.php" class="navbar-brand">  <img src="img/images.jfif" height="100px"> </a>


<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-nav" >
	<span class="navbar-toggler-icon"></span>


</button>
<div class="collapse navbar-collapse" id="menu-nav">

	<ul class="navbar-nav">
	<li class="nav-item"><a href="Bootstrap Index.php" class="nav-link " href="#"> <i class="fas fa-home" style="color: white";></i>
		<!--<i class="material-icons"> home</i> !-->	Home </a></li>

	


	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="CourseToggle"
		 role="button" data-toggle="dropdown"> <i class="fas fa-music" style="color: white";></i>Imusica Products</a>
<div class="dropdown-menu" aria-labelledby="CourseToggle">
	<ol class="dropdown-item" href="#" style="color: yellow">
			 <li><a class="dropdown-item" href="Bootstrap Index.php">Catagory</a></li>
			
		<ul type="square">
			<li> <a class="dropdown-item" href="jazz.php">Jazz </a></li>
			<li><a class="dropdown-item" href="pop.php"> POP </a></li>
		</ul><li><a class="dropdown-item" href="acc.php">Accessories</a> </li>
			<ol type="A">
			
		</ol>
		<li><a class="dropdown-item" href="newitem.php">New items</a></li>
		<li><a class="dropdown-item" href="sale.php">Sale </a></li>
		</ol >
	</div>
</li>


	<li class="nav-item"><a href="about us.html" class="nav-link" href="#"> <i class="fas fa-address-card" style="color: white";></i>About us</a></li>
	<li class="nav-item"><a href="contact.html" class="nav-link" href="#"> <i class="fas fa-phone" style="color: white";></i>Contact</a></li>


</ul>

	<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<?php
                       if(isset($_SESSION['user'])){
	                   $welcome = 'Welcome!!!'.$_SESSION['user']; ?> 
	                          <!--<a class="nav-link" href="logout.php">Logout</a>-->
	                        
	              <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#"  id="CourseToggle"
		 role="button" data-toggle="dropdown"> <i class="fas fa-music" style="color: white";></i><?php echo $welcome;?></a>
<div class="dropdown-menu" aria-labelledby="CourseToggle">
	<ul class="dropdown-item" href="#" style="color: yellow">
			 <li><a class="dropdown-item" href="index4.php">Shopping Cart</a></li>
			  <li><a class="dropdown-item" href="logout.php">Logout</a></li></ul>
<?php }

else{

?>

						<a class="nav-link" data-toggle="modal"data-target="#modalLoginForm" id="loginbtn" href="#">Login</a>
						<li class="nav-item">
						<a class="nav-link"  data-toggle="modal"data-target="#modalLoginForm2" id="regisbtn" href="#">Register</a>
					
					<?php } ?>

</li>


			
		</ul>
</div>

</nav>

<form action="Bootstrap Index.php" method="POST" style="border:1px solid #ccc; margin-top: -17px"> 

<div class="modal fade" id="modalLoginForm" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times; </span>
				</button>
			</div>

			<div class="modal-body mx-3">
				<div class="md-form mb-4">
					<div class="input-group">
					<div class="input-group-prepend">
	<span class="input-group-text" ><i class="far fa-envelope"></i></span>
</div>
					<input type="email" id="defaultForm-email" name="email" class="form-control validate">
				</div>
					<label data-error=" wrong" data-success="right" for="defaultForm-email">Email Address</label>
				</div>
			
	<div class="md-form mb-4">
					<div class="input-group">
					<div class="input-group-prepend">
	<span class="input-group-text" ><i class="far fa-key"></i></span>
</div>
					<input type="password" id="defaultForm-pass" name="password" class="form-control validate">
				</div>
					<label data-error=" wrong" data-success="right" for="defaultForm-pass">Password</label>
				</div>
<div id="alert1" data-dismiss="alert"></div>

	
		
</div>

			<div class="modal-footer d-flex justify-content-center">

				<button class="btn btn-success" onclick="userLogin()">Login</button>

			</div>

		</div>
	</div>
</div>
</form>

  
  <div class="container">
  <div style="margin-top:40px"></div>
  
  <div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="index4.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:left;"><strong>Code</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
			
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["Name"]; ?></strong></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["Code"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["Price"]; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="index4.php?action=remove&Code=<?php echo $item["Code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["Price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>		
  <?php
}
?>
</div>

  
  </div>
 

 

 
  <!-- Footer -->
  <footer class="py-5 bg-dark" style="position:absolute; bottom:0; left:0; right:0;">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
