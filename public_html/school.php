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

<div class="row">
<?php
$query = "SELECT DISTINCT School.schoolID, name, type
FROM School JOIN Student
ON Student.schoolID = School.schoolID ORDER by type ASC;";

$stmt = $mysqli -> query($query);
$stmt -> execute();

if ($stmt) {

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    echo "<div class='col-xl-3 col-md-6 mb-4'>";
    if($row['type'] == 'High School'){
    echo "<a href='high.php?id=".urlencode($row['schoolID'])."' class = 'btn' role = 'button'>";
    } else if($row['type'] == 'Middle School'){
    echo "<a href='middle.php?id=".urlencode($row['schoolID'])."' class = 'btn' role = 'button'>";
    } else if($row['type'] == 'College'){
    echo "<a href='college.php?id=".urlencode($row['schoolID'])."' class = 'btn' role = 'button'>";
  } else if($row['type'] == 'No School'){
    echo "<a href='noschool.php?id=".urlencode($row['schoolID'])."' class = 'btn' role = 'button'>";
    }
    echo "<div class='card border-left-primary shadow h-100 py-2' style='width: 300px;'>";
    echo "<div class='card-body'>";
    echo "<div class='row no-gutters align-items-center'>";
    echo "<div class='col mr-2'>";
    echo "<div class='h4 text-xs font-weight-bold text-primary text-uppercase mb-2'>";
    echo $row['name']."</div>";
    echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>".$row['type']."</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</a>";
    echo "</div>";


  }
}

?>


</div>


</header>
<?php
         home_footer(" Koichi Nishida ");
       	Database::dbDisconnect($mysqli);

       ?>
