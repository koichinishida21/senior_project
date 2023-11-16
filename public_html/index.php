<!DOCTYPE html>
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

      <section>
        <div class="container-sm">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://i.ibb.co/XJ57bQ9/people-4817872-640.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://i.ibb.co/YRKLhZW/team-1474506-640.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://i.ibb.co/4Rrm7w3/football-461343-640.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
    </div>
      </section>

        <!-- Mashead header-->
        <header style="background-color: #FFFFFF;">
          <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 class="display-4 font-alt">You Were Made for This.</h1>
                            <p class="lead fw-normal text-muted mb-5">We go to kids, build bridges of authentic friendship, and introduce them to Jesus Christ.</p>

                        </div>
                    </div>
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-4">
                      <h1 class="display-4 font-alt">For Every Kid</h1>
                      <p class="lead fw-normal text-muted mb-5">Young Life is for all young people, wherever they live or whomever they are. We work with students from middle school to college and have specific ministries aimed at ensuring every kid feels a sense of belonging.</p>

                </div>
            </div>
        </header>
        <!-- Quote/testimonial aside-->
        <aside class="text-center bg-gradient-primary-to-secondary">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                        <div class="h2 fs-1 text-white mb-4">"Young Life is where I can be myself - broken and all - and I can trust that I will be loved and accepted for who I am." - Bryan</div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- App features section-->
        <section id="features">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div>
                        <div class="container-fluid px-5">
                            <div class="row gx-5">
                                <div class="col-md-6 mb-5">
                                    <div class="text-center">
                                        <i class="bi-people icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Contact Work</h3>
                                        <p class="text-muted mb-0">Going where kids are and building personal relationships with them</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-book icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Campaigners</h3>
                                        <p class="text-muted mb-0">Wishing to learn more or grow in their faith through study, service and leadership</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-5 mb-md-0">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-person icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Ownership</h3>
                                        <p class="text-muted mb-0">Working in community alongside like-minded adults (volunteer leaders, committee members, donors and staff)</p>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="text-center">
                                        <i class="bi-house icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Camp</h3>
                                        <p class="text-muted mb-0">Providing fun, adventurous, life-changing experiences</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        home_footer(" Koichi Nishida ");
        Database::dbDisconnect();
        ?>
