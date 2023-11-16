<?php
require_once("session.php");
require_once("included_functions.php");
require_once("database.php");
  $mysqli = Database::dbConnect();
  $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (($output = message()) !== null) {
    echo $output;
  }
  if(empty($_SESSION['cuserID'])){
  	echo "You are not logged in";
  	redirect("login.php");
  }


  comm_header("Younglife Oxford Committee");
 ?>

        <!-- header -->
        <header class="masthead" style="background-color: #FFFFFF;">
          <div class="col-md-7">
                <form action="" method="GET">
                    <div class="input-group mb-3">
                      <div class = "col-xs-2">
                        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                      </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

            </div>
              <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                  <tr>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
                    <th>Gender</th>
                    <th>School</th>
                    <th>Church</th>


                    <th>

                    </th>
                  </tr>
                </thead>
                <tbody>
            <?php
            require_once("session.php");
            require_once("included_functions.php");
            require_once("database.php");
              $mysqli = Database::dbConnect();
              $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              if (($output = message()) !== null) {
                echo $output;
              }

              if(isset($_GET['search'])){
                  $filtervalues = $_GET['search'];

                  $query1 = "SELECT studentID, CONCAT(firstName, ' ', lastName) as fullName, gender,
                  CONCAT(LEFT(firstName, 1),LEFT(lastName, 1)) as initial,
                  Student.schoolID, Church.churchID, Church.name as cname, School.name as sname
                  FROM Student JOIN School JOIN Church
                  ON Student.schoolID = School.schoolID and Church.churchID = Student.churchID
                  WHERE CONCAT(firstName, lastName, Church.name, School.name, gender) LIKE '%$filtervalues%' ";

                  $stmt1 = $mysqli -> query($query1);
                  $stmt1 -> execute();


                  if ($stmt1) {

                    while($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {

                          echo "<tr>" ;
                          echo "<td>" ;
                            echo "<div class='d-flex align-items-center'>";
                            echo    "<div class='round-button'><div class='round-button-circle'><a class='round-button'>".$row['initial']."</a></div></div>";
                            echo      "<div class='ms-3'>";
                            echo        "<p class='fw-bold mb-1' style='color: black'>".$row['fullName']."</p>";
                            echo      "</div>";
                            echo    "</div>";
                            echo  "</td>";
                          ?>
                              <td><?= $row['gender']; ?></td>
                              <td><?= $row['sname']; ?></td>
                              <td><?= $row['cname']; ?></td>
                          <?php

                          echo "</tr>";
                        }
                        echo "</tbody>";
                      echo "</table>";
                    echo "</header>";

                }

                  else
                  {
                      ?>
                          <tr>
                              <td colspan="4">No Record Found</td>
                          </tr>
                      <?php
                  }
              }

              else{

              $query = "SELECT studentID, CONCAT(firstName, ' ', lastName) as fullName, gender,CONCAT(LEFT(firstName, 1),LEFT(lastName, 1)) as initial,
              Student.schoolID, Church.churchID, Church.name as cname, School.name as sname
              FROM Student JOIN School JOIN Church
              ON Student.schoolID = School.schoolID and Church.churchID = Student.churchID
              ORDER by studentID;";

              $stmt = $mysqli -> query($query);
              $stmt -> execute();

              if ($stmt) {

                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo "<tr>";
                  echo  "<td>";
                  echo    "<div class='d-flex align-items-center'>";
                  echo    "<div class='round-button'><div class='round-button-circle'><a class='round-button'>".$row['initial']."</a></div></div>";
                  echo      "<div class='ms-3'>";
                  echo        "<p class='fw-bold mb-1' style='color: black'>".$row['fullName']."</p>";
                  echo      "</div>";
                  echo    "</div>";
                  echo  "</td>";
                  echo  "<td>".$row['gender']."</td>";
                  echo  "<td>".$row['sname']."</td>";
                  echo  "<td>".$row['cname']."</td>";

                  echo "</tr>";
                }
                echo "</tbody>";
              echo "</table>";
            echo "</header>";
              }
            }

            home_footer(" Koichi Nishida ");
              Database::dbDisconnect($mysqli);

            ?>
