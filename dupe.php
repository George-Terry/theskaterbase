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

	$sql = "SELECT * FROM landed WHERE (trick, user) = ('$_POST[trick]', '$_POST[user]')";
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo "landed";
		/*
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	        echo "id: " . $row["id"]. " - User: " . $row["user"]. " " . $row["trick"]. "<br>";
	    }
	    */
	} else {
	    echo "not_landed";
	}

	mysqli_close($conn);
 ?>