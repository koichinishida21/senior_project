<?php

require_once("session.php");
require_once("included_functions.php");
require_once("database.php");

home_header("Younglife Oxford");

echo "<header class='masthead' style='background-color: #FFFFFF;'>";

$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if (($output = message()) !== null) {
		echo $output;
	}
			if (isset($_POST["submit"])) {

				$username = $_POST["username"];
				$password = $_POST["password"];

				$query = "SELECT password, leaderUser, leaderID, firstName, admin FROM Leader WHERE leaderUser = ?";
				$stmt =  $mysqli->prepare($query);
				$stmt-> execute([$username]);

				$query2 = "SELECT password, committeeUser, committeeID, firstName, admin FROM Committee WHERE committeeUser = ?";
				$stmt2 =  $mysqli->prepare($query2);
				$stmt2-> execute([$username]);

				if($stmt){	//for leaderUser

														if($stmt -> rowCount() !== 0){

															$row = $stmt->fetch(PDO::FETCH_ASSOC);

																		if(password_check($password, $row['password'])){

																			session_start();
																			$_SESSION['username'] = $row['leaderUser'];
																			$_SESSION['fname'] = $row['firstName'];

																			if($row['admin'] == 1){
																					$_SESSION['lusername'] = $row['leaderUser'];
																					$_SESSION['userID'] = $row['leaderID'];
																					redirect("admin.php");
																			}else{
																				$_SESSION['luserID'] = $row['leaderID'];
																				redirect("lhome.php");
																			}

																		}else{
																			$_SESSION['message'] = "Username/Password Not Found";
																			redirect("login.php");
																		}


													}else if($stmt2){ //for committeeUser

																				if($stmt2 -> rowCount() !== 0){
																					$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

																					if(password_check($password, $row2['password'])){

																						session_start();
																						$_SESSION['username'] = $row2['committeeUser'];
																						$_SESSION['fname'] = $row2['firstName'];

																						if($row2['admin'] == 1){
																								$_SESSION['cusername'] = $row2['committeeUser'];
																								$_SESSION['userID'] = $row2['committeeID'];
																								redirect("admin.php");

																						}else{

																							$_SESSION['cuserID'] = $row2['committeeID'];
																							redirect("chome.php");

																						}


																					}else{
																						$_SESSION['message'] = "Username/Password Not Found";
																						redirect("login.php");
																					}


																				}else{
																					$_SESSION['message'] = "Username/Password Not Found";
																					redirect("login.php");
																				}

													}else{
														$_SESSION['message'] = "Username/Password Not Found";
														redirect("login.php");
													}




			}else{
				$_SESSION['message'] = "3Username/Password Not Found";
				redirect("login.php");
			}
}

			echo "<form action='login.php' method='post'>\n";
?>
<section class="vh-100" style="background-color: #FFFFFF;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Log in</h3>

            <div class="form-outline mb-4">
              <input type="text" id="typeEmailX-2" name="username" class="form-control form-control-lg" placeholder = "Username" />
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg" placeholder = "Password" />
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Login</button>
					</form>






          </div>
        </div>
      </div>
    </div>
  </div>
	<center>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-placement='top' data-target="#exampleModal" title='Add'>
								<i class='btn btn-primary btn-lg'>Forgot Passowrd/Username?</i>
								</button>

								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Forgot Password/Username?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>

										<div class="modal-body">
											Contatct Admin: knishida@go.olemiss.edu
											<div class='modal-footer'>
											<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
										</div>
									</div>
									</div>
									</div>
									</div>
			</center>
</section>

<section>

</section>

<?php


	echo "</div>\n";
	echo "</label>\n";
	home_footer(" Koichi Nishida ");
Database::dbDisconnect();



 ?>
