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
		
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>Call center XYZ- Asignacion de horarios</h1>
            <a href="index.php"><i class="fas fa-home"></i>Home</a>		
    		<a href="read.php"><i class="fas fa-clock"></i>Lista de horarios</a>
			<a href="read_hextras.php"><i class="fas fa-hourglass-half"></i>Horas Extras</a>
			<a href="Read_asignar.php"><i class="fas fa-clock"></i>Horarios Asignados</a>
    	</div>
    </nav>
EOT;
}

function template_footer() {
echo <<<EOT

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
