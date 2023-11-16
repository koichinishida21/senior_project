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
echo "<h2>Change Your Password\n</h2>\n";
echo "<br>";
echo "</center>";
	if (isset($_POST["submit"])) {
		if($_POST['password'] == $_POST['password1']){

	    if((!empty($_POST['password'])) && (!(trim($_POST['password']) == "")) ){

	      $pwd = $_POST["password"];
	  		$passwordEncrypt = password_encrypt($pwd);

  			$query3 = "UPDATE Leader SET password = ? WHERE leaderID = ?;";
  	   	$stmt3 = $mysqli->prepare($query3);
  			$stmt3 -> execute([$passwordEncrypt, $_SESSION['userID']]);

  			if($stmt3) {
  				$_SESSION['message'] = "Your password has been updated";
  	      redirect("admin.php");
  			}else{
  				$_SESSION["message"] = "ERROR!! Could not update your password!!";
          redirect("apwd.php");
  			}


  		}else{
  	    $_SESSION['message'] = "Could not update your password!! Fill in your new password!";
  	    redirect("apwd.php");
  	  }

  }else{
  	$_SESSION['message'] = "Password does not match";
  	redirect("apwd.php");
  }


}else {

      echo "<form action='apwd.php' method='POST'>\n";
      echo "<center>";
      echo "<p style='color: black'>New Password: <input type=password name='password' value = ''></p>\n";
			echo "<p style='color: black'>Confirm New Password: <input type=password name='password1' value = ''></p>\n";
      echo "<br>";
      echo "<input type='submit'  class='btn btn-info' name='submit' value='Update'/>\n";
			echo "</form>\n";
			echo "</div>\n";
      echo "</center>";

    }
    echo "<section>";
    echo "</section>";

home_footer(" Koichi Nishida ");
Database::dbDisconnect($mysqli);

?>
