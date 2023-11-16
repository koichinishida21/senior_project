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


    if (isset($_GET["id"]) && $_GET["id"] !== "") {

        $query = "DELETE FROM Events WHERE eventID = ?";
        $stmt = $mysqli->prepare($query);
        $stmt-> execute([$_GET["id"]]);

        if ($stmt) {
          $_SESSION['message'] = "Successfully deleted";
          redirect("cevents.php");
      }	else {
          $_SESSION['message'] = "Could not be deleted";
          redirect("cevents.php");
    		}

  }else {
  		$_SESSION["message"] = "Event could not be found!";
      redirect("cevents.php");
  	}

  Database::dbDisconnect($mysqli);

?>
