<?php
	$servername = "localhost";
	$username = "The_gt";
	$password = "%H2puG9Jg-t9&d";
	$dbname = "skaterbase";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$user_landed =
		"SELECT * FROM landed WHERE user = '$_POST[user]'";

	$user_landed = mysqli_query($conn, $user_landed);


	echo "<h2>You have landed " . mysqli_num_rows($user_landed) . " tricks</h2>";

	if (mysqli_num_rows($user_landed) > 0) {
	    // output data of each row
	    echo "<table id='landed-tricks'>
							<th>Remove</th>
							<th>Watch</th>
							<th>Trick</th>";
	    while($row = mysqli_fetch_assoc($user_landed)) {
        echo "<tr id=landed-id-" . $row["id"] . ">
						    <td class='remove-trick'><i class='material-icons'>highlight_off</i></td>
						    <td class='watch-trick'><i class='material-icons'>play_circle_outline</i></td>
						    <td class='trick-name'>" . $row["trick"] . "</td>
						  </tr>";
	    }
	    echo "</table>";
	} else {
	    echo "You haven't ticked off any tricks yet...";
	}

	mysqli_close($conn);
 ?>