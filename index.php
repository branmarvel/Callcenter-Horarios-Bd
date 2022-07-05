<?php
include 'functions.php';
?>
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
	<div class="login-container">
		<div class="login-content">
			<p class="text-center">
				<i class="fas fa-user-circle fa-5x"></i>
			</p>
			<p class="text-center">
				Inicia sesión con tu cuenta
			</p>
			<form action="">
				<div class="form-group">
					<label for="UserName" class="bmd-label-floating"><i class="fas fa-user-secret"></i> &nbsp; Usuario</label>
					<input type="text" class="form-control" id="UserName" name="usuario" pattern="[a-zA-Z0-9]{1,35}" maxlength="35">
				</div>
				<div class="form-group">
					<label for="UserPassword" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp; Contraseña</label>
					<input type="password" class="form-control" id="UserPassword" name="clave" maxlength="200">
				</div>
				<a href="read.php" class="btn-login text-center">LOG IN</a>
			</form>
		</div>
	</div>



<?=template_footer()?>