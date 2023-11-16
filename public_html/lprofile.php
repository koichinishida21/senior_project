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
      && (!empty($_POST['pos'])) && (!(trim($_POST['pos']) == ""))
	&& (!empty($_POST['gender'])) && (!(trim($_POST['gender']) == ""))
  && (!empty($_POST['school'])) && (!(trim($_POST['school']) == ""))
  && (!empty($_POST['church'])) && (!(trim($_POST['church']) == ""))
  && (!empty($_POST['address'])) && (!(trim($_POST['address']) == ""))
  && (!empty($_POST['city'])) && (!(trim($_POST['city']) == ""))
  && (!empty($_POST['state'])) && (!(trim($_POST['state']) == ""))){

        		$query3 = "UPDATE Leader SET lastName = ?, firstName = ?, gender = ?, pos = ?, address = ?, city = ? , stateNum = ?,
            phone = ?, email = ?, parentLname = ?, parentFname = ?,
            parentPhone = ?, parentEmail = ?, schoolID = ?, churchID = ?, admin = ? WHERE leaderID = ?;";
           	$stmt3 = $mysqli->prepare($query3);
        		$stmt3 -> execute([$_POST['lname'], $_POST['fname'], $_POST['gender'], $_POST['pos'],
            $_POST['address'], $_POST['city'], $_POST['state'],
            $_POST['phone'], $_POST['email'], $_POST['plname'], $_POST['pfname'],
            $_POST['pphone'], $_POST['pemail'], $_POST['school'], $_POST['church'], $_POST['admin'], $_POST['lid']]);

        		if($stmt3) {
        			$_SESSION['message'] = $_POST['lname']." has been updated";
        			redirect("lhome.php");
        		}else{
        			$_SESSION["message"] = "ERROR!! Could not update the Leader";
        			redirect("lhome.php");
        		}
        		redirect("lhome.php");


	}else{
		$_SESSION["message"] = "Unable to update a Leader! Fill in all information!";
		redirect("lhome.php");
	}

}else {


	  if (isset($_SESSION["luserID"]) && $_SESSION["luserID"] !== "") {
		  $query = "SELECT leaderID, lastName, firstName, gender, pos, leaderUser, password,
      city, Leader.stateNum, Leader.phone as lphone, Leader.email as lemail,
      parentFname, parentLname, Leader.address as laddress, city,
      parentPhone, parentEmail, admin,
      Leader.schoolID, Church.churchID, Church.name as cname, School.name as sname
      FROM Leader JOIN School JOIN Church JOIN State
      ON Leader.schoolID = School.schoolID and Church.churchID = Leader.churchID
      and State.stateNum = Leader.stateNum
      WHERE leaderID = ?;";
			$stmt = $mysqli->prepare($query);
			$stmt-> execute([$_SESSION["luserID"]]);


		if ($stmt)  {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
      echo "<form action='lprofile.php' method='POST'>\n";
      echo "<div class='row'>\n";
      echo "<div class='col-lg-2'>";
      echo "</div>";
      echo "<div class='col-lg-5'>";
      echo "<h3>Student Information</h3>\n";
      echo "<p style='color: black'>Last Name*: <input type=text name='lname' value = '".$row['lastName']."'></p>\n";
      echo "<p style='color: black'>First Name*: <input type=text name='fname' value = '".$row['firstName']."'></p>\n";
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
      echo "</p>\n";

      echo "<p style='color: black'>Position*: <select name='pos' value = '".$row['pos']."'>";
      echo "<option value='College Volunteer'";
       if($row["pos"] == 'College Volunteer'){
      echo " selected ";
            }
      echo ">College Volunteer</option>";
      echo "<option value='Adult Volunteer'";
       if($row["pos"] == 'Adult Volunteer'){
      echo " selected ";
            }
      echo ">Adult Volunteer</option>";
      echo "<option value='Student Staff'";
        if($row["pos"] == 'Student Staff'){
      echo " selected ";
           }
      echo ">Student Staff</option>";
      echo "<option value='Full Time Staff'";
        if($row["pos"] == 'Full Time Staff'){
      echo " selected ";
           }
      echo ">Full Time Staff</option>";
      echo "<option value='Part Time Staff'";
      if($row["pos"] == 'Part Time Staff'){
      echo " selected ";
         }
      echo ">Part Time Staff</option>";
      echo "</select>\n";
      echo "</p>\n";
      echo "<p style='color: black'>Admin?*: <select name='admin' value = '".$row['admin']."'>";
      echo "<option value= 0";
       if($row["admin"] == 0){
         echo " selected ";
      }
      echo ">NO</option>\n";
      if($row["admin"] == 1){
        echo " selected ";
      }
      echo ">YES</option>\n";
      echo "</select>\n";
      echo "</p>\n";

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
      echo "<p style='color: black'>Address*: <input type=text name='address' value = '".$row['laddress']."'></p>\n";
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
      echo "<p style='color: black'>Phone Number: <input type=tel pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' select name='phone' value = '".$row['lphone']."'></p>\n";
      echo "<p style='color: black'>Email: <input type=email name='email' value = '".$row['lemail']."'></p>\n";
      echo "</div>";
      echo "<div class='col-lg-5'>";
      echo "<h3 style='color: black'>Parent/Guardian Information</h3>\n";
      echo "<p style='color: black'>Last Name: <input type=text name='plname' value = '".$row['parentLname']."'></p>\n";
      echo "<p style='color: black'>First Name: <input type=text name='pfname' value = '".$row['parentFname']."'></p>\n";
      echo "<p style='color: black'>Phone Number: <input type=tel pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' select name='pphone' value = '".$row['parentPhone']."'></p>\n";
      echo "<p style='color: black'>Email: <input type=email placeholder='abc@example.com' name='pemail' value = '".$row['parentEmail']."'></p>\n";

      echo "<input type = 'hidden' name = 'lid' value = '".$row['leaderID']."' />\n";
      echo "<center>";
      echo "<input type='submit'  class='btn btn-info' name='submit' value='Update'/>\n";
      echo "</center>";
			echo "</form>\n";
			echo "</div>\n";
      echo "</div>";
      echo "</div>\n";
		}
  		else {
  			$_SESSION["message"] = "Leader could not be found!";
  			redirect("lhome.php");
  		}
	  }
    }
    echo "<section>";
    echo "</section>";
home_footer(" Koichi Nishida ");
Database::dbDisconnect($mysqli);

?>
