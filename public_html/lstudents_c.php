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
echo "<h2>Add a Student</h2>";
echo "</center>";

if (isset($_POST["submit"])) {

  if((isset($_POST["lname"])&& $_POST["lname"] !== "") &&(isset($_POST["fname"]) && $_POST["fname"] !== "")
  &&(isset($_POST["leader"]) && $_POST["leader"] !== "")
  && (isset($_POST["gender"]) && $_POST["gender"] !== "")
  && (isset($_POST["school"]) && $_POST["school"] !== "")&& (isset($_POST["church"]) && $_POST["church"] !== "")
  && (isset($_POST["address"]) && $_POST["address"] !== "")&& (isset($_POST["city"]) && $_POST["city"] !== "")
  && (isset($_POST["state"]) && $_POST["state"] !== "")){

      $query4 = "INSERT INTO Student(leaderID, lastName, firstName, gender, highschoolGraduateYear, collegeGraduateYear, address,
        city, stateNum, phone, email, parentLname, parentFname, parentPhone, parentEmail, schoolID, churchID, description)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt4 = $mysqli->prepare($query4);
      $stmt4-> execute([$_POST['leader'], $_POST['lname'], $_POST['fname'], $_POST['gender'],
      $_POST['high'], $_POST['college'], $_POST['address'], $_POST['city'], $_POST['state'],
      $_POST['phone'], $_POST['email'], $_POST['plname'], $_POST['pfname'],
      $_POST['pphone'], $_POST['pemail'], $_POST['school'], $_POST['church'], $_POST['desc']]);


      if($stmt4){

        $query5 = "SELECT studentID FROM Student WHERE lastName = ? and firstName = ? and phone = ?";
        $stmt5 = $mysqli ->prepare($query5);
        $stmt5 -> execute([$_POST['lname'], $_POST['fname'], $_POST['phone']]);

        if($stmt5) {
          $_SESSION['message'] = $_POST['lname']." has been added\n";
          redirect("lstudents.php");
        }else{
          $_SESSION["message"] = "Error!! Could not add " .$_POST['lname']."\n";
        }
        redirect("lstudents.php");
      }
      else{
        $_SESSION['message'] = "Error could not add a Student\n" ;
        redirect("lstudents.php");
      }
      redirect("lstudents.php");
    }else{

      $_SESSION["message"] = "Unable to add a Student! Fill in all information!\n";
      redirect("lstudents.php");
    }
  redirect("lstudents.php");
}else {
    echo "<form action='lstudents_c.php' method='POST'>\n";
    echo "<div class='row'>";
    echo "<div class='col-lg-2'>";
    echo "</div>";
    echo "<div class='col-lg-5'>";
    echo "<h3 style='color: black'>Student Information</h3>\n";
    echo "<p style='color: black'>Last Name*: <input type=text name='lname'></p>\n";
    echo "<p style='color: black'>First Name*: <input type=text name='fname'></p>\n";
    echo "<p style='color: black'>Leader*: <select name='leader'>";
    $query11 = "SELECT CONCAT(Leader.firstName, ' ', Leader.lastName) as fullName, leaderID
    FROM Leader ORDER BY fullName ASC";
    $stmt11 = $mysqli -> prepare($query11);
    $stmt11 -> execute();
    while($row = $stmt11->fetch(PDO::FETCH_ASSOC)) {
      echo "<option value =".$row["leaderID"].">".$row["fullName"]."</option>\n";
    }
    echo "</select>\n";
    echo "</p>\n";
    echo "<p style='color: black'>Gender*: <select name='gender'>";

    echo "<option value='M'>M</option>";
    echo "<option value='F'>F</option>";
    echo "<option value='N'>N</option>";
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
    echo "<p style='color: black'>High School*: Class of <input type=number select name='high' min='2000' max='2050'>; College*: Class of <input type=number select name='college' min='2000' max='2050'></p>\n";
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
    echo "<p style='color: black'>Description: <input type=text name='desc'></p>\n";
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
?>
<section>
</section>
<?php


home_footer(" Koichi Nishida ");
Database::dbDisconnect($mysqli);

?>
