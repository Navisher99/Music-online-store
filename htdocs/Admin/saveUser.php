<?php
//include config file

require_once"inc/db_connection2.php";
global $conn;

//define varibales and initialize with empty values
$username =$password =$confirm_password="";
$username_err =$password_err=$confirm_password_err="";


//processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"]=="POST"){
	//validate username/ email before insert
	if(empty(trim($_POST["username"]))){

	$username_err="Please enter a username.";

}
else{

	$sql="SELECT id FROM tbl_customer WHERE email=?";


	if($stmt=mysqli_prepare($conn,$sql)){

		mysqli_stmt_bind_param($stmt,"s",$param_username);

		//set parameters

		$param_username = trim($_POST["username"]);

		//attempt to execute the prepared statement
		if(mysqli_stmt_execute($stmt)){
			/*store result*/

			mysqli_stmt_store_result($stmt);

			if(mysqli_stmt_num_rows($stmt)==1){

				$username_err="This username is already taken.";

			}else{
				$username=trim($_POST["username"]);
			}
		}
			else{
				echo"Oops! something went wrong,please try again later.";
			}
		}

		mysqli_stmt_close($stmt);
	}



	//validate password

	if(empty(trim($_POST["password"]))){
		$password_err="please enter a password.";
	}
	elseif(strlen(trim($_POST["password"]))<6){
		$password_err="password must have atleast 6 characters.";
	}
	else{
		$password=trim($_POST["password"]);
	}


	//validate confirm password
	//trim is used to remove any empty space that might be left in text
	if(empty(trim($_POST["confirm password"]))){
		$confirm_password_err="Please confirm password.";

	}
	else{
		$confirm_password=trim($_POST["confirm password"]);
		if(empty($password_err)&&($password !=$confirm_password)){
			$confirm_password_err="password did not match.";
		}
	}

	//check input errors before inserting in database
	if(empty($username_err)&&empty($password_err)&&empty($confirm_password_err)){

		//prepare an insert statement
		$sql="INSERT INTO tbl_customer(email,password)VALUES(?,?)";


		if($stmt=mysqli_prepare($conn,$sql)){


			mysqli_stmt_bind_param($stmt,"ss",$param_username,$param_password);


			//set parameters

			$param_username=$username;
			$param_password=passowrd_hash($password,PASSWORD_DEFAULT);//creates a password hash


			//attempt to execute the prepared statement

			if(mysqli_stmt_execute($stmt)){
				//redirt to login page

				header("location:cdshop.php");
			}
			else{
				echo"Spmething went wrong, please try again later.";
			}
		}


		//close statement
		mysqli_stmt_close($stmt);
	}


	//close connection

	mysqli_close($conn);
}

?>




<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>

	<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<style type="text/css">

	body{font:14px sans-serif;}
	.wrapper{width:350px; padding: 20px;}
</style>outline-style: 
</head>

<body>

	<div class="wrapper">
		<h2>Sign Up</h2>

		<p> please fill this form to create an account</p>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

			     <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

			<label>Username</label>

			<input type="text" name="username" class="form-control" value="<?php echo $username;?>">

			<span class="help-block"><?php echo $username_err;?></span>

			</div>

			<div class="form-group<?php echo(!empty($password_err))? 'has-error' : ''; ?>">

			<label>Password</label>

			<input type="password" name="password" class="form-control" value="<?php echo$password;?>">

			<span class="help-block"><?php echo$password_err;?></span>

		</div>

		<<div class="form-group <?php echo(!empty($confirm_password_err))? 'has-error' : ''; ?>">
			<label>confirm password</label>

			<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password;?>">

			<span class="help-block"><?php echo$confirm_password_err;?></span>
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="submit">
			<input type="reset" class="btn btn-default" value="Reset" >
		</div>
		<p> Already have an account?<a href="cdshop.php">Login here</a>.</p>

	</form>
</div>
</body>
</html>




