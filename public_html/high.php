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
  $year = getYear();

  $query = "SELECT Student.studentID, CONCAT(Student.firstName, ' ', Student.lastName) as fullS, Student.gender as sgender, Student.leaderID, CONCAT(Leader.firstName, ' ', Leader.lastName) as fullL, highschoolGraduateYear as high, School.name as sname, Student.schoolID
  from Student JOIN School JOIN Leader ON Student.schoolID = School.schoolID and Leader.leaderID = Student.leaderID
  WHERE School.schoolID = ? and highschoolGraduateYear = $year;";

  $stmt = $mysqli->prepare($query);
	$stmt-> execute([$_GET['id']]);

  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  echo "<h1>".$row['sname']."</h1>";

  if ($stmt) {
    echo "<br>";
    echo "<table class='table align-middle mb-0 bg-white'>";
    echo "<tbody>";
    echo "<thead class='bg-light'>";
    echo "<h3>Senior";
    echo "</h3>";
    echo "<tr>";
    echo  "<th>Student</th>";
    echo   "<th>Gender</th>";
    echo   "<th>Leader</th>";
    echo "<th></th>";
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>";
  		echo "<td>".$row['fullS']."</td>\n";
      echo "<td>".$row['sgender']."</td>\n";
      echo "<td>".$row['fullL']."</td>\n";
      echo "<td><li class='list-inline-item'>";
      echo "<a href='school_hu.php?id=".urlencode($row['studentID'])."' class='btn btn-success bi bi-pencil-square' role='button' title = 'Edit'></a>";
      echo "</li></td>";
		echo "</tr>";
  }
  echo "</thead>";
  echo "</tbody>";
  echo "</table>";
  echo "<br>";
  }

  $query = "SELECT Student.studentID, CONCAT(Student.firstName, ' ', Student.lastName) as fullS, Student.gender as sgender, Student.leaderID, CONCAT(Leader.firstName, ' ', Leader.lastName) as fullL, highschoolGraduateYear as high, School.name as sname, Student.schoolID
  from Student JOIN School JOIN Leader ON Student.schoolID = School.schoolID and Leader.leaderID = Student.leaderID
  WHERE School.schoolID = ? and highschoolGraduateYear = $year+1;";

  $stmt = $mysqli->prepare($query);
	$stmt-> execute([$_GET['id']]);

  if ($stmt) {
    echo "<table class='table align-middle mb-0 bg-white'>";
    echo "<tbody>";
    echo "<thead class='bg-light'>";
    echo "<h3>Junior";
    echo "</h3>";
    echo "<tr>";
    echo  "<th>Student</th>";
    echo   "<th>Gender</th>";
    echo   "<th>Leader</th>";
    echo "<th></th>";
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>";
  		echo "<td>".$row['fullS']."</td>\n";
      echo "<td>".$row['sgender']."</td>\n";
      echo "<td>".$row['fullL']."</td>\n";
      echo "<td><li class='list-inline-item'>";
      echo "<a href='school_hu.php?id=".urlencode($row['studentID'])."' class='btn btn-success bi bi-pencil-square' role='button' title = 'Edit'></a>";
      echo "</li></td>";
		echo "</tr>";
  }
  echo "</thead>";
  echo "</tbody>";
  echo "</table>";
  echo "<br>";
  }

  $query = "SELECT Student.studentID, CONCAT(Student.firstName, ' ', Student.lastName) as fullS, Student.gender as sgender, Student.leaderID, CONCAT(Leader.firstName, ' ', Leader.lastName) as fullL, highschoolGraduateYear as high, School.name as sname, Student.schoolID
  from Student JOIN School JOIN Leader ON Student.schoolID = School.schoolID and Leader.leaderID = Student.leaderID
  WHERE School.schoolID = ? and highschoolGraduateYear = $year+2;";

  $stmt = $mysqli->prepare($query);
	$stmt-> execute([$_GET['id']]);

  if ($stmt) {
    echo "<table class='table align-middle mb-0 bg-white'>";
    echo "<tbody>";
    echo "<thead class='bg-light'>";
    echo "<h3>Sophomore";
    echo "</h3>";
    echo "<tr>";
    echo  "<th>Student</th>";
    echo   "<th>Gender</th>";
    echo   "<th>Leader</th>";
    echo "<th></th>";
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>";
  		echo "<td>".$row['fullS']."</td>\n";
      echo "<td>".$row['sgender']."</td>\n";
      echo "<td>".$row['fullL']."</td>\n";
      echo "<td><li class='list-inline-item'>";
      echo "<a href='school_hu.php?id=".urlencode($row['studentID'])."' class='btn btn-success bi bi-pencil-square' role='button' title = 'Edit'></a>";
      echo "</li></td>";

		echo "</tr>";
  }
  echo "</thead>";
  echo "</tbody>";
  echo "</table>";
  echo "<br>";
  }

  $query = "SELECT Student.studentID, CONCAT(Student.firstName, ' ', Student.lastName) as fullS, Student.gender as sgender, Student.leaderID, CONCAT(Leader.firstName, ' ', Leader.lastName) as fullL, highschoolGraduateYear as high, School.name as sname, Student.schoolID
  from Student JOIN School JOIN Leader ON Student.schoolID = School.schoolID and Leader.leaderID = Student.leaderID
  WHERE School.schoolID = ? and highschoolGraduateYear = $year+3;";

  $stmt = $mysqli->prepare($query);
	$stmt-> execute([$_GET['id']]);

  if ($stmt) {
    echo "<table class='table align-middle mb-0 bg-white'>";
    echo "<tbody>";
    echo "<thead class='bg-light'>";
    echo "<h3>Freshman";
    echo "</h3>";
    echo "<tr>";
    echo  "<th>Student</th>";
    echo   "<th>Gender</th>";
    echo   "<th>Leader</th>";
    echo "<th></th>";
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>";
  		echo "<td>".$row['fullS']."</td>\n";
      echo "<td>".$row['sgender']."</td>\n";
      echo "<td>".$row['fullL']."</td>\n";
      echo "<td><li class='list-inline-item'>";
      echo "<a href='school_hu.php?id=".urlencode($row['studentID'])."' class='btn btn-success bi bi-pencil-square' role='button' title = 'Edit'></a>";
      echo "</li></td>";
		echo "</tr>";
  }
  echo "</thead>";
  echo "</tbody>";
  echo "</table>";
  echo "<br>";
  }

  $query = "SELECT Student.studentID, CONCAT(Student.firstName, ' ', Student.lastName) as fullS, Student.gender as sgender, Student.leaderID, CONCAT(Leader.firstName, ' ', Leader.lastName) as fullL, highschoolGraduateYear as high, School.name as sname, Student.schoolID
  from Student JOIN School JOIN Leader ON Student.schoolID = School.schoolID and Leader.leaderID = Student.leaderID
  WHERE School.schoolID = ? and (highschoolGraduateYear > $year+3 or highschoolGraduateYear < $year);";

  $stmt = $mysqli->prepare($query);
	$stmt-> execute([$_GET['id']]);

  if ($stmt) {
    echo "<table class='table align-middle mb-0 bg-white'>";
    echo "<tbody>";
    echo "<thead class='bg-light'>";
    echo "<h3>Out of High School";
    echo "</h3>";
    echo "<tr>";
    echo  "<th>Student</th>";
    echo   "<th>Gender</th>";
    echo   "<th>Leader</th>";
    echo "<th></th>";
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>";
  		echo "<td>".$row['fullS']."</td>\n";
      echo "<td>".$row['sgender']."</td>\n";
      echo "<td>".$row['fullL']."</td>\n";
      echo "<td><li class='list-inline-item'>";
      echo "<a href='school_hu.php?id=".urlencode($row['studentID'])."' class='btn btn-success bi bi-pencil-square' role='button' title = 'Edit'></a>";
      echo "</li></td>";
		echo "</tr>";
  }
  echo "</thead>";
  echo "</tbody>";
  echo "</table>";
  echo "<br>";
  }




echo "</header>";
	Database::dbDisconnect($mysqli);

?>
</header>


<?php
home_footer(" Koichi Nishida ");
Database::dbDisconnect();
?>
<!-- footer -->
