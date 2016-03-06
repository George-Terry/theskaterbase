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

  $output = "";

  if (isset($_POST['sarchVal'])) {
    $searchq = $_POST['sarchVal'];

    $sql = "SELECT * FROM `trick_list` WHERE `trick` LIKE '%$searchq%' LIMIT 0, 6";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            $output .=
            '<div class="result mdl-shadow--2dp mdl-card__actions mdl-card--border">
              <i class="material-icons">playlist_add</i>
              <i class="material-icons">playlist_add_check</i>
              <p>'
                . $row["trick"].
              '</p>
            </div>';
        }
    }
    else {
        $output = 'No tricks found...';
    }
  }
  echo ($output);
  mysqli_close($conn);

 ?>