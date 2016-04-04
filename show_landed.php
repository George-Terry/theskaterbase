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

	$all_tricks =
		"SELECT * FROM tricks";
	$user_landed =
		"SELECT * FROM landed WHERE user = '$_POST[user]'";
	$total_by_month =
		"SELECT MONTHNAME(o_date), SUM(total) 
		FROM landed
		GROUP BY YEAR(o_date), MONTH(o_date)";
	

	//$sql = "SELECT * FROM test WHERE user = '1090031654343477'";

	$user_landed = mysqli_query($conn, $user_landed);
	$total_tricks = mysqli_query($conn, $all_tricks);
	$total_by_month = mysqli_query($conn, $total_by_month);

	//echo $total_by_month;
	//echo $user_landed;

	echo "<h2>" . mysqli_num_rows($user_landed) . "/" . mysqli_num_rows($total_tricks) . " tricks landed</h2>";
	echo "By month " . mysqli_num_rows($total_by_month) . "...";

	if (mysqli_num_rows($user_landed) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($user_landed)) {
	        echo "<div class='landed_item'><p>" . $row["trick"] . "</p></div>";
	    }
	} else {
	    echo "You haven't ticked off any tricks yet...";
	}

	mysqli_close($conn);
 ?>