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

  if(empty($_SESSION['cuserID'])){
    echo "You are not logged in";
    redirect("login.php");
  }

  comm_header("Younglife Oxford Committee");

 ?>
 <header class="masthead" style="background-color: #FFFFFF;">
<?php


    echo "<h3>Post an Event</h3>";
    echo "<div class='row'>";
    echo "<label for='left-label' class='left inline'>";

      if (isset($_POST["submit"])) {

        if((isset($_POST["title"])&& $_POST["title"] !== "") &&(isset($_POST["desc"]) && $_POST["desc"] !== "")
        && (isset($_POST["start"]) && $_POST["start"] !== "")&& (isset($_POST["end"]) && $_POST["end"] !== "")){

            $query4 = "INSERT INTO Events(title, description, startDate, endDate) VALUES (?, ?, ?, ?)";
            $stmt4 = $mysqli->prepare($query4);
            $stmt4-> execute([$_POST['title'], $_POST['desc'], $_POST['start'], $_POST['end']]);


            if($stmt4){
              $query5 = "SELECT eventID FROM Events WHERE title = ?";
              $stmt5 = $mysqli ->prepare($query5);
              $stmt5 -> execute([$_POST['title']]);

                if($stmt5) {
                  $_SESSION['message'] = $_POST['title']." has been added";
      						redirect("cevents.php");
                }else{
                  $_SESSION["message"] = "Error!! Could not add " .$_POST['title']."";
      						redirect("cevents.php");
                }
            }else{
              $_SESSION['message'] = "Error could not add an Event" ;
              redirect("cevents.php");
            }


				}else{
					$_SESSION['message'] = "Unable to add an Event! Fill in all information!" ;
          redirect("cevents.php");
				}

        redirect("cevents.php");
    }else {
          echo "<form action='cevents_c.php' method='POST'>\n";
          echo "<p style='color: black'>Event Name: <input type=text name='title' size = '150'></p>\n";
          echo "<p style='color: black'>Description: <input type=text name='desc' size = '150'></p>\n";
    			echo "<p style='color: black'>Start Date: <input type=date name='start'></p>\n";
          echo "<p style='color: black'>End Date: <input type=date name='end'></p>\n";
          echo "<input type='submit' name='submit' value='Post'/>\n";
          echo "</form>\n";
    }
    echo "</label>\n";
    echo "</div>";
    echo "</header>";
    home_footer("Koichi Nishida");
    Database::dbDisconnect($mysqli);

    ?>
