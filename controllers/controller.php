<?php

class MvcController
{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	static public function pagina()
	{

		include "views/template.php";
	}

	#ENLACES
	#-------------------------------------

	public static function enlacesPaginasController()
	{

		if (isset($_GET['action'])) {

			$enlaces = $_GET['action'];
		} else {

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;
	}

	/////////////////////////
	# Registro Usuarios
	public static function registroUsuarioController()
	{

		if (
			isset($_POST["nombre"]) &&
			isset($_POST["password"]) &&
			isset($_POST["email"])
		) {
			if (!empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
				if (
					preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/', $_POST["nombre"]) &&
					preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST["email"]) &&
					preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{3,20}$/', $_POST["password"])
				) {
					$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
					$datos = array(
						"nombre" => $_POST["nombre"],
						"password" => $password,
						"email" => $_POST["email"],
					);

					$respuesta = Datos::registroUsuarioModel($datos, "usuarios");

					if ($respuesta == "success") {
						echo
						'<script>
						window.location.href = "registro_ok";
						</script>';
					} else {
						echo
						'<script>
						window.location.href = "registro_error";
						</script>';
					}
				} else {
					echo
					'<script>
						window.location.href = "registro_errorinvalido";
						</script>';
				}
			} else {
				echo
				'<script>
					window.location.href = "registro_error_vacio";
					</script>';
			}
			// var_dump($respuesta);
		}
	}

	public static function crearVehiculoController()
	{
		if (
			isset($_POST["vehiculo"]) &&
			isset($_POST["mantenimientos"]) &&
			isset($_POST["llantas"])&&
			isset($_POST["repuestos"])&&
			isset($_POST["taller"])&&
			isset($_POST["marchamo"])&&
			isset($_POST["riteve"])
		) {
			if (!empty($_POST["vehiculo"]) && !empty($_POST["mantenimientos"]) && !empty($_POST["llantas"] && !empty($_POST["repuestos"] && !empty($_POST["taller"] && !empty($_POST["marchamo"]&& !empty($_POST["riteve"])))))){
				if (
					preg_match('/^[A-Za-z0-9\-\_\s]{3,100}$/', $_POST["vehiculo"]) &&
					preg_match('/^[A-Za-z0-9\-\_\s]{3,100}$/', $_POST["mantenimientos"]) &&
					preg_match('/^[A-Za-z0-9\-\_\s]{3,20}$/', $_POST["llantas"]) &&
					preg_match('/^[A-Za-z0-9\-\_\s]{3,20}$/', $_POST["repuestos"]) &&
					preg_match('/^[A-Za-z0-9\-\_\s]{3,20}$/', $_POST["taller"]) &&
					preg_match('/^[A-Za-z0-9\-\_\s]{3,20}$/', $_POST["marchamo"]) &&
					preg_match('/^[A-Za-z0-9\-\_\s]{3,20}$/', $_POST["riteve"]) 
				 ) {
					$info = array(
						"vehiculo" => $_POST["vehiculo"],
						"mantenimientos" => $_POST["mantenimientos"],
						"llantas" => $_POST["llantas"],
						"repuestos" => $_POST["repuestos"],
						"taller" => $_POST["taller"],
						"marchamo" => $_POST["marchamo"],
						"riteve" => $_POST["riteve"],
					);

					$respuesta = Datos::crearVehiculoModel($info, "flota_vehicular");

					if ($respuesta == "success") {
						echo
						'<script>
						window.location.href = "vehiculo_ok";
						</script>';
					} else {
						echo
						'<script>
						window.location.href = "vehiculo_error";
						</script>';
					}
				} else {
					echo
					'<script>
						window.location.href = "vehiculo_errorinvalido";
						</script>';
				}
			} else {
				echo
				'<script>
					window.location.href = "vehiculo_error_vacio";
					</script>';
			}
		}
	}
	public static function mostrarVehiculosController()
	{
		$respuesta = Datos::mostrarVehiculoModel("flota_vehicular");
		foreach ($respuesta as $key => $value) {
			echo '
			<tr>
				<td>' . $value["vehiculo"] . '</td>
				<td>' . $value["mantenimientos"] . '</td>
				<td>' . $value["llantas"] . '</td>
				<td>' . $value["repuestos"] . '</td>
				<td>' . $value["taller"] . '</td>
				<td>' . $value["marchamo"] . '</td>
				<td>' . $value["riteve"] . '</td>
				<td>
				   <a href="editar&idEditarVehiculo=' . $value["id"] . '">
				   <button type="button" class="btn btn-danger">
				   <i class="fas fa-marker"></i>
				   </button>
				   </a>
				</td>
				<td>
				   <a href="informacion_vehiculos&idBorrar=' . $value["id"] . '">
				   <button type="button" class="btn btn-warning">
				   <i class="fas fa-eraser"></i>
				   </button>
				   </a>
				</td>
			</tr>
			';
		}
	}

	public static function editarVehiculoController()
	{
		if (isset($_GET["idEditarVehiculo"])) {
			if (!empty($_GET["idEditarVehiculo"])) {
				if (preg_match('/^[0-9]{1,20}$/', $_GET["idEditarVehiculo"])) {
					$datos = $_GET["idEditarVehiculo"];
					$respuesta = Datos::editarVehiculoModel($datos, "flota_vehicular");
					echo '
					<input type="hidden" name="id" value="' . $respuesta["id"] . '" required>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="bg-dark input-group-text"><i class="fas fa-car" style="color:#0dcaf0"></i></span>
								</div>
								<input type="text" class="form-control"  placeholder="vehiculo" name="vehiculo" value="' . $respuesta["vehiculo"] . '" required>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="bg-dark input-group-text"><i class="fas fa-charging-station" style="color:#0dcaf0"></i></span>
								</div>
								<input type="text" class="form-control"  placeholder="mantenimientos" name="mantenimientos" value="' . $respuesta["mantenimientos"] . '" required>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="bg-dark input-group-text"><i class="fas fa-biking" style="color:#0dcaf0"></i></span>
								</div>
								<input type="text" class="form-control"  placeholder="llantas" name="llantas" value="' . $respuesta["llantas"] . '" required>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="bg-dark input-group-text"><i class="fas fa-car-battery" style="color:#0dcaf0"></i></span>
								</div>
								<input type="text" class="form-control"  placeholder="repuestos" name="repuestos" value="' . $respuesta["repuestos"] . '" required>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="bg-dark input-group-text"><i class="fas fa-gas-pump" style="color:#0dcaf0"></i></span>
								</div>
								<input type="text" class="form-control"  placeholder="taller" name="taller" value="' . $respuesta["taller"] . '" required>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="bg-dark input-group-text"><i class="fab fa-markdown" style="color:#0dcaf0"></i></span>
								</div>
								<input type="text" class="form-control"  placeholder="marchamo" name="marchamo" value="' . $respuesta["marchamo"] . '" required>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="bg-dark input-group-text"><i class="fa-spin  fas fa-cog" style="color:#0dcaf0"></i></span>
								</div>
								<input type="text" class="form-control"  placeholder="riteve" name="riteve" value="' . $respuesta["riteve"] . '" required>
							</div>
						</div>
					
						<button type="submit" class="btn btn-info" class="fas fa-step-forward">Enviar</button>
					';
				} else {
					echo
					'<script>
						window.location.href = "update_errorinvalido";
						</script>';
				}
			} else {
				echo
				'<script>
					window.location.href = "update_error_vacio";
					</script>';
			}
		}
	}

	public static function vistaUsuariosController()
	{
		$respuesta = Datos::vistaUsuariosModel("usuarios");
		foreach ($respuesta as $key => $value) {
			echo '
			<tr>
				<td>' . $value["nombre"] . '</td>
				<td>*******</td>
				<td>' . $value["email"] . '</td>
				<td>
				   <a href="editar&idEditar=' . $value["id"] . '">
				   <button type="button" class="btn btn-danger">
				   <i class="fas fa-marker"></i>
				   </button>
				   </a>
				</td>
				<td>
				   <a href="usuarios&idBorrar=' . $value["id"] . '">
				   <button type="button" class="btn btn-warning">
				   <i class="fas fa-eraser"></i>
				   </button>
				   </a>
				</td>
			</tr>
			';
		}
	}
	// var_dump($respuesta);

	#Eliminar usuarios
	public static function borrarUsuarioController()
	{

		if (isset($_GET["idBorrar"])) {

			if (!empty($_GET["idBorrar"])) {

				if (preg_match('/^[0-9]{1,20}$/', $_GET["idBorrar"])) {

					$datos = $_GET["idBorrar"];

					$respuesta = Datos::borrarUsuarioModel($datos, "usuarios");

					if ($respuesta == "success") {

						echo '<script>
								 window.location.href = "eliminado_ok";
							  </script>';
					} else {
						echo '<script>
								 window.location.href = "eliminado_error";
							  </script>';
					}
				} else {
					echo '<script>
							window.location.href = "eliminado_error_invalido";
						  </script>';
				}
			} else {
				echo '<script>
					   window.location.href = "eliminado_error_vacio";
					  </script>';
			}
		}
	}
	public static function borrarVehiculoController()
	{
		if (isset($_GET["idBorrar"])) {

			if (!empty($_GET["idBorrar"])) {

				if (preg_match('/^[0-9]{1,20}$/', $_GET["idBorrar"])) {

					$datos = $_GET["idBorrar"];

					$respuesta = Datos::borrarVehiculoModel($datos, "flota_vehicular");

					if ($respuesta == "success") {

						echo '<script>
								 window.location.href = "vehiculo_eliminado_ok";
							  </script>';
					} else {
						echo '<script>
								 window.location.href = "vehiculo_eliminado_error";
							  </script>';
					}
				} else {
					echo '<script>
							window.location.href = "vehiculo_eliminado_error_invalido";
						  </script>';
				}
			} else {
				echo '<script>
					   window.location.href = "vehiculo_eliminado_error_vacio";
					  </script>';
			}
		}
	}

	#Editar usuarios
	public static function editarUsuarioController()
	{
		if (isset($_GET["idEditar"])) {
			if (!empty($_GET["idEditar"])) {
				if (preg_match('/^[0-9]{1,20}$/', $_GET["idEditar"])) {
					$datos = $_GET["idEditar"];
					$respuesta = Datos::editarUsuarioModel($datos, "usuarios");
					echo '
					<input type="hidden" name="id" value="' . $respuesta["id"] . '" required>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="bg-dark input-group-text"><i class="fas fa-users" style="color:#0dcaf0"></i></span>
								</div>
								<input type="text" class="form-control" id="editar_nombre" placeholder="Usuario" name="nombre" value="' . $respuesta["nombre"] . '" required>
							</div>
						</div>


						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="bg-dark input-group-text"><i class="fas fa-key" style="color:#0dcaf0"></i></span>
								</div>
								<input type="password" class="form-control" placeholder="Contraseña" name="password" required>
							</div>
						</div>


						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="bg-dark input-group-text"><i class="fas fa-envelope" style="color:#0dcaf0"></i></span>
								</div>
								<input type="email" class="form-control" id="editar_email" placeholder="Email" name="email" value="' . $respuesta["email"] . '" required>
							</div>
						</div>
					
						<button type="submit" class="btn btn-info" class="fas fa-step-forward">Enviar</button>
					';
				} else {
					echo
					'<script>
						window.location.href = "update_errorinvalido";
						</script>';
				}
			} else {
				echo
				'<script>
					window.location.href = "update_error_vacio";
					</script>';
			}
		}
	}
	public static function actualizarVehiculoController()
	{
		if (
			isset($_POST["vehiculo"]) &&
			isset($_POST["mantenimientos"]) &&
			isset($_POST["llantas"])&&
			isset($_POST["repuestos"])&&
			isset($_POST["taller"])&&
			isset($_POST["marchamo"])&&
			isset($_POST["riteve"])
		) {
			if (!empty($_POST["vehiculo"]) && !empty($_POST["mantenimientos"]) && !empty($_POST["llantas"] && !empty($_POST["repuestos"] && !empty($_POST["taller"] && !empty($_POST["marchamo"]&& !empty($_POST["riteve"])))))) {
				if (
					preg_match('/^[A-Za-z0-9\-\_\s]{3,100}$/', $_POST["vehiculo"]) &&
					preg_match('/^[A-Za-z0-9\-\_\s]{3,100}$/', $_POST["mantenimientos"]) &&
					preg_match('/^[A-Za-z0-9\-\_\s]{3,20}$/', $_POST["llantas"]) &&
					preg_match('/^[A-Za-z0-9\-\_\s]{3,20}$/', $_POST["repuestos"]) &&
					preg_match('/^[A-Za-z0-9\-\_\s]{3,20}$/', $_POST["taller"]) &&
					preg_match('/^[A-Za-z0-9\-\_\s]{3,20}$/', $_POST["marchamo"]) &&
					preg_match('/^[A-Za-z0-9\-\_\s]{3,20}$/', $_POST["riteve"]) 
				) {
					$datos = array(
						"id" => $_POST["id"],
						"vehiculo" => $_POST["vehiculo"],
						"mantenimientos" => $_POST["mantenimientos"],
						"llantas" => $_POST["llantas"],
						"repuestos" => $_POST["repuestos"],
						"taller" => $_POST["taller"],
						"marchamo" => $_POST["marchamo"],
						"riteve" => $_POST["riteve"]
					);

					$respuesta = Datos::actualizarVehiculoModel($datos, "flota_vehicular");

					if ($respuesta == "success") {
						echo '<script>
                            window.location.href = "vehiculo_actualizado_ok";
                            </script>';
					} else {
						echo
						'<script>
						window.location.href = "vehiculo_actualizado_error";
						</script>';
					}
				} else {
					echo
					'<script>
					window.location.href = "vehiculo_update_errorinvalido";
					</script>';
				}
			} else {
				echo
				'<script>
				window.location.href = "vehiculo_update_error_vacio";
				</script>';
			}
		}
	}

	public static function actualizarUsuarioController()
	{
		if (
			isset($_POST["id"]) &&
			isset($_POST["nombre"]) &&
			isset($_POST["password"]) &&
			isset($_POST["email"])
		) {
			if (!empty($_POST["id"]) && !empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
				if (
					preg_match('/^[0-9]{1,20}$/', $_POST["id"]) &&
					preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/', $_POST["nombre"]) &&
					preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST["email"]) &&
					preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{3,20}$/', $_POST["password"])
				) {
					$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
					$datos = array(
						"id" => $_POST["id"],
						"nombre" => $_POST["nombre"],
						"password" => $password,
						"email" => $_POST["email"],
					);

					$respuesta = Datos::actualizarUsuarioModel($datos, "usuarios");

					if ($respuesta == "success") {
						echo '<script>
                            window.location.href = "actualizado_ok";
                            </script>';
					} else {
						echo
						'<script>
						window.location.href = "actualizado_error";
						</script>';
					}
				} else {
					echo
					'<script>
					window.location.href = "update_errorinvalido";
					</script>';
				}
			} else {
				echo
				'<script>
				window.location.href = "update_error_vacio";
				</script>';
			}
		}
	}

	public static function ingresarUsuarioController()
	{
		if (
			isset($_POST["nombre"]) &&
			isset($_POST["password"])

		) {
			if (!empty($_POST["nombre"]) && !empty($_POST["password"])) {
				if (
					preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/', $_POST["nombre"]) &&
					preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{3,20}$/', $_POST["password"])
				) {
					$password =  $_POST["password"];
					$datos = array(

						"nombre" => $_POST["nombre"],
						"password" => $password

					);

					$respuesta = Datos::ingresarUsuarioModel($datos, "usuarios");

					if ($respuesta["nombre"] == $datos["nombre"] && password_verify($password, $respuesta["password"])) {
						$_SESSION["usuarioActivo"] = true;
						echo
						'<script>
							window.location.href = "ingresar_ok";
							</script>';
					} else {
						echo
						'<script>
							window.location.href = "ingresar_error";
							</script>';
					}
				} else {
					echo
					'<script>
						window.location.href = "ingresar_error_invalido";
						</script>';
				}
			} else {
				echo
				'<script>
					window.location.href = "ingresar_error_vacio";
					</script>';
			}
		}
	}
	public static function subirFotoController()
	{
		if (
			isset($_POST["ruta"]) &&
			isset($_POST["nombre"])
		) {
			if (!empty($_POST["ruta"]) && !empty($_POST["nombre"])) {
				if (
					preg_match('/^[A-Za-z0-9\-\_\.]{1,100}$/', $_POST["ruta"]) &&
					preg_match('/^[A-Za-z0-9\-\_\.]{1,100}$/', $_POST["nombre"])
				) {
					$datos = array(
						"ruta" => $_POST["ruta"],
						"nombre" => $_POST["nombre"]
					);

					$respuesta = Datos::subirFotoModel($datos, "fotos");

					if ($respuesta == "success") {
						echo '<script>
                            window.location.href = "foto_subida_ok";
                            </script>';
					} else {
						echo
						'<script>
						window.location.href = "foto_subida_error";
						</script>';
					}
				}
			}
		}
	}
	public static function mostrarFotoController()
	{
		$respuesta = Datos::mostrarFotoModel("fotos");
		echo '
			<div id="carouselExampleControls " class="carousel slide" data-ride="carousel">
 				<div class="carousel-inner">
		';
		$contador = 0;
		foreach ($respuesta as $key => $value) {
			if ($contador == 0) {
				echo '
				<div class="carousel-item active">
					<img class="d-block w-100" src="uploads/' . $value["ruta"] . '" alt="' . $value["nombre"] . '">
			 	 </div>
				';
			} else {
				echo '
				<div class="carousel-item">
					<img class="d-block w-100" src="uploads/' . $value["ruta"] . '" alt="' . $value["nombre"] . '">>
			 	 </div>
			';
			}
			$contador++;
		}
		echo '
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
		<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		';
	}





	public static function validarUsuarioController($datos)
	{
		$respuesta = 0;
		if (!empty($datos)) {
			if (preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/', $datos)) {
				$respuesta = Datos::validarUsuarioModel($datos);
				if ($respuesta[0] > 0) {
					$respuesta = 1;
				} else {
					$respuesta = 0;
				}
			}
		}
		return $respuesta;
	}
	public static function validarEmailController($datos)
	{
		$respuesta = 0;
		if (!empty($datos)) {
			if (preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $datos)) {
				$respuesta = Datos::validarEmailModel($datos);
				if ($respuesta[0] > 0) {
					$respuesta = 1;
				} else {
					$respuesta = 0;
				}
			}
		}
		return $respuesta;
	}
}
// <input type="text" class="form-control" placeholder="Usuario" name="nombre" value="'.$respuesta["nombre"].'" required>
// <input type="hidden" name="id" value="'.$respuesta["id"].'" required>
// <input type="password" placeholder="Contraseña" name="password" required>
// <input type="email" placeholder="Email" name="email" value="'.$respuesta["email"].'" required>

// <input type="submit" class="btn btn-info" class="fas fa-step-forward" value="Enviar">

// public static function borrarUsuarioController()
// 	{
// 		if (isset($_GET["idBorrar"])) {
// 			if (!empty($_GET["idBorrar"])) {
// 				if (preg_match('/^[0-9] {1,20}$/', $_GET["idBorrar"])) {
// 					$datos = $_GET["idBorrar"];

// 					$respuesta = Datos::borrarUsuarioModel($datos, "usuarios");

// 					if ($respuesta == "success") {
// 						echo
// 						'<script>
// 									window.location.href = "=eliminado_ok";
// 						</script>';
// 					} else {
// 						echo
// 						'<script>
// 								window.location.href = "=eliminado_error";
// 						</script>';
// 					}
// 				} else {
// 					echo
// 					'<script>
// 						window.location.href = "=eliminado_error_invalido";
// 					</script>';
// 				}
// 			} else {
// 				echo
// 				'<script>
// 					window.location.href = "=eliminado_error_vacio";
// 				</script>';
// 			}
// 		}
// 	}