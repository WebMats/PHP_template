<html>
	<head>
		<title>Add Student</title>
	</head>
	<body>
		<form action="http://127.0.0.1:8080/studentadded.php" method="post">
			<b>Add a New Student</b>
			<p>First_Name:<input type="text" name="firstname" size="30" value=""></p>
			<p>Last_Name:<input type="text" name="lastname" size="30" value=""></p>
			<p>Email:<input type="text" name="email" size="30" value=""></p>
			<p>Street:<input type="text" name="street" size="30" value=""></p>
			<p>City:<input type="text" name="city" size="30" value=""></p>
			<p>State (2 Characters):<input type="text" maxlength="2" name="state" size="30" value=""></p>
			<p>Zip Code:<input type="text" maxlength="5" name="zip" size="30" value=""></p>
			<p>Phone:<input type="text" name="phone" size="30" value=""></p>
			<p>Birth_Date:<input type="text" name="birthday" size="30" value=""></p>
			<p><input type="submit" name="submit" value="Send"></p>
		</form>
	</body>
</html>