<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'callcenter';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Horarios</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href=".\Lib\select2\css\select2.min.css" rel="stylesheet" />
		<!-- Normalize V8.0.1 -->
		<link rel="stylesheet" href="./css/normalize.css">
	
		<!-- Bootstrap V4.3 -->
		<link rel="stylesheet" href="./css/bootstrap.min.css">
	
		<!-- Bootstrap Material Design V4.0 -->
		<link rel="stylesheet" href="./css/bootstrap-material-design.min.css">
	
		<!-- Font Awesome V5.9.0 -->
		<link rel="stylesheet" href="./css/all.css">
	
		<!-- Sweet Alerts V8.13.0 CSS file -->
		<link rel="stylesheet" href="./css/sweetalert2.min.css">
	
		<!-- Sweet Alert V8.13.0 JS file -->
		<script src="./js/sweetalert2.min.js" ></script>
	
		<!-- jQuery Custom Content Scroller V3.1.5 -->
		<link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">
		
		<!-- General Styles -->
		<link rel="stylesheet" href="./css/style.css">		
	</head>
	<body>
	<main class="full-box main-container">
		<!-- Nav lateral -->
		<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<i class="far fa-times-circle show-nav-lateral"></i>
					<img src="./assets/avatar/Avatar.png" class="img-fluid" alt="Avatar">
					<figcaption class="roboto-medium text-center">
						Brandon Bello <br><small class="roboto-condensed-light">Administrador</small>
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
					<ul>
						<li>
							<a href="home.html"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Dashboard</a>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-business-time"></i> &nbsp; Horarios <i
									class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="client-new.html"><i class="far fa-calendar-plus"></i> &nbsp; ACTUALIZACION</a>
								</li>

								<li>
									<a href="client-new.html"><i class="far fa-clock"></i> &nbsp; HORARIOS</a>
								</li>
								<li>
									<a href="client-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
										TURNOS</a>
								</li>
								<li>
									<a href="client-search.html"><i class="fas fa-hourglass-half"></i> &nbsp; HORAS
										EXTRAS</a>
								</li>
							</ul>
						</li>

					</ul>
				</nav>
			</div>
		</section>
	
EOT;
}

function template_header_1($title) {
	echo <<<EOT
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>Horarios</title>
			<link href="style.css" rel="stylesheet" type="text/css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
			<link href=".\Lib\select2\css\select2.min.css" rel="stylesheet" />
			<!-- Normalize V8.0.1 -->
			<link rel="stylesheet" href="./css/normalize.css">
		
			<!-- Bootstrap V4.3 -->
			<link rel="stylesheet" href="./css/bootstrap.min.css">
		
			<!-- Bootstrap Material Design V4.0 -->
			<link rel="stylesheet" href="./css/bootstrap-material-design.min.css">
		
			<!-- Font Awesome V5.9.0 -->
			<link rel="stylesheet" href="./css/all.css">
		
			<!-- Sweet Alerts V8.13.0 CSS file -->
			<link rel="stylesheet" href="./css/sweetalert2.min.css">
		
			<!-- Sweet Alert V8.13.0 JS file -->
			<script src="./js/sweetalert2.min.js" ></script>
		
			<!-- jQuery Custom Content Scroller V3.1.5 -->
			<link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">
			
			<!-- General Styles -->
			<link rel="stylesheet" href="./css/style.css">		
		</head>
		<body>
		
	EOT;
	}
	
function template_footer() {
echo <<<EOT
</main>
<!--=============================================
=            Include JavaScript files           =
==============================================-->
<!-- jQuery V3.4.1 -->
<script src="./js/jquery-3.4.1.min.js" ></script>

<!-- popper -->
<script src="./js/popper.min.js" ></script>

<!-- Bootstrap V4.3 -->
<script src="./js/bootstrap.min.js" ></script>

<!-- jQuery Custom Content Scroller V3.1.5 -->
<script src="./js/jquery.mCustomScrollbar.concat.min.js" ></script>

<!-- Bootstrap Material Design V4.0 -->
<script src="./js/bootstrap-material-design.min.js" ></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

<script src=".\Lib\select2\js\select2.full.min.js"></script>
<script src=".\Lib\select2\js\select2-ready.js"></script>
    </body>
</html>
EOT;
}
?>
<script src="./Lib/jquery/jquery-3.6.0.min.js"></script>
