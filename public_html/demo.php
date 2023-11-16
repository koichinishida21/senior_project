
<?php

require_once("session.php");
require_once("included_functions.php");
require_once("database.php");

$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	if (isset($_POST["submit"])) {
    $passwordEncrypt = password_encrypt($_POST['password']);

    echo $passwordEncrypt;


  }

echo "<form action='demo.php' method='post'>\n";
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
</section>

<?php
Database::dbDisconnect();



 ?>
