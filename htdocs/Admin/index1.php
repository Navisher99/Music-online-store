<?php
	// include config file
	require_once "inc/db_connection.php";

	// include functions file
	require_once("inc/db_functions.php");

	global $connection;

	// define variables and initialize with empty values
	$username = $password = $confirm_password = "";
	$username_err = $password_err = $confirm_password_err = "";

	// processing form data when form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST"){

		// validate username / email before insert
		if (empty(trim($_POST["username"]))){
			$username_err = "Please enter a username.";
		}
		else{

			//--------------------------------------------------------------

			$username = $_POST["username"];
			$username = filter_var($username, FILTER_SANITIZE_EMAIL);

			// validate e-mail
			if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
				$username_err = $username." is NOT a valid email address";	
			}
			//--------------------------------------------------------------
			

			// prepare a select statement
			$sql = "SELECT id FROM tbl_customer WHERE email = ?";

			if ($stmt = mysqli_prepare($connection, $sql)){
				
				// bind variables to the prepared statement as parameters
				// refer to https://www.php.net/manual/en/mysqli-stmt.bind-param.php
				mysqli_stmt_bind_param($stmt, "s", $param_username);  

				// set parameters
				$param_username = $username;

				// attempt to execute the prepared statement
				if (mysqli_stmt_execute($stmt)){
					
					/* store result */
					mysqli_stmt_store_result($stmt);

					// user's email must be unique
					if (mysqli_stmt_num_rows($stmt) == 1){
						$username_err = "This username is already taken.";
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
		if (empty(trim($_POST["confirm_password"]))){
			$confirm_password_err = "Please confirm password.";
		}
		else{
			$confirm_password = trim($_POST["confirm_password"]);
			if(empty($password_err) && ($password != $confirm_password)){
				$confirm_password_err = "Password did not match.";
			}
		}

		// check input errors before inserting in database
		if (empty($username_err) && empty($password_err) && empty($confirm_password_err)){

			//--------------------------------------------------------------
			userRegister($username, $password);
			//--------------------------------------------------------------
		}
		
		// close connection
		mysqli_close($connection);
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Sign Up</title>

		<!-- bootstrap style -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"/>
		
		<style type="text/css">
			body { font: 14px sans-serif; }

			.wrapper { width: 350px; padding: 20px; }

		</style>

		<script>
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
		</script>

	</head>
	<body>
		<div class="wrapper">
			<h2>Sign Up</h2>
			<p>Please fill this form to create an account.</p>

			<!-- refer to https://www.w3schools.com/php7/php7_form_validation.asp -->
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

				<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : "" ;?>">
					<label>Username</label>
					<input type="text" name="username" class="form-control" value="<?php echo $username; ?>" onblur="ajaxValidate(this.value)"><span id="ajaxUsername"></span>
					<span class="help-block"><?php echo $username_err; ?></span>
				</div>
				
				<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : "" ?>">
					<label>Password</label>
					<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
					<span class="help-block"><?php echo $password_err; ?></span>
				</div>

				<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : "" ?>">
					<label>Confirm Password</label>
					<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
					<span class="help-block"><?php echo $confirm_password_err; ?></span>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Submit">
					<input type="reset" class="btn btn-default" value="Reset">
				</div>

				<p>Already have an account? <a href="cdshop.php">Login Here</a></p>

			</form>
		</div>
	</body>
</html>