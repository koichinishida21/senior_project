<?php

require_once("session.php");
require_once("included_functions.php");
require_once("database.php");
$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (($output = message()) !== null) {
  echo $output;
}


home_header("Younglife Oxford");
?>
<header class="masthead" style="background-color: #FFFFFF;">

  <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <!-- Mashead text and app badges-->
                <div class="mb-5 mb-lg-0 text-center text-lg-start">
                    <h1 class="display-4 font-alt">Our Mission​</h1>
                    <p class="lead fw-normal text-muted mb-5">is to introduce adolescents to Jesus Christ and help them grow in their faith.</p>


                </div>
            </div>
            <div class="col-lg-2">
              <div class="mb-5 mb-lg-0 text-center text-lg-start">

                <img class="rounded-circle" alt="avatar1" src="https://i.ibb.co/RcnMVX5/DSC-0713.jpg" />
            </div>

        </div>
    </div>
</header>
<!-- Quote/testimonial aside-->
<aside class="text-center" style="background-color: #C5EDFD;">
    <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-xl-8">
                <div class="h2 fs-1 text-black mb-4">Young Life is a Christian ministry that reaches out to middle school, high school, and college students in all 50 of the United States and in more than 100 countries around the world.</div>
            </div>
        </div>
    </div>
</aside>
<?php
home_footer(" Koichi Nishida ");
Database::dbDisconnect();
?>
