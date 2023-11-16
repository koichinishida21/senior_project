
<?php
	function redirect($new_location) {
		header("Location: " . $new_location);
		exit;
	}

	function home_header($name="YoungLife Oxford") {
		echo "<head>";
    echo    "<meta charset='utf-8' />";
    echo    "<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />";
    echo    "<meta name='description' content='' />";
    echo    "<meta name='author' content='' />";
    echo    "<title>YoungLife Oxford</title>";
    echo    "<link rel='icon' type='image/x-icon' href='assets/favicon.ico' />";
    echo    "<!-- Bootstrap icons-->";
    echo    "<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css' rel='stylesheet' />";
    echo    "  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>";
    echo    "<link rel='preconnect' href='https://fonts.gstatic.com' />";
		echo    "<link href='https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap' rel='stylesheet' />";
		echo    "<link href='https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap' rel='stylesheet' />";
		echo    "<link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap' rel='stylesheet' />";

		echo    "<link href='https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap' rel='stylesheet' />";
    echo    "<link href='https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap' rel='stylesheet' />";
    echo    "<link href='https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap' rel='stylesheet' />";
    echo    "<link href='css/styles.css' rel='stylesheet' />";
		echo 		"<link href='css/demo.css' rel='stylesheet' />";
		echo "	<link rel='stylesheet' href='css/normalize.css'>";
		echo "	<link rel='stylesheet' href='css/foundation.css'>";
		echo "<link rel='stylesheet' href='fonts/icomoon/style.css'>";
    echo "<link href='fullcalendar/packages/core/main.css' rel='stylesheet' />";
    echo "<link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />";
    echo "<link rel='stylesheet' href='css/bootstrap.min.css'>";
    echo "<link rel='stylesheet' href='css/style.css'>";
		echo "	<script src='js/vendor/modernizr.js'></script>";
		echo    "<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>";
    echo "</head>";
    echo "<body id='page-top' style='background-color: #FFFFFF;'>";
    echo    "<nav class='navbar navbar-expand-lg navbar-light fixed-top shadow-sm' id='mainNav'>";
    echo        "<div class='container px-5'>";
		echo 				"<a class='navbar-brand fw-bold' href='index.php'>YoungLife Oxford</a>";
    echo            	"<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>Menu<i class='bi-list'></i>";
    echo            "</button>";
    echo            "<div class='collapse navbar-collapse' id='navbarResponsive'>";
    echo                "<ul class='navbar-nav ms-auto me-4 my-3 my-lg-0'>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='about.php'>About</a></li>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='leaders.php'>Leaders</a></li>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='events.php'>Events</a></li>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='login.php'>Log in</a></li>";
		echo                "</ul>";
    echo            "</div>";
    echo        "</div>";
    echo    "</nav>";
	}

	function admin_header($name="YoungLife Oxford") {
		echo "<head>";
    echo    "<meta charset='utf-8' />";
    echo    "<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />";
    echo    "<meta name='description' content='' />";
    echo    "<meta name='author' content='' />";
    echo    "<title>YoungLife Oxford Admin</title>";
    echo    "<link rel='icon' type='image/x-icon' href='assets/favicon.ico' />";
    echo    "<!-- Bootstrap icons-->";
    echo    "<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css' rel='stylesheet' />";
    echo    "  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>";
    echo    "<link rel='preconnect' href='https://fonts.gstatic.com' />";
		echo    "<link href='https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap' rel='stylesheet' />";
		echo    "<link href='https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap' rel='stylesheet' />";
		echo    "<link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap' rel='stylesheet' />";

		echo    "<link href='https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap' rel='stylesheet' />";
    echo    "<link href='https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap' rel='stylesheet' />";
    echo    "<link href='https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap' rel='stylesheet' />";
    echo    "<link href='css/styles.css' rel='stylesheet' />";
		echo 		"<link href='css/demo.css' rel='stylesheet' />";
		echo "	<link rel='stylesheet' href='css/normalize.css'>";
		echo "	<link rel='stylesheet' href='css/foundation.css'>";
		echo "<link rel='stylesheet' href='fonts/icomoon/style.css'>";
    echo "<link href='fullcalendar/packages/core/main.css' rel='stylesheet' />";
    echo "<link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />";
    echo "<link rel='stylesheet' href='css/bootstrap.min.css'>";
    echo "<link rel='stylesheet' href='css/style.css'>";
		echo "	<script src='js/vendor/modernizr.js'></script>";
		echo    "<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>";
    echo "</head>";
    echo "<body id='page-top' style='background-color: #FFFFFF;'>";
    echo    "<nav class='navbar navbar-expand-lg navbar-light fixed-top shadow-sm' id='mainNav'>";
    echo        "<div class='container px-5'>";
		echo 				"<a class='navbar-brand fw-bold' href='admin.php'>YoungLife Oxford Admin</a>";
    echo            	"<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>Menu<i class='bi-list'></i>";
    echo            "</button>";
    echo            "<div class='collapse navbar-collapse' id='navbarResponsive'>";
    echo                "<ul class='navbar-nav ms-auto me-4 my-3 my-lg-0'>";
		echo                  "<li class='nav-item'><a class='nav-link me-lg-3' href='school.php'>School</a></li>";
    echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='students.php'>Students</a></li>";
    echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='aleaders.php'>Leaders</a></li>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='comm.php'>Committee</a></li>";
    echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='aevents.php'>Events</a></li>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='logout.php'>Log Out</a></li>";
    echo                "</ul>";
    echo            "</div>";
    echo        "</div>";
    echo    "</nav>";
	}

	function comm_header($name="YoungLife Oxford") {
		echo "<head>";
    echo    "<meta charset='utf-8' />";
    echo    "<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />";
    echo    "<meta name='description' content='' />";
    echo    "<meta name='author' content='' />";
    echo    "<title>YoungLife Oxford Committee</title>";
    echo    "<link rel='icon' type='image/x-icon' href='assets/favicon.ico' />";
    echo    "<!-- Bootstrap icons-->";
    echo    "<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css' rel='stylesheet' />";
    echo    "  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>";
    echo    "<link rel='preconnect' href='https://fonts.gstatic.com' />";
		echo    "<link href='https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap' rel='stylesheet' />";
		echo    "<link href='https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap' rel='stylesheet' />";
		echo    "<link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap' rel='stylesheet' />";

		echo    "<link href='https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap' rel='stylesheet' />";
    echo    "<link href='https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap' rel='stylesheet' />";
    echo    "<link href='https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap' rel='stylesheet' />";
    echo    "<link href='css/styles.css' rel='stylesheet' />";
		echo 		"<link href='css/demo.css' rel='stylesheet' />";
		echo "	<link rel='stylesheet' href='css/normalize.css'>";
		echo "	<link rel='stylesheet' href='css/foundation.css'>";
		echo "<link rel='stylesheet' href='fonts/icomoon/style.css'>";
    echo "<link href='fullcalendar/packages/core/main.css' rel='stylesheet' />";
    echo "<link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />";
    echo "<link rel='stylesheet' href='css/bootstrap.min.css'>";
    echo "<link rel='stylesheet' href='css/style.css'>";
		echo "	<script src='js/vendor/modernizr.js'></script>";
		echo    "<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>";
    echo "</head>";
    echo "<body id='page-top' style='background-color: #FFFFFF;'>";
    echo    "<nav class='navbar navbar-expand-lg navbar-light fixed-top shadow-sm' id='mainNav'>";
    echo        "<div class='container px-5'>";
		echo 				"<a class='navbar-brand fw-bold' href='chome.php'>YoungLife Oxford Committee</a>";
    echo            	"<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>Menu<i class='bi-list'></i>";
    echo            "</button>";
    echo            "<div class='collapse navbar-collapse' id='navbarResponsive'>";
    echo                "<ul class='navbar-nav ms-auto me-4 my-3 my-lg-0'>";
    echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='cstudents.php'>Students</a></li>";
    echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='cleaders.php'>Leaders</a></li>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='ccomm.php'>Committee</a></li>";
    echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='cevents.php'>Events</a></li>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='logout.php'>Log Out</a></li>";
    echo                "</ul>";
    echo            "</div>";
    echo        "</div>";
    echo    "</nav>";
	}

	function leader_header($name="YoungLife Oxford") {
		echo "<head>";
    echo    "<meta charset='utf-8' />";
    echo    "<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />";
    echo    "<meta name='description' content='' />";
    echo    "<meta name='author' content='' />";
    echo    "<title>YoungLife Oxford Leader</title>";
    echo    "<link rel='icon' type='image/x-icon' href='assets/favicon.ico' />";
    echo    "<!-- Bootstrap icons-->";
    echo    "<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css' rel='stylesheet' />";
    echo    "  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>";
    echo    "<link rel='preconnect' href='https://fonts.gstatic.com' />";
		echo    "<link href='https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap' rel='stylesheet' />";
		echo    "<link href='https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap' rel='stylesheet' />";
		echo    "<link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap' rel='stylesheet' />";

		echo    "<link href='https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap' rel='stylesheet' />";
    echo    "<link href='https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap' rel='stylesheet' />";
    echo    "<link href='https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap' rel='stylesheet' />";
    echo    "<link href='css/styles.css' rel='stylesheet' />";
		echo 		"<link href='css/demo.css' rel='stylesheet' />";
		echo "	<link rel='stylesheet' href='css/normalize.css'>";
		echo "	<link rel='stylesheet' href='css/foundation.css'>";
		echo "<link rel='stylesheet' href='fonts/icomoon/style.css'>";
    echo "<link href='fullcalendar/packages/core/main.css' rel='stylesheet' />";
    echo "<link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />";
    echo "<link rel='stylesheet' href='css/bootstrap.min.css'>";
    echo "<link rel='stylesheet' href='css/style.css'>";
		echo "	<script src='js/vendor/modernizr.js'></script>";
		echo    "<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>";
    echo "</head>";
    echo "<body id='page-top' style='background-color: #FFFFFF;'>";
    echo    "<nav class='navbar navbar-expand-lg navbar-light fixed-top shadow-sm' id='mainNav'>";
    echo        "<div class='container px-5'>";
		echo 				"<a class='navbar-brand fw-bold' href='lhome.php'>YoungLife Oxford Leader</a>";
    echo            	"<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>Menu<i class='bi-list'></i>";
    echo            "</button>";
    echo            "<div class='collapse navbar-collapse' id='navbarResponsive'>";
    echo                "<ul class='navbar-nav ms-auto me-4 my-3 my-lg-0'>";
		echo                  "<li class='nav-item'><a class='nav-link me-lg-3' href='lschool.php'>School</a></li>";
    echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='lstudents.php'>Students</a></li>";
    echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='lleaders.php'>Leaders</a></li>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='lcomm.php'>Committee</a></li>";
    echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='levents.php'>Events</a></li>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='logout.php'>Log Out</a></li>";
    echo                "</ul>";
    echo            "</div>";
    echo        "</div>";
    echo    "</nav>";
	}

	function home_footer($name="Koichi Nishida"){
		date_default_timezone_set("America/Chicago");
		echo			"<footer class='bg-black text-center py-5'>";
		echo					"<div class='container px-5'>";
		echo							"<div class='text-white-50 small'>";
		echo									"<div class='mb-2'>Copyright {$name}".date("M Y")."</div>";
		echo							"</div>";
		echo					"</div>";
		echo			"</footer>";
		echo			"<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>";
		echo			"<script src='https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>";
		echo			"<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>";
		echo			"<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js'></script>";
		echo			"<script src='js/scripts.js'></script>";
		echo			"<script src='https://cdn.startbootstrap.com/sb-forms-latest.js'></script>";
		echo			"<script src='https://code.jquery.com/jquery-3.5.1.js'></script>";
		echo			"<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>";
		echo	"</body>";
		echo	"</html>";
	}

	function event_header($name="Koichi Nishida"){
		echo "<head>";
		echo    "<meta charset='utf-8' />";
		echo    "<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />";
		echo    "<meta name='description' content='' />";
		echo    "<meta name='author' content='' />";
		echo    "<title>YoungLife Oxford Admin</title>";
		echo    "<link rel='icon' type='image/x-icon' href='assets/favicon.ico' />";
		echo    "<!-- Bootstrap icons-->";
		echo    "<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css' rel='stylesheet' />";
		echo    "  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>";
		echo    "<link rel='preconnect' href='https://fonts.gstatic.com' />";
		echo    "<link href='https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap' rel='stylesheet' />";
		echo    "<link href='https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap' rel='stylesheet' />";
		echo    "<link href='https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap' rel='stylesheet' />";
		echo    "<link href='https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap' rel='stylesheet' />";
		echo    "<link href='css/styles.css' rel='stylesheet' />";
		echo 		"<link href='css/demo.css' rel='stylesheet' />";
		echo "	<link rel='stylesheet' href='css/normalize.css'>";
		echo "	<link rel='stylesheet' href='css/foundation.css'>";
		echo "	<script src='js/vendor/modernizr.js'></script>";
		echo    "<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>";
		echo "</head>";
		echo "<body id='page-top'>";
		echo    "<nav class='navbar navbar-expand-lg navbar-light fixed-top shadow-sm' id='mainNav'>";
		echo        "<div class='container px-5'>";
		echo 				"<a class='navbar-brand fw-bold' href='admin.php'>YoungLife Oxford Admin</a>";
		echo            	"<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>Menu<i class='bi-list'></i>";
		echo            "</button>";
		echo            "<div class='collapse navbar-collapse' id='navbarResponsive'>";
		echo                "<ul class='navbar-nav ms-auto me-4 my-3 my-lg-0'>";
		echo                  "<li class='nav-item'><a class='nav-link me-lg-3' href='school.php'>School</a></li>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='students.php'>Students</a></li>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='aleaders.php'>Leaders</a></li>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='comm.php'>Committee</a></li>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='aevents.php'>Events</a></li>";
		echo                    "<li class='nav-item'><a class='nav-link me-lg-3' href='logout.php'>Log Out</a></li>";
		echo                "</ul>";
		echo            "</div>";
		echo        "</div>";
		echo    "</nav>";

	}

	function print_alert($name="Koichi Nishida") {
		echo "<br />";
		echo "<div class='row'>";
		echo "<div data-alert class='alert-box info round'>".$name;

		echo "</div>";
		echo "</div>";

	}

	function password_encrypt($password) {
	  $hash_format = "$2y$10$";   // Use Blowfish with a "cost" of 10
	  $salt_length = 22; 					// Blowfish salts should be 22-characters or more
	  $salt = generate_salt($salt_length);
	  $format_and_salt = $hash_format . $salt;
	  $hash = crypt($password, $format_and_salt);
	  return $hash;
	}

	function generate_salt($length) {
	  // MD5 returns 32 characters
	  $unique_random_string = md5(uniqid(mt_rand(), true));

	  // Valid characters for a salt are [a-zA-Z0-9./]
	  $base64_string = base64_encode($unique_random_string);

	  // Replace '+' with '.' from the base64 encoding
	  $modified_base64_string = str_replace('+', '.', $base64_string);

	  // Truncate string to the correct length
	  $salt = substr($modified_base64_string, 0, $length);

		return $salt;
	}

	function password_check($password, $existing_hash) {
	  // existing hash contains format and salt at start
	  $hash = crypt($password, $existing_hash);
	  if ($hash === $existing_hash) {
	    return true;
	  }
	  else {
	    return false;
	  }
	}

	function getYear() {
    $currentDate = date('m-d');
    $start1 = '08-01';
    $end1 = '12-31';
		$start2 = '01-01';
    $end2 = '07-31';
		$schoolyear = date('Y');

    if ($currentDate >= $start1 && $currentDate <= $end1) {
        return $schoolyear + 1;
    } else if ($currentDate >= $start2 && $currentDate <= $end2){
        return $schoolyear;
    }


}

?>
