<?php

require_once("session.php");
require_once("included_functions.php");
require_once("database.php");
$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (($output = message()) !== null) {
  echo $output;
}

if(empty($_SESSION['cuserID'])){
	echo "You are not logged in";
	redirect("login.php");
}



comm_header("Younglife Oxford Committee");
?>

<header class="masthead" style="background-color: #FFFFFF;">
<?php
require_once("session.php");
require_once("included_functions.php");
require_once("database.php");


	$mysqli = Database::dbConnect();
	$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = "SELECT title, Events.description
  FROM Events
  WHERE Events.eventID = ?";

  $stmt = $mysqli->prepare($query);
	$stmt-> execute([$_GET['id']]);

  if ($stmt) {
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<center>";
    echo "<h2>".$row['title']."</h2>\n";
    echo "<h4>Description: ".$row['description']."</h4>\n";

    echo "<div class='col-lg-5'>";
    echo "</div>";
    echo "<div class='col-lg-3'>";
    echo "<table class='table align-middle mb-0 bg-white'>";
    echo "<tbody>";
    echo "<tr>";
    echo   "<th>Name</th>";
    echo   "<th>Type</th>";
    echo "</tr>";
    $query1 = "SELECT CONCAT(firstName, ' ', lastName) as full, type
    FROM Events JOIN Signup JOIN Student
    ON Student.studentID = Signup.studentID and Events.eventID = Signup.eventID
    WHERE Events.eventID = ?";

    $stmt1 = $mysqli->prepare($query1);
  	$stmt1-> execute([$_GET['id']]);
    while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      echo  "<td>".$row1['full']."</td>";
      echo  "<td>".$row1['type']."</td>";
      echo "</tr>";
    }
    echo "</table>";
    echo "</tbody>";
  }
  echo "</div>";
  echo "</center>";
  echo "<section>\n";
  echo "</section>\n";

  home_footer(" Koichi Nishida ");
	Database::dbDisconnect($mysqli);

?>
