<?php

require_once("session.php");
require_once("included_functions.php");
require_once("database.php");

if(empty($_SESSION['userID'])){
	"You are not logged in";
	redirect("login.php");
}

$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (($output = message()) !== null) {
  echo $output;
}


admin_header("Younglife Oxford Admin");

?>

					<header class="masthead" style="background-color: #FFFFFF;">
					</header>
					<center>
					<h1> Welcome to Admin Page </h1>
					<section>
					</section>
					</center>

					<center>
					<div class="row">
						<div class="col">
							</div>
					<div class="col">
					<a href='aprofile.php' type="button" class="btn btn-primary btn-lg">Edit Your Profile</a>
					</div>

					<div class="col">
					<a href='apwd.php' type="button" class="btn btn-primary btn-lg">Change Your Password</a>
					</div>
					<div class="col">
						</div>

					</div>

					</center>
					<section>
					</section>



        <?php
        home_footer(" Koichi Nishida ");
        Database::dbDisconnect();
        ?>
