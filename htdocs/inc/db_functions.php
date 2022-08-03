<?php
	//-------------------------------------------------------------------------------------------------
	// view all users from database
	function viewCustomers(){
		global $conn;
		// $query = "select * from tbl_customer";
		$query = "select * from tbl_logins order by id asc";

		$result = mysqli_query($conn, $query);

		if($result->num_rows > 0) {
			
			echo "<table><tr><th>ID</th><th>First Name</th><th>Email</th><th>Password</th></tr>";

			while ($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row['id']."</td><td>".$row['first_name']."</td><td>".$row['email']."</td><td>".$row['password']."</td></tr>";
			}

			echo "</table>";
		}
		else{
			echo "No data found!";
		}
	}

	//-------------------------------------------------------------------------------------------------
	// user login
	function userLogin($email, $password){

		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		// Validate e-mail
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo("WELCOME $email ");
		} else {
			echo("$email is not a valid email address");
			return false;
		}

		global $conn;
		$sql = "select * from tbl_logins where email = '{$email}' and password = '{$password}' ";
		
		// echo $sql;
		
		$result = mysqli_query($conn, $sql);
		if ($result){
			while ($row = mysqli_fetch_assoc($result)){
				return $row['email'];
			}		
		}
		else {
			return false;
		}
		// return either true or false
	}

	//-------------------------------------------------------------------------------------------------
	// user register
	function userRegister($email, $password){

		global $conn;
		
		// prepare an insert statement
		$sql = "INSERT INTO tbl_logins (email, password) VALUES (?, ?)";

		if ($stmt = mysqli_prepare($conn, $sql)){

			// bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password);
			
			// set parameters
			$param_email = $email;
			$param_password = $password; 
			

			// attempt to execute the prepared statement
			if (mysqli_stmt_execute($stmt)){

				// redirect to login page
				header("location: Bootstrap Index.php");
			}
			else{
				echo "Something went wrong. Please try again later.";
			}
		}

		// close statement
		mysqli_stmt_close($stmt);

	}

	//-------------------------------------------------------------------------------------------------


?>