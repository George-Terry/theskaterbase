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

	//Insert values for submitted trick and user
	$sql = "INSERT INTO goals (trick, user) VALUES ('$_POST[trick]', '$_POST[user]')";

	//Show if the insert was successful
	if (mysqli_query($conn, $sql)) {
	    echo "Added <strong>" . $_POST[trick] . "</strong> to your goals!";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
 ?>