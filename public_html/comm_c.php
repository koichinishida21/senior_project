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

  echo "<center>";
  echo "<h2>Add a Committee</h2>";
  echo "</center>";

if (isset($_POST["submit"])) {

  if((isset($_POST["lname"])&& $_POST["lname"] !== "") &&(isset($_POST["fname"]) && $_POST["fname"] !== "")
  && (isset($_POST["phone"]) && $_POST["phone"] !== "")&& (isset($_POST["email"]) && $_POST["email"] !== "")
  && (isset($_POST["church"]) && $_POST["church"] !== "")
  && (isset($_POST["user"]) && $_POST["user"] !== "") && (isset($_POST["pwd"]) && $_POST["pwd"] !== "")
  && (isset($_POST["address"]) && $_POST["address"] !== "")&& (isset($_POST["city"]) && $_POST["city"] !== "")
  && (isset($_POST["state"]) && $_POST["state"] !== "")
  ){

      $user = $_POST["user"];
      $pwd = $_POST["pwd"];
      $passwordEncrypt = password_encrypt($pwd);

      $query = "SELECT * FROM Leader WHERE leaderUser = ?";
      $stmt = $mysqli->prepare($query);
      $stmt-> execute([$_POST['user']]);

      if ($rowNum = $stmt -> rowCount() >= 1) {
        $_SESSION['message'] = "The username already exists";
        redirect("comm.php");

      }else{

        $query1 = "SELECT * FROM Committee WHERE committeeUser = ?";
        $stmt1 = $mysqli->prepare($query1);
        $stmt1-> execute([$_POST['user']]);

        if ($rowNum = $stmt1 -> rowCount() >= 1) {
          $_SESSION['message'] = "The username already exists";
          redirect("comm.php");
        }else{
          $query4 = "INSERT INTO Committee(committeeUser, lastName, firstName,
          address, city, stateNum, phone, email, churchID, admin, password)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt4 = $mysqli->prepare($query4);
          $stmt4-> execute([$_POST['user'], $_POST['lname'], $_POST['fname'],
          $_POST['address'], $_POST['city'], $_POST['state'],
          $_POST['phone'], $_POST['email'], $_POST['church'], $_POST['admin'], $_POST['pwd']]);


          if($stmt4){

            $query5 = "SELECT committeeID FROM Committee WHERE lastName = ? and firstName = ? and phone = ?";
            $stmt5 = $mysqli ->prepare($query5);
            $stmt5 -> execute([$_POST['lname'], $_POST['fname'], $_POST['phone']]);

            if($stmt5) {
              $_SESSION['message'] = $_POST['lname']." has been added\n";
              redirect("comm.php");
            }else{
              $_SESSION["message"] = "Error!! Could not add " .$_POST['lname']."\n";
              redirect("comm.php");
            }



          }else{
            $_SESSION['message'] = "Error could not add a Committee\n" ;
            redirect("comm.php");
          }
        }
      }


    }else {

      $_SESSION["message"] = "Unable to add a Committee! Fill in all information!\n";
      redirect("comm.php");
    }


}else {
    echo "<form action='comm_c.php' method='POST'>\n";
    echo "<div class='row'>";
    echo "<div class='col-lg-4'>";
    echo "</div>";
    echo "<div class='col-lg-5'>";
    echo "<p style='color: black'>Last Name*: <input type=text name='lname'></p>\n";
    echo "<p style='color: black'>First Name*: <input type=text name='fname'></p>\n";
    echo "<p style='color: black'>Username*: <input type=text name='user'></p>\n";
    echo "<p style='color: black'>Pssword*: <input type=password name='pwd'></p>\n";
    echo "<p style='color: black'>Church: <select name='church'>";
    $query12 = "SELECT * FROM Church ORDER BY churchID ASC";
    $stmt12 = $mysqli -> prepare($query12);
    $stmt12 -> execute();
    while($row = $stmt12->fetch(PDO::FETCH_ASSOC)) {
      echo "<option value =".$row["churchID"].">".$row["name"]."</option>\n";
    }
    echo "</select>\n";
    echo "</p>\n";
    echo "<p style='color: black'>Address*: <input type=text name='address'></p>\n";
    echo "<p style='color: black'>City*: <input type=text name='city'> State*: <select name='state'>";
    $query13 = "SELECT * FROM State ORDER BY stateCode ASC";
    $stmt13 = $mysqli -> prepare($query13);
    $stmt13 -> execute();
    while($row = $stmt13->fetch(PDO::FETCH_ASSOC)) {
      echo "<option value =".$row["stateNum"].">".$row["stateCode"]."</option>\n";
    }
    echo "</select>\n";
    echo "</p>\n";
    echo "<p style='color: black'>Phone Number*: <input type=tel pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' placeholder='123-456-7890' name='phone'></p>\n";
    echo "<p style='color: black'>Email*: <input type=email placeholder='abc@example.com' name='email'></p>\n";
    echo "<p style='color: black'>Admin?*: <select name='admin'>";
    echo "<option value='0'>No</option>";
    echo "<option value='1'>YES</option>";
    echo "</select>\n";
    echo "</p>\n";
    echo "</div>";
    echo "<center>";
    echo "<input type='submit'  class='btn btn-info' name='submit' value='Add'/>\n";
    echo "</center>";
    echo "</form>\n";
    echo "</div>";
    echo "</div>\n";

    }
    echo "<section>";
    echo "</section>";

    home_footer(" Koichi Nishida ");
    Database::dbDisconnect($mysqli);
    ?>
