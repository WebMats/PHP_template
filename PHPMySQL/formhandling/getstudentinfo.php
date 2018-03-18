<?php
	
	require_once('../mysql_connect.php');

	$query = "SELECT First_Name, Last_Name, Email, Street, City, State, Zip, Phone, Birth_Day FROM students";

	$response = @mysqli_query($dbc, $query);

	if($response) {

		echo '<table align="left"
		cellspacing="5" cellpadding="8">

		<tr><td align="left"><b>First Name</b></td>
		<td align="left"><b>Last Name</b></td>
		<td align="left"><b>Email</b></td>
		<td align="left"><b>Street</b></td>
		<td align="left"><b>City</b></td>
		<td align="left"><b>State</b></td>
		<td align="left"><b>Zip</b></td>
		<td align="left"><b>Phone</b></td>
		<td align="left"><b>Birth Day</b></td></tr>';

		while ($row = mysqli_fetch_array($response)) { // potential point of conflict
			echo '<tr><td align="left">' . 
			$row['First_Name'] . '</td><td align="left">' .
			$row['Last_Name'] . '</td><td align="left">' .
			$row['Email'] . '</td><td align="left">' .
			$row['Street'] . '</td><td align="left">' .
			$row['City'] . '</td><td align="left">' .
			$row['State'] . '</td><td align="left">' .
			$row['Zip'] . '</td><td align="left">' .
			$row['Phone'] . '</td><td align="left">' .
			$row['Birth_Day'] . '</td><td align="left">';

			echo '</tr>';
		}
		echo '</table>';
	} else {
		echo "Couldn't issue database query<br />";

		echo  mysqli_error($dbc);
	}
mysqli_close($dbc);
?>