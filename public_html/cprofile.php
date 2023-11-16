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
echo "<center>";
echo "<h2>Update Information\n</h2>\n";
echo "</center>";




	if (isset($_POST["submit"])) {

    if((!empty($_POST['lname'])) && (!(trim($_POST['lname']) == ""))
    && (!empty($_POST['fname'])) && (!(trim($_POST['fname']) == ""))
  && (!empty($_POST['church'])) && (!(trim($_POST['church']) == ""))
  && (!empty($_POST['caddress'])) && (!(trim($_POST['caddress']) == ""))
  && (!empty($_POST['city'])) && (!(trim($_POST['city']) == ""))
  && (!empty($_POST['cphone'])) && (!(trim($_POST['cphone']) == ""))
  && (!empty($_POST['cemail'])) && (!(trim($_POST['cemail']) == ""))
  && (!empty($_POST['state'])) && (!(trim($_POST['state']) == ""))){

		$query3 = "UPDATE Committee SET lastName = ?, firstName = ?, address = ?, city = ? , stateNum = ?,
    phone = ?, email = ?, churchID = ?, admin = ? WHERE committeeID = ?;";
   	$stmt3 = $mysqli->prepare($query3);
		$stmt3 -> execute([$_POST['lname'], $_POST['fname'],
    $_POST['caddress'], $_POST['city'], $_POST['state'],
    $_POST['cphone'], $_POST['cemail'], $_POST['church'], $_POST['admin'], $_POST['cid']]);

        		if($stmt3) {
        			$_SESSION['message'] = $_POST['lname']." has been updated";
        			redirect("chome.php");
        		}else{
        			$_SESSION["message"] = "ERROR!! Could not update the Leader";
        			redirect("chome.php");
        		}
        		redirect("chome.php");


	}else{
		$_SESSION["message"] = "Unable to update a Leader! Fill in all information!";
		redirect("chome.php");
	}

}else {


	  if (isset($_SESSION["cuserID"]) && $_SESSION["cuserID"] !== "") {
		  $query = "SELECT committeeID, lastName, firstName, committeeUser,
      Committee.address as caddress, city, Committee.stateNum, Committee.phone as cphone, Committee.email as cemail, admin,
      Church.churchID, Church.name as cname
      FROM Committee JOIN Church JOIN State
      ON Church.churchID = Committee.churchID
      and State.stateNum = Committee.stateNum
      WHERE committeeID = ?;";
			$stmt = $mysqli->prepare($query);
			$stmt-> execute([$_SESSION["cuserID"]]);


		if ($stmt)  {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
      echo "<form action='cprofile.php' method='POST'>\n";
      echo "<div class='row'>\n";
      echo "<div class='col-lg-4'>";
      echo "</div>";
      echo "<div class='col-lg-5'>";
      echo "<p style='color: black'>Last Name*: <input type=text name='lname' value = '".$row['lastName']."'></p>\n";
      echo "<p style='color: black'>First Name*: <input type=text name='fname' value = '".$row['firstName']."'></p>\n";
      echo "<p style='color: black'>Username*: <input type=text name='user' value = '".$row['committeeUser']."'></p>\n";
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
      echo "<p style='color: black'>Address*: <input type=text name='caddress' value = '".$row['caddress']."'></p>\n";
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
      echo "<p style='color: black'>Phone Number*: <input type=tel pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' select name='cphone' value = '".$row['cphone']."'></p>\n";
      echo "<p style='color: black'>Email*: <input type=email name='cemail' value = '".$row['cemail']."'></p>\n";
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
      echo "<input type = 'hidden' name = 'cid' value = '".$row['committeeID']."' />\n";
			echo "</div>\n";
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
  			redirect("chome.php");
  		}
	  }
    }
    echo "<section>";
    echo "</section>";
home_footer(" Koichi Nishida ");
Database::dbDisconnect($mysqli);

?>
