
<?php 
require_once("inc/db_connection.php");
require_once("inc/db_functions.php");
global $conn;
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
	<meta name="description" content="customer reviews">
	<meta name="author" content="John D">

	<title> About Us</title>



	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


</head>


<body background="img/upstate-concert-hall.jpg" align="center" width="500px"style="padding: 0px; background-size: 100%; background-repeat: no-repeat; background-position: center; background-size: cover">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

		<div class="container">
			<a href="Bootstrap Index.php" class="navbar-brand"> <img src="img/images.jfif" height="80px" style="color: white"></a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id=" navbarResponsive">

				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="Bootstrap Index.php">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>

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

	
	<li class="nav-item"><a href="about us.php" class="nav-link" href="#"> <i class="fas fa-address-card" style="color: white";></i>About us</a></li>
	<li class="nav-item"><a href="contact.php" class="nav-link" href="#"> <i class="fas fa-phone" style="color: white";></i>Contact</a></li>


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
		<li><a class="dropdown-item" href="index4.php">Order History</a></li>
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
					<input type="email" id="defaultForm-email" class="form-control validate">
				</div>
					<label data-error=" wrong" data-success="right" for="defaultForm-email">Email Address</label>
				</div>
			
	<div class="md-form mb-4">
					<div class="input-group">
					<div class="input-group-prepend">
	<span class="input-group-text" ><i class="far fa-key"></i></span>
</div>
					<input type="email" id="defaultForm-pass" class="form-control validate">
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





<div id="alert2" style="margin-top" data-dismiss="alert"></div>
<script>
	
	function userLogin()
	{
		var userEmail = document.getElementById("defaultForm-email").value;
		var userPassword = document.getElementById("defaultForm-pass").value;

		if(userEmail !="admin@admin" && userPassword !="123")
		{
			document.getElementById("alert1").className="alert alert-danger alert-dismissible fade show";
			document.getElementById("alert1").innerHTML="wrong Email or password"
		}
else{
	document.getElementById("alert2").className="alert alert-success alert-dismissible fade show";
			document.getElementById("alert2").innerHTML="welcome admin"
			$("#modalLoginForm").modal('hide');
			$("#modalLoginForm2").modal('hide');
			var loginLink= document.getElementById("loginbtn");
			var regLink= document.getElementById("registbtn");
			loginLink.style.display="none";
			regLink.style.display="none";
}

	}

	function placeLabel(){
		var height=document.getElementById("mynav").offsetHeight;

		document.getElementById("navLabel").style.marginTop=height + 'px';
	}
</script>




<div style="background: #0D649E; height:60px">



</div>
</div>



	</div>

</div>

<div class="container">
<div class="col-lg-0">
	<div class="card mt-4">
		<img class="card-img-top img-fluid" src="img/skyscrapers_reflections-wallpaper-960x600.jpg" alt="First slide">
	
</div>


<div class="card card-outline-secondary my-4">
	<div class="card-body">

<h1>Contact us</h1>

</div>


<div class="container">

	<p><h2>Imusica store</h2>
<h3>450 Queen st, </h3>
<h4> Auckland 1010</h4>
<h4>New Zealand,</h4>
<h4>Imusica@music.com</h4></p>



<iframe class="pull-right" src="http://maps.google.co.nz/maps?q=Whitireia,+Auckland,+New+Zealand&&output=embed"
width="425" height="350">
</iframe>

</div>

</div>


</div>


</div>




<footer class="py-5 bg-dark">
	<div class="container">
		<p class="m-0 text-center text-white"> Copyright &copy; Your Website 2019</p>

	</div>


</footer>



<script type="text/javascript" src="vendor/jquery/jquery.min.js"> </script>

<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"> </script>

</body>

</html>