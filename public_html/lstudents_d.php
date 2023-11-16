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


    if (isset($_GET["id"]) && $_GET["id"] !== "") {

        $query = "DELETE FROM Student WHERE studentID = ?";
        $stmt = $mysqli->prepare($query);
        $stmt-> execute([$_GET["id"]]);

        if ($stmt) {
          $_SESSION['message'] = "Successfully deleted";
          redirect("lstudents.php");
      }	else {
          $_SESSION['message'] = "Could not be deleted";
          redirect("lstudents.php");
    		}

  }else {
  		$_SESSION["message"] = "Student could not be found!";
      redirect("lstudents.php");
  	}

  Database::dbDisconnect($mysqli);

?>
