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
	$landed = mysqli_query($conn, $sql);

	$sql = "SELECT * FROM goals WHERE (trick, user) = ('$_POST[trick]', '$_POST[user]')";
	$goal = mysqli_query($conn, $sql);

	if (mysqli_num_rows($landed) > 0) {
		echo '<a href="#" class="is-landed-btn btn-landed-true mdl-button mdl-js-button"><i class="material-icons">playlist_add_check</i>Landed</a>';
	} else {
	    echo '<a href="#" class="not-landed-btn btn-landed-false mdl-button mdl-js-button"><i class="material-icons">playlist_add_check</i>Landed</a>';
	}
	if (mysqli_num_rows($goal) > 0) {
		echo '<a href="#" class="is-goal-btn btn-landed-true mdl-button mdl-js-button"><i class="material-icons">playlist_add</i>Goals</a>';
	} else {
	    echo '<a href="#" class="not-goal-btn btn-landed-false mdl-button mdl-js-button"><i class="material-icons">playlist_add</i>Goals</a>';
	}

	echo '<a href="#" class="exit btn-landed-false mdl-button mdl-js-button"><i class="material-icons">clear</i>Exit</a>';

	mysqli_close($conn);
 ?>