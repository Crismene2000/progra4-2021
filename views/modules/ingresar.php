<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
	<title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
	<!-- plugins:css -->
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
	<link rel="shortcut icon" href="src/assets/images/favicon.ico" />
</head>

<body>
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
				<div class="row w-100">
					<div class="col-lg-4 mx-auto">
						<div class="auto-form-wrapper">
							<form method="post">
								<div class="form-group">
									<label class="label">Nombre</label>
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Nombre" name="nombre" require>
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="mdi mdi-check-circle-outline"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="label">Password</label>
									<div class="input-group">
										<input type="password" class="form-control" placeholder="Password" name="password" require>
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="mdi mdi-check-circle-outline"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button class="btn btn-primary submit-btn btn-block" type="submit">Ingresar</button>
								</div>
								<div class="form-group d-flex justify-content-between">
									<div class="form-check form-check-flat mt-0">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
									</div>
									<a href="#" class="text-small forgot-password text-black">Forgot Password</a>
								</div>
								<div class="text-block text-center my-3">
									<a href="registro" class="text-black text-small">Registro</a>
								</div>
								<?php
								$ingresar = new MvcController();
								$ingresar->ingresarUsuarioController();

								if (isset($_GET["action"])) {
									if ($_GET["action"] == "registro_ok") {
										echo '<div style="color:#2074E2">Usuario registrado correctamente</div>';
									} else if ($_GET["action"] == "ingresar_error") {
										echo "Ocurrio un error";
									} elseif ($_GET["action"] == "ingresar_error_invalido") {
										echo "Ocurrio un error,su usuario o password no cumplen con los requerimientos";
									} elseif ($_GET["action"] == "ingresar_error_vacio") {
										echo "Ocurrio un error al ingresar,ingresar usuario y password";
									}
								}
								?>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- content-wrapper ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	<!-- plugins:js -->
	<script src="src/assets/vendors/js/vendor.bundle.base.js"></script>
	<script src="src/assets/vendors/js/vendor.bundle.addons.js"></script>
	<!-- endinject -->
	<!-- inject:js -->
	<script src="src/assets/js/shared/off-canvas.js"></script>
	<script src="src/assets/js/shared/misc.js"></script>
	<!-- endinject -->
	<script src="src/assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>