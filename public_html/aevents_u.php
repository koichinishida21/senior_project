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


  echo "<div class='row'>\n";
	echo "<label for='left-label' class='left inline'>\n";

	if (isset($_POST["submit"])) {

		if((!empty($_POST['title'])) && (!(trim($_POST['title']) == ""))
    && (!empty($_POST['desc'])) && (!(trim($_POST['desc']) == ""))
	&& (!empty($_POST['start'])) && (!(trim($_POST['start']) == ""))
  && (!empty($_POST['end'])) && (!(trim($_POST['end']) == ""))){

		$query3 = "UPDATE Events SET title = ?, description = ?, startDate = ?, endDate = ? WHERE eventID = ?;";
   	$stmt3 = $mysqli->prepare($query3);
		$stmt3 -> execute([$_POST['title'], $_POST['desc'], $_POST['start'], $_POST['end'], $_POST['eid']]);

		if($stmt3) {
			$_SESSION['message'] = "The Event has been updated";
			redirect("aevents.php");
		}else{
			$_SESSION["message"] = "ERROR!! Could not update the Event";
			redirect("aevents.php");
		}
		redirect("aevents.php");

	}else{
		$_SESSION["message"] = "Unable to update an Event! Fill in all information!";
		redirect("aevents.php");
	}

	redirect("aevents.php");
}
	else {


	  if (isset($_GET["id"]) && $_GET["id"] !== "") {
		  $query = "SELECT title, description, startDate, endDate, eventID
      FROM Events
      WHERE eventID = ?;";
			$stmt = $mysqli->prepare($query);
			$stmt-> execute([$_GET["id"]]);


		if ($stmt)  {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
      echo "<form action='aevents_u.php' method='POST'>\n";

      echo "<h2>Update Event Information</h2>\n";
      echo "<p>Event Name: <input type=text name='title' value = '".$row['title']."' size = '150'></p>\n";
      echo "<p>Description: <input type=text name='desc' value = '".$row['description']."' size = '150'></p>\n";
      echo "<p>Start Date: <input type=date name='start' value = '".$row['startDate']."'></p>\n";
      echo "<p>End Date: <input type=date name='end' value = '".$row['endDate']."'></p>\n";
      echo "<input type = 'hidden' name = 'eid' value = '".$row['eventID']."' />\n";
      echo "<input type='submit' name='submit' value='Update'/>\n";
			echo "</form>\n";
			echo "</label>\n";
			echo "</div>\n";
		}
  		else {
  			$_SESSION["message"] = "Event could not be found!";
  			redirect("aevents.php");
  		}
	  }
    }

home_footer(" Koichi Nishida ");
Database::dbDisconnect($mysqli);

?>
