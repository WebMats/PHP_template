<html>
<body>
	<?php 
if(isset($_POST['create'])) {
	$usrname = $_POST['username'];
	$usrtoken = $_POST['password'];

	if ($usrname === '') {
		echo "Please Provide an Email Address <br/>";
	}elseif ($usrtoken === '') {
		echo "Please Provide a Valid Password";
	}  else {
		require_once('../mysql_connect.php');

		$query = "INSERT INTO users (username, password, created_on)
					VALUES (?, ?, NOW())";
		$stmt = mysqli_prepare($dbc, $query);

		mysqli_stmt_bind_param($stmt, "ss", $usrname, $usrtoken);

		mysqli_stmt_execute($stmt);

		$affected_rows = mysqli_stmt_affected_rows($stmt);
		if($affected_rows == 1) {
			echo "Your Account Has Been Created";
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		} else {
			echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
		}
	}
}
if (isset($_POST['submit'])) {
	$usrname = $_POST['username'];
	$usrtoken = $_POST['password'];
	if ($usrname === '') {
		echo "Please Provide an Email Address <br/>";
	}elseif ($usrtoken === '') {
		echo "Please Provide a Valid Password";
	} else {

		require_once('../mysql_connect.php');
		$query = "SELECT password FROM  users WHERE username='$usrname'";
		$response = @mysqli_query($dbc, $query);

		if($mysqltoken = mysqli_fetch_object($response)) {
			$token = $mysqltoken->password;
			if ($token == $usrtoken) {
				echo "You are logged in!";
			} else {
				echo "The password you entered doesn't match";
			}
		} else {
			echo 'There is no user by that name, create that account<br />';
			echo mysqli_error($dbc);
		}
		mysqli_close($dbc);
		// echo " <br /> Connection is Closed";
	}
}


 ?>
</body>
	
</html>
