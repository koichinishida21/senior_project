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
echo "<center>";
echo "<h2>Update Information\n</h2>\n";
echo "</center>";

	if (isset($_POST["submit"])) {

		if((!empty($_POST['lname'])) && (!(trim($_POST['lname']) == ""))
    && (!empty($_POST['fname'])) && (!(trim($_POST['fname']) == ""))
    && (!empty($_POST['leader'])) && (!(trim($_POST['leader']) == ""))
	&& (!empty($_POST['gender'])) && (!(trim($_POST['gender']) == ""))
  && (!empty($_POST['school'])) && (!(trim($_POST['school']) == ""))
  && (!empty($_POST['church'])) && (!(trim($_POST['church']) == ""))
  && (!empty($_POST['saddress'])) && (!(trim($_POST['saddress']) == ""))
  && (!empty($_POST['city'])) && (!(trim($_POST['city']) == ""))
  && (!empty($_POST['state'])) && (!(trim($_POST['state']) == ""))){

		$query3 = "UPDATE Student SET lastName = ?, firstName = ?, leaderID = ?, gender = ?, highschoolGraduateYear = ?,
    collegeGraduateYear = ?, address = ?, city = ? , stateNum = ?,
    phone = ?, email = ?, parentLname = ?, parentFname = ?,
    parentPhone = ?, parentEmail = ?, schoolID = ?, churchID = ?, description = ? WHERE studentID = ?;";
   	$stmt3 = $mysqli->prepare($query3);
		$stmt3 -> execute([$_POST['lname'], $_POST['fname'], $_POST['leader'], $_POST['gender'],
    $_POST['high'], $_POST['college'], $_POST['saddress'], $_POST['city'], $_POST['state'],
    $_POST['phone'], $_POST['email'], $_POST['plname'], $_POST['pfname'],
    $_POST['pphone'], $_POST['pemail'], $_POST['school'], $_POST['church'], $_POST['desc'], $_POST['sid']]);

		if($stmt3) {
			$_SESSION['message'] = $_POST['lname']." has been updated";
			redirect("lstudents.php");
		}else{
			$_SESSION["message"] = "ERROR!! Could not update the Student";
			redirect("lstudents.php");
		}
		redirect("lstudents.php");

	}else{
		$_SESSION["message"] = "Unable to update a Student! Fill in all information!";
		redirect("lstudents.php");
	}

	redirect("lstudents.php");
}
	else {


	  if (isset($_GET["id"]) && $_GET["id"] !== "") {
		  $query = "SELECT studentID, lastName, firstName, gender,
      highschoolGraduateYear, collegeGraduateYear,
      Student.address, city, Student.stateNum, Student.phone as sphone, Student.email as semail,
      parentFname, parentLname, Student.address as saddress, city,
      parentPhone, parentEmail, description,
      Student.schoolID, Church.churchID, Church.name as cname, School.name as sname
      FROM Student JOIN School JOIN Church JOIN State
      ON Student.schoolID = School.schoolID and Church.churchID = Student.churchID
      and State.stateNum = Student.stateNum
      WHERE studentID = ?;";
			$stmt = $mysqli->prepare($query);
			$stmt-> execute([$_GET["id"]]);


		if ($stmt)  {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
      $school = $row['schoolID'];
      echo "<form action='lstudents_u.php' method='POST'>\n";
      echo "<div class='row'>\n";
      echo "<div class='col-lg-2'>";
      echo "</div>";
      echo "<div class='col-lg-5'>";
      echo "<h3 style='color: black'>Student Information</h3>\n";
      echo "<p style='color: black'>Last Name*: <input type=text name='lname' value = '".$row['lastName']."'></p>\n";
      echo "<p style='color: black'>First Name*: <input type=text name='fname' value = '".$row['firstName']."'></p>\n";
      echo "<p style='color: black'>Leader*: <select name='leader'>";
      $query11 = "SELECT DISTINCT CONCAT(Leader.firstName, ' ', Leader.lastName) as fullName, Leader.leaderID, Leader.schoolID FROM Student JOIN Leader
      where Leader.schoolID = $school ORDER BY fullName ASC";
      $stmt11 = $mysqli -> prepare($query11);
      $stmt11 -> execute();
      while($row1 = $stmt11->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value =".$row1["leaderID"];
        if($row1["leaderID"] == $row["leaderID"]){
          echo " selected ";
        }
        echo ">".$row1["fullName"]."</option>\n";
      }
      echo "</select>\n";
      echo "</p>\n";
      echo "<p style='color: black'>Gender*: <select name='gender' value = '".$row['gender']."'>";
      echo "<option value='M'";
       if($row["gender"] == 'M'){
      echo " selected ";
            }
      echo ">M</option>";
      echo "<option value='F'";
       if($row["gender"] == 'F'){
      echo " selected ";
            }
      echo ">F</option>";
      echo "<option value='N'";
        if($row["gender"] == 'N'){
      echo " selected ";
           }
      echo ">N</option>";
      echo "</select>\n";

      echo "<p style='color: black'>School*: <select name='school'>";
      $query11 = "SELECT * FROM School ORDER BY name ASC";
      $stmt11 = $mysqli -> prepare($query11);
      $stmt11 -> execute();
      while($row1 = $stmt11->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value =".$row1["schoolID"];
        if($row1["schoolID"] == $row["schoolID"]){
          echo " selected ";
        }
        echo ">".$row1["name"]."</option>\n";
      }
      echo "</select>\n";
      echo "</p>\n";

      echo "<p style='color: black'>Church*: <select name='church'>";
      $query12 = "SELECT * FROM Church ORDER BY churchID ASC";
      $stmt12 = $mysqli -> prepare($query12);
      $stmt12 -> execute();
      while($row2 = $stmt12->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value =".$row2["churchID"];
        if($row2["churchID"] == $row["churchID"]){
          echo " selected ";
        }
        echo ">".$row2["name"]."</option>\n";
      }
      echo "</select>\n";
      echo "</p>\n";
      echo "<p style='color: black'>High School*: Class of <input type=number select name='high' min='2000' max='2050' value = '".$row['highschoolGraduateYear']."'>; College*: Class of <input type=number select name='college' min='2000' max='2050' value = '".$row['collegeGraduateYear']."'></p>\n";
      echo "<p style='color: black'>Address*: <input type=text name='saddress' value = '".$row['saddress']."'></p>\n";
      echo "<p style='color: black'>City*: <input type=text name='city' value = '".$row['city']."'> State*: <select name='state'>";
      $query13 = "SELECT * FROM State ORDER BY stateCode ASC";
      $stmt13 = $mysqli -> prepare($query13);
      $stmt13 -> execute();
      while($row3 = $stmt13->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value =".$row3["stateNum"];
        if($row3["stateNum"] == $row["stateNum"]){
          echo " selected ";
        }
        echo ">".$row3["stateCode"]."</option>\n";
      }
      echo "</select>\n";
      echo "</p>\n";
      echo "<p style='color: black'>Phone Number: <input type=tel pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' select name='phone' value = '".$row['sphone']."'></p>\n";
      echo "<p style='color: black'>Email: <input type=email name='email' value = '".$row['semail']."'></p>\n";
      echo "<p style='color: black'>Description: <input type=text name='desc' value = '".$row['description']."'></p>\n";
      echo "</div>";
      echo "<div class='col-lg-5'>";
      echo "<h3 style='color: black'>Parent/Guardian Information</h3>\n";
      echo "<p style='color: black'>Last Name: <input type=text name='plname' value = '".$row['parentLname']."'></p>\n";
      echo "<p style='color: black'>First Name: <input type=text name='pfname' value = '".$row['parentFname']."'></p>\n";
      echo "<p style='color: black'>Phone Number: <input type=tel pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' select name='pphone' value = '".$row['parentPhone']."'></p>\n";
      echo "<p style='color: black'>Email: <input type=email placeholder='abc@example.com' name='pemail' value = '".$row['parentEmail']."'></p>\n";
      echo "<input type = 'hidden' name = 'sid' value = '".$row['studentID']."' />\n";
      echo "<center>";
      echo "<input type='submit'  class='btn btn-info' name='submit' value='Update'/>\n";
      echo "</center>";
			echo "</form>\n";
			echo "</div>\n";
      echo "</div>";
      echo "</div>\n";
		}
  		else {
  			$_SESSION["message"] = "Student could not be found!";
  			redirect("lstudents.php");
  		}
	  }
  }
  echo "<section>";
  echo "</section>";

echo "</header>";
home_footer(" Koichi Nishida ");
Database::dbDisconnect();
?>
