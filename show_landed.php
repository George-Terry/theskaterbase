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

	$sql = "SELECT * FROM test WHERE user = '$_POST[user]'";

	//$sql = "SELECT * FROM test WHERE user = '1090031654343477'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	        echo "<div class='landed_item'><p>" . $row["trick"] . "</p></div>";
	    }
	} else {
	    echo "You haven't ticked off any tricks yet...";
	}

	mysqli_close($conn);
 ?>