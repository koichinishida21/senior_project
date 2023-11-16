<!DOCTYPE html>
<!-- header -->
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
<h1 class='fst-italic'>&nbsp;&nbsp;&nbsp;Event Calendar</h1>

<div class="col-xs-6">
</div>

<section>
<div class='container col-xs-6'>
    <div id='calendar' style="background-color: #FFFFFF;"></div>
</div>
</section>
</header>
<section>
<?php
  $query = "SELECT eventID, title, description, startDate, endDate
  FROM Events
  WHERE startDate >= CURRENT_DATE()
  ORDER by startDate DESC;";

  $stmt = $mysqli -> query($query);
  $stmt -> execute();

  if ($stmt) {
    echo "<br>";
    echo "<table class='table align-middle mb-0 bg-white'>";
    echo "<tbody>";
    echo "<thead class='bg-light'>";
    echo "<h3 class='fst-italic'>&nbsp;&nbsp;&nbsp;Future Events";
    echo "</h3>";
    echo "<tr>";
    echo  "<th>Event</th>";
    echo   "<th>Description</th>";
    echo   "<th>Start Date</th>";
    echo   "<th>End Date</th>";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      echo  "<td>".$row['title']."</td>";
      echo  "<td>".$row['description']."</td>";
      echo  "<td>".$row['startDate']."</td>";
      echo  "<td>".$row['endDate']."</td>";
      echo "</tr>";
    }
    echo "</thead>";
    echo "</tbody>";
    echo "</table>";
    echo "<br>";
    }

    $query = "SELECT eventID, title, description, startDate, endDate
    FROM Events
    WHERE startDate < CURRENT_DATE()
    ORDER by startDate DESC;";

    $stmt = $mysqli -> query($query);
    $stmt -> execute();

    if ($stmt) {
      echo "<br>";
      echo "<table class='table align-middle mb-0 bg-white'>";
      echo "<tbody>";
      echo "<thead class='bg-light'>";
      echo "<h3 class='fst-italic'>&nbsp;&nbsp;&nbsp;Past Events";
      echo "</h3>";
      echo "<tr>";
      echo  "<th>Event</th>";
      echo   "<th>Description</th>";
      echo   "<th>Start Date</th>";
      echo   "<th>End Date</th>";
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo  "<td>".$row['title']."</td>";
        echo  "<td>".$row['description']."</td>";
        echo  "<td>".$row['startDate']."</td>";
        echo  "<td>".$row['endDate']."</td>";
        echo "</tr>";
      }
      echo "</thead>";
      echo "</tbody>";
      echo "</table>";
      echo "<br>";
      }
?>

      </section>



        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
        <?php echo            "<div class='mb-2'>Copyright Koichi Nishida ".date("M Y")."</div>"; ?>
                </div>
            </div>
        </footer>
          <script src="js/jquery-3.3.1.min.js"></script>
          <script src="js/popper.min.js"></script>
          <script src="js/bootstrap.min.js"></script>

          <script src='fullcalendar/packages/core/main.js'></script>
          <script src='fullcalendar/packages/interaction/main.js'></script>
          <script src='fullcalendar/packages/daygrid/main.js'></script>
          <script src='fullcalendar/packages/timegrid/main.js'></script>
          <script src='fullcalendar/packages/list/main.js'></script>

          <?php
          $currentDate = date('Y-m-d');
          ?>

          <script>
            document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');

          var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
            height: 'parent',
            header: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            defaultView: 'dayGridMonth',
            defaultDate: '<?php echo date('Y-m-d') ?>',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
            <?php
              $query = "SELECT eventID, title, description, startDate, endDate
              FROM Events;";

              $stmt = $mysqli -> query($query);
              $stmt -> execute();

              if ($stmt) {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo "{";
                  echo "title: '".$row['title']."',";
                  echo "start: '".$row['startDate']."',";
                  echo "end: '".$row['endDate']."',";
                  echo "},";
                }
              }
            ?>
            ]
          });

          calendar.render();
        });

          </script>

          <script src="js/main.js"></script>

          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
          <script src="js/scripts.js"></script>
          <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
          </body>
          </html>
        <?
        Database::dbDisconnect();
        ?>
