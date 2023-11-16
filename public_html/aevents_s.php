<?php
require_once("session.php");
require_once("included_functions.php");
require_once("database.php");
  $mysqli = Database::dbConnect();
  $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  session_start();
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

  echo "<div class='row'>";
  echo "<label for='left-label' class='left inline'>";


  if (isset($_POST["submit"])) {

  if ((isset($_POST["eid"])&& $_POST["eid"] !== "") &&(isset($_POST["sid"])&& $_POST["sid"] !== "") &&(isset($_POST["type"])&& $_POST["type"] !== "")) {

    $query = "SELECT studentID, eventID FROM Signup WHERE studentID = ? and eventID = ?";
    $stmt =  $mysqli->prepare($query);
    $stmt-> execute([$_POST["sid"], $_POST["eid"]]);

    if($stmt){

      	if($stmt -> rowCount() == 0){
          $query2 = "INSERT INTO Signup(studentID, eventID, type) VALUES(?, ?, ?)";
          $stmt2 = $mysqli->prepare($query2);
          $stmt2-> execute([$_POST["sid"], $_POST["eid"], $_POST["type"]]);

          if ($stmt2) {
            $_SESSION['message'] = "Successfully added";
            redirect("aevents.php");
          }else {
            $_SESSION['message'] = "Could not be added";
            redirect("aevents.php");
          }

        }else{
          $_SESSION['message'] = "Already in Your Favorites!!";
          redirect("aevents.php");
        }

      }else{
        $_SESSION['message'] = "Error";
        redirect("aevents.php");
      }

    }else {
      $_SESSION["message"] = "Event could not be found!";
      redirect("aevents.php");
    }


  }else{

    if (isset($_GET["id"]) && $_GET["id"] !== "") {
     $query = "SELECT title, eventID
      FROM Events
      WHERE eventID = ?;";
     $stmt = $mysqli->prepare($query);
     $stmt-> execute([$_GET["id"]]);

     if ($stmt)  {
 			$row = $stmt->fetch(PDO::FETCH_ASSOC);

        echo "<form action='aevents_s.php' method='POST'>\n";
        echo "<div class='row'>";
        echo "<center>";

        echo "<h3 style='color: black'>Sign up for an Event!!</h3>\n";
        echo "</center>";
        echo "<div class='col-lg-4'>";
        echo "</div>";
        echo "<div class='col-lg-5'>";
        echo "<p style='color: black'>Event Name: ".$row['title']."</p>\n";
        echo "<p style='color: black'>Student: <select name='sid'>";
        $query1 = "SELECT studentID, CONCAT(firstName, ' ', lastName) as full FROM Student ORDER BY full ASC";
        $stmt1 = $mysqli -> prepare($query1);
        $stmt1 -> execute();
        while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
          echo "<option value =".$row1["studentID"].">".$row1["full"]."</option>\n";
        }
        echo "</select>\n";
        echo "</p>\n";
        echo "<p style='color: black'>Type: <select name='type'>";
        echo "<option value='Camper'>Camper</option>";
        echo "<option value='Intern'>Intern</option>";
        echo "<option value='Work Crew'>Work Crew</option>";
        echo "<option value='Summer Staff'>Summer Satff</option>";
        echo "<option value='Leader'>Leader</option>";
        echo "<option value='Others'>Others</option>";
        echo "</select>\n";
        echo "</p>\n";
        echo "<input type = 'hidden' name = 'eid' value = '".$row['eventID']."' />\n";
        echo "</div>";
        echo "<center>";
        echo "<input type='submit'  class='btn btn-info' name='submit' value='Sign up'/>\n";
        echo "</center>";
        echo "</form>\n";

    }
  }
}

echo "</label>";
echo "</div>";
echo "</header>";
  home_footer("Koichi Nishida");
  Database::dbDisconnect($mysqli);

  ?>
