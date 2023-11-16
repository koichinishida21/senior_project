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
  echo "<h2>Add a Leader</h2>";
  echo "</center>";

if (isset($_POST["submit"])) {

  if((isset($_POST["lname"])&& $_POST["lname"] !== "") &&(isset($_POST["fname"]) && $_POST["fname"] !== "")
  &&(isset($_POST["admin"]) && $_POST["admin"] !== "")
  && (isset($_POST["user"]) && $_POST["user"] !== "") && (isset($_POST["pwd"]) && $_POST["pwd"] !== "")
  && (isset($_POST["gender"]) && $_POST["gender"] !== "") && (isset($_POST["pos"]) && $_POST["pos"] !== "")
  && (isset($_POST["school"]) && $_POST["school"] !== "")&& (isset($_POST["church"]) && $_POST["church"] !== "")
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
      redirect("aleaders_c.php");

    }else{

      $query1 = "SELECT * FROM Committee WHERE committeeUser = ?";
      $stmt1 = $mysqli->prepare($query1);
      $stmt1-> execute([$_POST['user']]);

      if ($rowNum = $stmt1 -> rowCount() >= 1) {
        $_SESSION['message'] = "The username already exists";
        redirect("aleaders_c.php");
      }else{

        $query4 = "INSERT INTO Leader(leaderUser, lastName, firstName, gender, pos,
        address, city, stateNum, phone, email,
        parentLname, parentFname, parentPhone, parentEmail, schoolID,
        churchID, admin, password)
          VALUES (?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?,
            ?, ?, ?);";

        $stmt4 = $mysqli->prepare($query4);
        $stmt4-> execute([$_POST['user'], $_POST['lname'], $_POST['fname'], $_POST['gender'],
        $_POST['pos'], $_POST['address'], $_POST['city'], $_POST['state'],
        $_POST['phone'], $_POST['email'], $_POST['plname'], $_POST['pfname'],
        $_POST['pphone'], $_POST['pemail'], $_POST['school'], $_POST['church'], $_POST['admin'], $passwordEncrypt]);


            if($stmt4){

              $query5 = "SELECT leaderID FROM Leader WHERE lastName = ? and firstName = ? and phone = ?";
              $stmt5 = $mysqli ->prepare($query5);
              $stmt5 -> execute([$_POST['lname'], $_POST['fname'], $_POST['phone']]);

              if($stmt5) {
                $_SESSION['message'] = $_POST['lname']." has been added\n";
                redirect("aleaders.php");
              }else{
                $_SESSION["message"] = "Error!! Could not add " .$_POST['lname']."\n";
                redirect("aleaders.php");
              }

            }
              else{
                $_SESSION['message'] = "Error could not add a Leader\n" ;
                redirect("aleaders.php");
            }



        }
    }
    }else{
      $_SESSION['message'] = "Error could not add a leader\n" ;
      redirect("aleaders.php");
    }
}else {
    echo "<form action='aleaders_c.php' method='POST'>\n";
    echo "<div class='row'>";
    echo "<div class='col-lg-2'>";
    echo "</div>";
    echo "<div class='col-lg-5'>";
    echo "<h3 style='color: black'>Student's Information</h3>\n";
    echo "<p style='color: black'>Last Name*: <input type=text name='lname'></p>\n";
    echo "<p style='color: black'>First Name*: <input type=text name='fname'></p>\n";
    echo "<p style='color: black'>Username*: <input type=text name='user'></p>\n";
    echo "<p style='color: black'>Pssword*: <input type=password name='pwd'></p>\n";
    echo "<p style='color: black'>Gender*: <select name='gender'>";
    echo "<option value='M'>M</option>";
    echo "<option value='F'>F</option>";
    echo "<option value='N'>N</option>";
    echo "</select>\n";
    echo "</p>\n";

    echo "<p style='color: black'>Position*: <select name='pos'>";
    echo "<option value='Student Volunteer'>Student Volunteer</option>";
    echo "<option value='Student Staff'>Student Staff</option>";
    echo "<option value='Full Time Staff'>Full Time Staff</option>";
    echo "<option value='Part Time Staff'>Part Time Staff</option>";
    echo "<option value='Adult Volunteer'>Adult Volunteer</option>";
    echo "</select>\n";
    echo "</p>\n";
    echo "<p style='color: black'>Admin?*: <select name='admin'>";
    echo "<option value='0'>NO</option>";
    echo "<option value='1'>YES</option>";
    echo "</select>\n";
    echo "</p>\n";

    echo "<p style='color: black'>School*: <select name='school'>";
    $query11 = "SELECT * FROM School ORDER BY schoolID ASC";
    $stmt11 = $mysqli -> prepare($query11);
    $stmt11 -> execute();
    while($row = $stmt11->fetch(PDO::FETCH_ASSOC)) {
      echo "<option value =".$row["schoolID"].">".$row["name"]."</option>\n";
    }
    echo "</select>\n";
    echo "</p>\n";

    echo "<p style='color: black'>Church*: <select name='church'>";
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
    echo "<p style='color: black'>Phone Number: <input type=tel pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' placeholder='123-456-7890' name='phone'></p>\n";
    echo "<p style='color: black'>Email: <input type=email placeholder='abc@example.com' name='email'></p>\n";

    echo "</div>";
    echo "<div class='col-lg-5'>";
    echo "<h3 style='color: black'>Parent/Guardian Information</h3>\n";
    echo "<p style='color: black'>Last Name: <input type=text name='plname'></p>\n";
    echo "<p style='color: black'>First Name: <input type=text name='pfname'></p>\n";
    echo "<p style='color: black'>Phone Number: <input type=tel pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' placeholder='123-456-7890' name='pphone'></p>\n";
    echo "<p style='color: black'>Email: <input type=email placeholder='abc@example.com' name='pemail'></p>\n";
    echo "</select>\n";
    echo "</p>\n";

    echo "<center>";
    echo "<input type='submit'  class='btn btn-info' name='submit' value='Add'/>\n";
    echo "</center>";
    echo "</div>";
    echo "</form>\n";
    echo "</div>";
    echo "</div>\n";

}
echo "<section>";
echo "</section>\n";

home_footer(" Koichi Nishida ");
Database::dbDisconnect($mysqli);
?>
