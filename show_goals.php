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

	$sql =
		"SELECT * 
			FROM goals
			WHERE user =  '$_POST[user]'
			UNION 
			SELECT * 
			FROM landed
			WHERE user = '$_POST[user]'";
	$tricklist = mysqli_query($conn, $sql);

	$sql =
		"SELECT * FROM goals WHERE user = '$_POST[user]'";
	$goal = mysqli_query($conn, $sql);

	$sql =
		"SELECT * FROM landed WHERE user = '$_POST[user]'";
	$landed = mysqli_query($conn, $sql);


	// If the user has 1 or more tricks marked as goals or landed, then this block runs
	if (mysqli_num_rows($tricklist) > 0) {

		// The start of the table and headers
	    echo "<table class='landed-tricks'>";
	    
	    // Generaates html for each landed trick
		while($row = mysqli_fetch_assoc($landed)) {
	        echo "<tr class='landed-item' id='goal-id-" . $row["id"] . "'>
				    <td title='Watch " . $row["trick"] . " tutorial video' class='watch-icon'><i class='material-icons'>play_circle_outline</i></td>
				    <td title='Remove " . $row["trick"] . " from your goals' class='goal-icon'><i class='material-icons'>playlist_add</i></td>
				    <td title='Remove " . $row["trick"] . " from your landed tricks' class='landed-icon'><i class='material-icons'>playlist_add_check</i></td>
				    <td class='trick-name'>" . $row["trick"] . "</td>
				  </tr>";
		}


		// Generaates html for each goal
	    while($row = mysqli_fetch_assoc($goal)) {

	    		echo "<tr class='goal-item' id='goal-id-" . $row["id"] . "'>
				    <td title='Watch " . $row["trick"] . " tutorial video' class='watch-icon'><i class='material-icons'>play_circle_outline</i></td>
				    <td title='Remove " . $row["trick"] . " from your goals' class='goal-icon'><i class='material-icons'>playlist_add</i></td>
				    <td title='Add " . $row["trick"] . " to your landed tricks' class='landed-icon'><i class='material-icons'>playlist_add_check</i></td>
				    <td class='trick-name'>" . $row["trick"] . "</td>
				  </tr>";

	    	}
	        echo "</table>";
}

 else {
	    echo "You haven't landed any tricks yet...";
	}

/*
	// If the user has 1 or more tricks marked as goals or landed, then this block runs
	if (mysqli_num_rows($tricklist) > 0) {

		// The start of the table and headers
	    echo "<table class='landed-tricks'>";
	    
	    // Generaates html for each landed trick
		while($row = mysqli_fetch_assoc($landed)) {
	        echo "<tr class='landed-item' id='goal-id-" . $row["id"] . "'>
				    <td class='watch-icon'><i class='material-icons'>play_circle_outline</i></td>
				    <td class='goal-icon'><i class='material-icons'>playlist_add</i></td>
				    <td class='landed-icon'><i class='material-icons'>playlist_add_check</i></td>
				    <td class='trick-name'>" . $row["trick"] . "</td>
				  </tr>";
			$landed_tricks[] = $row["trick"];
			
		}
echo 'landed tricks array: <br><pre>'; print_r($landed_tricks); echo '</pre>';
echo implode(" ",$landed_tricks);
$landed_tricks = implode(" ",$landed_tricks);


		// Generaates html for each goal
	    while($row = mysqli_fetch_assoc($goal)) {
echo $landed_tricks;
$this_trick = implode(" ",$row);
echo "Row:" . $this_trick . "<br>";
			if (strpos($landed_tricks, $this_trick) !== false) {
			    echo 'true';
			} else {
	    		echo "<tr class='goal-item' id='goal-id-" . $row["id"] . "'>
				    <td class='watch-icon'><i class='material-icons'>play_circle_outline</i></td>
				    <td class='goal-icon'><i class='material-icons'>playlist_add</i></td>
				    <td class='landed-icon'><i class='material-icons'>playlist_add_check</i></td>
				    <td class='trick-name'>" . $row["trick"] . "</td>
				  </tr>";
			}
	    	}
	        echo "</table>";
}

 else {
	    echo "You haven't landed any tricks yet...";
	}
*/


	mysqli_close($conn);
 ?>