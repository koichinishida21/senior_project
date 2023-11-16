<!DOCTYPE html>
<!-- header -->
<?php

require_once("session.php");
require_once("included_functions.php");
require_once("database.php");
$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (($output = message()) !== null) {
  echo $output;
}
if(empty($_SESSION['userID'])){
	echo "You are not logged in";
	redirect("login.php");
}



admin_header("Younglife Oxford Admin");
?>

<header class="masthead" style="background-color: #FFFFFF;">
<?php
require_once("session.php");
require_once("included_functions.php");
require_once("database.php");


	$mysqli = Database::dbConnect();
	$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = "SELECT studentID, CONCAT(Student.firstName, ' ', Student.lastName) as fullName, Student.gender, CONCAT(Leader.firstName, ' ', Leader.lastName) as lfullName,
  highschoolGraduateYear, collegeGraduateYear,
  CONCAT(Student.address, ', ', Student.city, ', ', stateCode) as fullAdd, Student.phone as sphone, Student.email as semail,
  CONCAT(Student.parentFname, ' ', Student.parentLname) as parentFull,
  Student.parentPhone, Student.parentEmail, description,
  Student.schoolID, Student.churchID, Church.name as cname, School.name as sname
  FROM Student JOIN Leader JOIN School JOIN Church JOIN State
  ON Student.schoolID = School.schoolID and Church.churchID = Student.churchID and Student.leaderID = Leader.leaderID
  and State.stateNum = Student.stateNum
  WHERE studentID = ?;";

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
    echo "<p style='color: black'>Leader: ".$row['lfullName']."</p>\n";
    echo "<p style='color: black'>Gender: ".$row['gender']."</p>\n";
    echo "<p style='color: black'>School: ".$row['sname']."</p>\n";
    echo "<p style='color: black'>Church: ".$row['cname']."</p>\n";
    echo "<p style='color: black'>High School: Class of ".$row['highschoolGraduateYear']."</p>\n";
    echo "<p style='color: black'>College: Class of ".$row['collegeGraduateYear']."</p>\n";
    echo "<p style='color: black'>Address: ".$row['fullAdd']."</p>\n";
    echo "<p style='color: black'>Phone: ".$row['sphone']."</p>\n";
    echo "<p style='color: black'>Email: ".$row['semail']."</p>\n";
    echo "<p style='color: black'>Description: ".$row['description']."</p>\n";
    echo "</div>";
    echo "<div class='col-lg-4'>";
    echo "<h3>Parent/Guardian Information</h3>\n";
    echo "<p style='color: black'>Name: ".$row['parentFull']."</p>\n";
    echo "<p style='color: black'>Phone: ".$row['parentPhone']."</p>\n";
    echo "<p style='color: black'>Email: ".$row['parentEmail']."</p>\n";
    echo "<br>";

    echo "<h3>Event Information</h3>\n";

    echo "<center>";
    echo "<table class='table align-middle mb-0 bg-white'>";
    echo "<tbody>";
    echo "<tr>";
    echo   "<th>Name</th>";
    echo   "<th>Type</th>";
    echo "</tr>";

    $query1 = "SELECT title, type
    FROM Events JOIN Signup JOIN Student
    ON Student.studentID = Signup.studentID and Events.eventID = Signup.eventID
    WHERE Student.studentID = ?";

    $stmt1 = $mysqli->prepare($query1);
  	$stmt1-> execute([$_GET['id']]);
    while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      echo  "<td>".$row1['title']."</td>";
      echo  "<td>".$row1['type']."</td>";
      echo "</tr>";
    }
    echo "</table>";
    echo "</tbody>";

    echo "</div>";
		echo "</div>\n";
  }
	Database::dbDisconnect($mysqli);

?>
</header>


<?php
home_footer(" Koichi Nishida ");
Database::dbDisconnect();
?>
<!-- footer -->
