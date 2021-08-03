<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuarios</title>
	<link rel="stylesheet" href="src/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="src/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
	<link rel="stylesheet" href="src/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="src/assets/vendors/css/vendor.bundle.base.css">
	<link rel="stylesheet" href="src/assets/vendors/css/vendor.bundle.addons.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="src/assets/css/shared/style.css">
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="src/assets/css/demo_1/style.css">
	<!-- End Layout styles -->
	<link rel="shortcut icon" href="src/assets/images/favicon.ico" />
	<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container-scroller">
		<!-- partial:partials/_navbar.html -->
		<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
				<a class="navbar-brand brand-logo" href="usuarios">
					<img src="src/assets/images/logo.svg" alt="logo" /> </a>
				<a class="navbar-brand brand-logo-mini" href="usuarios">
					<img src="src/assets/images/logo-mini.svg" alt="logo" /> </a>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center">
				<ul class="navbar-nav">
					<li class="nav-item dropdown language-dropdown">
						<a class="nav-link dropdown-toggle px-2 d-flex align-items-center" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
							<div class="d-inline-flex mr-0 mr-md-3">
								<div class="flag-icon-holder">
									<i class="flag-icon flag-icon-us"></i>
								</div>
							</div>
							<span class="profile-text font-weight-medium d-none d-md-block">English</span>
						</a>
						<div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
							<a class="dropdown-item">
								<div class="flag-icon-holder">
									<i class="flag-icon flag-icon-us"></i>
								</div>English
							</a>
							<a class="dropdown-item">
								<div class="flag-icon-holder">
									<i class="flag-icon flag-icon-fr"></i>
								</div>French
							</a>
							<a class="dropdown-item">
								<div class="flag-icon-holder">
									<i class="flag-icon flag-icon-ae"></i>
								</div>Arabic
							</a>
							<a class="dropdown-item">
								<div class="flag-icon-holder">
									<i class="flag-icon flag-icon-ru"></i>
								</div>Russian
							</a>
						</div>
					</li>
				</ul>
				<form class="ml-auto search-form d-none d-md-block">
					<div class="form-group">
						<input type="search" class="form-control" placeholder="Search Here">
					</div>
				</form>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link count-indicator" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
							<i class="mdi mdi-bell-outline"></i>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
							<i class="mdi mdi-email-outline"></i>
						</a>
					</li>
				</ul>
				<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
					<span class="mdi mdi-menu"></span>
				</button>
			</div>
		</nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<?php
				include "navegacion.php";
			?>
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-lg-10 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<form method="post">

										<?php

											if (isset($_GET["idEditar"])) {
												$editar = new MvcController();
												$editar->editarUsuarioController();
												$editar->actualizarUsuarioController();
											}elseif (isset($_GET["idEditarVehiculo"])){
												$editar_vehiculo = new MvcController();
												$editar_vehiculo->editarVehiculoController();
												$editar_vehiculo->actualizarVehiculoController();
											}
										?>

									</form>
									<div for="mensaje_error_nombre"></div>
									<div for="mensaje_error_email"></div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
<?php

if (isset($_SESSION)) {
	if (!$_SESSION["usuarioActivo"]) {
		echo
		'<script>
				window.location.href = "ingresar_error";
				</script>';
		exit();
	}
}
?>