<html>
	<head>
		<title>
			Add Student
		</title>
	</head>
	<body>
	<?php
		if(isset($_POST['submit'])) {

		$data_missing = array();

		if(empty($_POST['firstname'])) {
			$data_missing[] = 'firstname';
		} else {
			$f_name = trim($_POST['firstname']);
		}

		if(empty($_POST['lastname'])) {
			$data_missing[] = 'lastname';
		} else {
			$l_name = trim($_POST['lastname']);
		}

		if(empty($_POST['email'])) {
			$data_missing[] = 'email';
		} else {
			$email = trim($_POST['email']);
		}

		if(empty($_POST['street'])) {
			$data_missing[] = 'street';
		} else {
			$street = trim($_POST['street']);
		}

		if(empty($_POST['city'])) {
			$data_missing[] = 'city';
		} else {
			$city = trim($_POST['city']);
		}

		if(empty($_POST['state'])) {
			$data_missing[] = 'state';
		} else {
			$state = trim($_POST['state']);
		}

		if(empty($_POST['zip'])) {
			$data_missing[] = 'zip';
		} else {
			$zip = trim($_POST['zip']);
		}

		if(empty($_POST['phone'])) {
			$data_missing[] = 'phone';
		} else {
			$phone = trim($_POST['phone']);
		}

		if(empty($_POST['birthday'])) {
			$data_missing[] = 'birthday';
		} else {
			$b_day = trim($_POST['birthday']);
		}

		if(empty($data_missing)) {
			require_once('../mysql_connect.php'); 

			$query = "INSERT INTO students (First_Name, Last_Name, Email, Street, City, State, Zip, Phone, Birth_Day)
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = mysqli_prepare($dbc, $query);

			mysqli_stmt_bind_param($stmt, "ssssssiss", $f_name ,$l_name ,$email ,$street ,$city ,$state ,$zip ,$phone , $b_day);

			mysqli_stmt_execute($stmt);

			$affected_rows = mysqli_stmt_affected_rows($stmt);

			if($affected_rows == 1) {
				echo 'Student Entered';
				mysqli_stmt_close($stmt);	
				mysqli_close($dbc);
			} else {
				echo "Error Occurred<br /> ";
				echo mysqli_error($dbc);

				mysqli_stmt_close($stmt);	
				mysqli_close($dbc);
			}
		} else {
			echo 'You need to enter the following data <br />';

			foreach($data_missing as $missing) {
				echo "$missing<br />";
			}
		}

	}
	?>
	<form action="http://127.0.0.1:8080/studentadded.php" method="post">
			<b>Add a New Student</b>
			<p>First_Name:<input type="text" name="firstname" size="30" value=""></p>
			<p>Last_Name:<input type="text" name="lastname" size="30" value=""></p>
			<p>Email:<input type="text" name="email" size="30" value=""></p>
			<p>Street:<input type="text" name="street" size="30" value=""></p>
			<p>City:<input type="text" name="city" size="30" value=""></p>
			<p>State (2 Characters):<input type="text" maxlength="2" name="state" size="30" value=""></p>
			<p>Zip Code:<input type="text" maxlength="5" name="zip" size="30" value=""></p>
			<p>Phone:<input type="text" name="phone" size="30" valuej=""></p>
			<p>Birth_Day:<input type="text" name="birthday" size="30" value=""></p>
			<p><input type="submit" name="submit" value="Send"></p>
		</form>
	</body>
</html>