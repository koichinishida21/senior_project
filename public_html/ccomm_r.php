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

  $query = "SELECT committeeID, CONCAT(firstName, ' ', lastName) as fullName, committeeUser,
  CONCAT(Committee.address, ', ', city, ', ', stateCode) as fullAdd,
  Committee.phone as cphone, Committee.email as cemail, admin,
  Church.churchID, Church.name as cname
  FROM Committee JOIN Church JOIN State
  ON Church.churchID = Committee.churchID
  and State.stateNum = Committee.stateNum
  WHERE CommitteeID = ?;";

  $stmt = $mysqli->prepare($query);
	$stmt-> execute([$_GET['id']]);

  if ($stmt) {
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<center>";
    echo "<h2>Information of ".$row['fullName']."</h2>\n";
    echo "</center>";
		echo "<div class='row'>\n";
    echo "<div class='col-lg-4'>";
    echo "</div>";
    echo "<div class='col-lg-5'>";
		echo "<p style='color: black'>Name: ".$row['fullName']."</p>\n";
    echo "<p style='color: black'>Username: ".$row['committeeUser']."</p>\n";
    echo "<p style='color: black'>Church: ".$row['cname']."</p>\n";
    echo "<p style='color: black'>Address: ".$row['fullAdd']."</p>\n";
    echo "<p style='color: black'>Phone: ".$row['cphone']."</p>\n";
    echo "<p style='color: black'>Email: ".$row['cemail']."</p>\n";
    echo "<p style='color: black'>Admin?: ";
     if($row["admin"] == 0){
    echo "NO</p>\n";
  }else{
    echo "YES</p>\n";
  }
		echo "</div>\n";
    echo "</div>\n";
  }
  echo "<section>\n";
  echo "</section>\n";

  home_footer(" Koichi Nishida ");
	Database::dbDisconnect($mysqli);

?>
