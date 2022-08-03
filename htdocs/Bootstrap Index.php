<?php 
require_once("inc/db_connection.php");
require_once("inc/db_functions.php");
global $conn;
session_start();


if(isset($_POST['email']) and isset($_POST['password'])){
				$email = $_POST['email'];
				$password = $_POST['password'];

				if($userEmail = userLogin($email, $password)){	
					$welcome = 'Welcome!!!'.$userEmail;
					$_SESSION['user']= $userEmail;
				}
				else{
					echo "Wrong email or password!!!";
				}	
		}
			else {
				//echo "Empty email or password!";
			}		
?>

<?php


	// define variables and initialize with empty values
	$email = $password = $confirm_password = "";
	$email_err = $password_err = $confirm_password_err = "";

	// processing form data when form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST"){

		// validate username / email before insert
		if (empty(trim($_POST["email"]))){
			$email_err = "Please enter a email address.";
		}
		else{

			$email = $_POST["email"];
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);

			// validate e-mail
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$email_err = $email." is NOT a valid email address";	
			}
			//---
			

			// prepare a select statement
			$sql = "SELECT id FROM tbl_logins WHERE email = ?";

			if ($stmt = mysqli_prepare($conn, $sql)){
				
				
				mysqli_stmt_bind_param($stmt, "s", $param_email);  

				// set parameters
				$param_email = $email;

				// attempt to execute the prepared statement
				if (mysqli_stmt_execute($stmt)){
					
					/* store result */
					mysqli_stmt_store_result($stmt);

					// user's email must be unique
					if (mysqli_stmt_num_rows($stmt) == 1){
						$email_err = "This email is already taken.";
					}
					else{
						// $username = trim($_POST["username"]);
					}
				}
				else{
					echo "Oops! Something went wrong. Please try again later.";
				}
			}

			// close statement
			mysqli_stmt_close($stmt);
		}

		// validate password
		if (empty(trim($_POST["password"]))){
			$password_err = "Please enter a password.";
		}
		elseif (strlen(trim($_POST["password"])) < 6){
			$password_err = "Password must have at least 6 characters.";
		}
		else{
			$password = trim($_POST["password"]);
		}

		// validate confirm password
		// trim is used to remove any empty space that might be left in text
		if (empty($_POST["confirm_password"])){
			$confirm_password_err = "Please confirm password.";
		}
		else{
			$confirm_password = trim($_POST["confirm_password"]);
			if(empty($password_err) && ($password != $confirm_password)){
				$confirm_password_err = "Password did not match.";
			}
		}

		// check input errors before inserting in database
		if (empty($email_err) && empty($email_err) && empty($confirm_password_err)){

			//-------------
			userRegister($email, $password);
			//---------------------------
		}
		
		// close connection
		mysqli_close($conn);
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


<a href="Bootstrap Index.php" class="navbar-brand">  <img src="img/images.jfif" height="50px"> </a>


<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-nav" >
	<span class="navbar-toggler-icon"></span>


</button>
<div class="collapse navbar-collapse" id="menu-nav">

	<ul class="navbar-nav">
	<li class="nav-item"><a href="Bootstrap Index.php" class="nav-link " href="#"> <!--<i class="fas fa-home" style="color: white";>--></i>
		<i class="material-icons"> home</i> 	Home </a></li>

	


	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="CourseToggle"
		 role="button" data-toggle="dropdown"> <i class="fas fa-music" style="color: white";> </i>Imusica Products</a>
<div class="dropdown-menu" aria-labelledby="CourseToggle">
	<ol class="dropdown-item" href="#" style="color: yellow">
			 <li><a class="dropdown-item" href="#">Catagory</a></li>
			
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

<!-- try offsetHeight -->
	<!--	<script>
			// ajaxValidate
			function ajaxValidate(inputEmail){
				if (inputEmail == "") {
		        	document.getElementById("ajaxUsername").innerHTML = "";
		        	return;
			    } else { 
			        if (window.XMLHttpRequest) {
			            // code for IE7+, Firefox, Chrome, Opera, Safari
			            xmlhttp = new XMLHttpRequest();
			        } else {
			            // code for IE6, IE5
			            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			        }
			        xmlhttp.onreadystatechange = function() {
			            if (this.readyState == 4 && this.status == 200) {
			                document.getElementById("ajaxUsername").innerHTML = this.responseText;
			            }
			        };
			        xmlhttp.open("GET","getUser.php?q=" + inputEmail, true);
			        xmlhttp.send();
			    }
			}			
		</script>-->


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="border:1px solid #ccc; margin-top: -17px">
	<div class="modal fade" id="modalLoginForm2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label id="email"><b>Email</b></label>
    <input type="text" class="form-control" value="<?php echo $email; ?>" onblur="ajaxValidate(this.value)" placeholder="Enter Email" name="email" required> <span id="ajaxUsername"></span>
    <span class="help-block"><?php echo $email_err; ?></span>

    <label id="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required class="form-control" value="<?php echo $password; ?>">
    <span class=""><?php echo $password_err; ?></span>

    <label id="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" placeholder="Repeat Password" name="confirm_password" required class="form-control" value="<?php echo $confirm_password; ?>">
    	<span class=""><?php echo $confirm_password_err; ?></span>

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" onclick="userLogin()"class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</div>
</div>
</div>
</form>













<div id="alert2" style="margin-top" data-dismiss="alert"></div>
<!--
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
-->

<div style="background: #0D649E; height:40px; margin-top:30px;" ><h2 style="color: #E4C252"> Imusica Online Music Store 


<form class="form-inline" action="/action_page.php" style="margin:auto;float: right;">
	<div class="input-group" >
  <input type="text" class="form-control" placeholder="Search" name="search2">
  <div class="input-group-append">
  <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
</div>
</div>
</form>
</h2>

	
</div>
<div class="container">
	<div class="col-lg-0">
<!-- Carousel wrapper -->
<div id="carouselMaterialStyle" class="carousel slide carousel-fade" data-mdb-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="0" class="active" aria-current="true"
      aria-label="Slide 1"></button>
    <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <!-- Inner -->
  <div class="carousel-inner rounded-5 shadow-4-strong">
    <!-- Single item -->
    <div class="carousel-item active">
	<img src="img/gold.jpg" class="d-block w-100"
        alt="Sunset Over the City" />
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
	<img src="img/sing.jpg" class="d-block w-100"
        alt="Canyon at Nigh" />
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
	<img src="img/mic.jpg" class="d-block w-100"
        alt="Cliff Above a Stormy Sea" />
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <!-- Inner -->

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->

</div>


	<div class="row">
<h1 style="display: table; white-space: nowrap; border-bottom: 1px solid green;color: #D5412B" >POP Music </h1>
	</div>
	<div class="row">
		<!-- Jazz music -->

 <?php

 global $conn;

 $sql0="SELECT * FROM tblproduct inner join tbl_category on tblproduct.ct_ID = tbl_category.ct_ID where tblproduct.ct_ID=2 ORDER BY id ASC";

 $result0 = mysqli_query($conn,$sql0);

		while($row0=mysqli_fetch_assoc($result0)) {
			$product_array0[] = $row0;
		}		
		
	if (!empty($product_array0)) { 
		foreach($product_array0 as $key=>$value){
	?>
	<div class="col-lg-4">
<div class="card h-50">
		<div class="product-item">
			<form method="post" action="index4.php?action=add&Code=<?php echo $product_array0[$key]["Code"]; ?>"
			<!-- the action will be later used for shopping cart  -->
			<div class="product-image"><img src="<?php echo $product_array0[$key]["Image"]; ?>" height="250px" width="350px"></div>
			<h4 class="card-title"><a href="product.php">View product</a></h4>
			<div><strong><?php echo $product_array0[$key]["Name"]; ?></strong></div>
			<div><?php echo $product_array0[$key]["Description"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array0[$key]["Price"]; ?></div>
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

 <!-- row-->

<!-- POP -->

	<div class="row">
<h1 style="display: table; white-space: nowrap; border-bottom: 1px solid green;color: #D5412B" >Accossories </h1>
	</div>
	<div class="row">
		<!-- Jazz music -->
 <?php
 global $conn;

 $sql1="SELECT * FROM tblproduct inner join tbl_category on tblproduct.ct_ID = tbl_category.ct_ID where tblproduct.ct_ID=1 ORDER BY id ASC";
 $result1 = mysqli_query($conn,$sql1);
		while($row1=mysqli_fetch_assoc($result1)) {
			$product_array1[] = $row1;
		}		
		
	if (!empty($product_array1)) { 
		foreach($product_array1 as $key=>$value){
	?>
	<div class="col-lg-4">
<div class="card h-50">
		<div class="product-item">
			<form method="post" action="index4.php?action=add&Code=<?php echo $product_array1[$key]["Code"]; ?>"
			<!-- the action will be later used for shopping cart  -->
			<div class="product-image"><img src="<?php echo $product_array1[$key]["Image"]; ?>" height="250px" width="350px"></div>
			<h4 class="card-title"><a href="product.php">View product</a></h4>
			<div><strong><?php echo $product_array1[$key]["Name"]; ?></strong></div>
			<div><?php echo $product_array1[$key]["Description"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array1[$key]["Price"]; ?></div>
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

<div class="row">
<h1 style="display: table; white-space: nowrap; border-bottom: 1px solid green;color: #D5412B" >Jazz Music </h1>
	</div>
	<div class="row">

 <?php
 global $conn;

 $sql2="SELECT * FROM tblproduct inner join tbl_category on tblproduct.ct_ID = tbl_category.ct_ID where tblproduct.ct_ID=3 ORDER BY id ASC";
 $result2 = mysqli_query($conn,$sql2);
		while($row2=mysqli_fetch_assoc($result2)) {
			$product_array2[] = $row2;
		}		
		
	if (!empty($product_array2)) { 
		foreach($product_array2 as $key=>$value){
	?>
	<div class="col-lg-4">
<div class="card h-50">
		<div class="product-item">
			<form method="post" action="index4.php?action=add&Code=<?php echo $product_array2[$key]["Code"]; ?>"
			<!-- the action will be later used for shopping cart  -->
			<div class="product-image"><img src="<?php echo $product_array2[$key]["Image"]; ?>" height="250px" width="350px"></div>
			<h4 class="card-title"><a href="product.php">View product</a></h4>
			<div><strong><?php echo $product_array2[$key]["Name"]; ?></strong></div>
			<div><?php echo $product_array2[$key]["Description"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array2[$key]["Price"]; ?></div>
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


<!--ROCK-->
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
</div> <!-- row-->

</div>
</div>

<footer class="py-5 bg-dark">
	<p  class="m-0 text-center text-white" style="color: #ccc"> Copyright &copy; 2019 Imusica.co.nz. All Rights Reserved </p>
</footer>



<script type="text/javascript" src="vendor/jquery/jquery.min.js"> </script>
<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"> </script>
</body>



</html>



