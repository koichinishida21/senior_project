<?php

require_once("session.php");
require_once("included_functions.php");
require_once("database.php");
$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (($output = message()) !== null) {
  echo $output;
}

if(empty($_SESSION['luserID'])){
	echo "You are not logged in";
	redirect("login.php");
}


leader_header("Younglife Oxford Leader");
?>

<header class="masthead" style="background-color: #FFFFFF;">
<?php
require_once("session.php");
require_once("included_functions.php");
require_once("database.php");


	$mysqli = Database::dbConnect();
	$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = "SELECT leaderID, CONCAT(firstName, ' ', lastName) as fullName, gender, pos, leaderUser,
  CONCAT(Leader.address, ', ', city, ', ', stateCode) as fullAdd, Leader.phone as lphone, Leader.email as lemail,
  CONCAT(parentFname, ' ', parentLname) as parentFull,
  parentPhone, parentEmail, admin,
  School.schoolID, Church.churchID, Church.name as cname, School.name as sname
  FROM Leader JOIN School JOIN Church JOIN State
  ON Leader.schoolID = School.schoolID and Church.churchID = Leader.churchID
  and State.stateNum = Leader.stateNum
  WHERE leaderID = ?;";

  $stmt = $mysqli->prepare($query);
	$stmt-> execute([$_GET['id']]);

  if ($stmt) {
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<center>";
    echo "<h2>Information of ".$row['fullName']."</h2>\n";
    echo "</center>";
		echo "<div class='row'>\n";
    echo "<div class='col-lg-2'>";
    echo "</div>";
    echo "<div class='col-lg-5'>";
    echo "<h3>Student Information</h3>\n";
		echo "<p style='color: black'>Name: ".$row['fullName']."</p>\n";
    echo "<p style='color: black'>Username: ".$row['leaderUser']."</p>\n";
    echo "<p style='color: black'>Gender: ".$row['gender']."</p>\n";
    echo "<p style='color: black'>Position: ".$row['pos']."</p>\n";
    echo "<p style='color: black'>School: ".$row['sname']."</p>\n";
    echo "<p style='color: black'>Church: ".$row['cname']."</p>\n";
    echo "<p style='color: black'>Address: ".$row['fullAdd']."</p>\n";
    echo "<p style='color: black'>Phone: ".$row['lphone']."</p>\n";
    echo "<p style='color: black'>Email: ".$row['lemail']."</p>\n";
    echo "</div>";
    echo "<div class='col-lg-4'>";
    echo "<h3>Parent/Guardian Information</h3>\n";
    echo "<p style='color: black'>Name: ".$row['parentFull']."</p>\n";
    echo "<p style='color: black'>Phone: ".$row['parentPhone']."</p>\n";
    echo "<p style='color: black'>Email: ".$row['parentEmail']."</p>\n";
    echo "<p style='color: black'>Admin?: ";
     if($row["admin"] == 0){
    echo "No</p>\n";
  }else{
    echo "Yes</p>\n";
  }
		echo "</div>\n";
    echo "</div>\n";
    echo "<section>\n";
    echo "</section>\n";
  }

  home_footer(" Koichi Nishida ");
	Database::dbDisconnect($mysqli);

?>
