<?php

class Paginas
{
	static public function enlacesPaginasModel($enlaces)
	{
		switch ($enlaces) {
			case "registro_vehiculo":
			case "informacion_vehiculos":	
			case "subir_imagenes":
			case "ingresar":
			case "usuarios":
			case "editar":
			case "salir":
				$module =  "views/modules/" . $enlaces . ".php";
				break;
			case "index":
				$module =  "views/modules/registro.php";
				break;
			case "registro_ok":
				$module =  "views/modules/ingresar.php";
				break;
			case "registro_error":
				$module =  "views/modules/registro.php";
				break;
			case "foto_subida_ok":
				$module =  "views/modules/subir_imagenes.php";
				break;
			case "foto_subida_error":
				$module =  "views/modules/subir_imagenes.php";
				break;
			case "eliminado_ok":
				$module =  "views/modules/usuarios.php";
				break;
			case "eliminado_error":
				$module =  "views/modules/usuarios.php";
				break;
			case "actualizado_ok":
				$module =  "views/modules/usuarios.php";
				break;
			case "actualizado_error":
				$module =  "views/modules/usuarios.php";
				break;
			case "ingresar_ok":
				$module =  "views/modules/usuarios.php";
				break;
			case "ingresar_error":
				$module =  "views/modules/ingresar.php";
				break;
			case "ingresar_error_invalido":
				$module =  "views/modules/ingresar.php";
				break;
			case "ingresar_error_vacio":
				$module =  "views/modules/ingresar.php";
				break;
			case "vehiculo_ok":
				$module =  "views/modules/registro_vehiculo.php";
				break;
			case "vehiculo_error":
				$module =  "views/modules/registro_vehiculo.php";
				break;
			case "vehiculo_errorinvalido":
				$module =  "views/modules/registro_vehiculo.php";
				break;
			case "vehiculo_error_vacio":
				$module =  "views/modules/registro_vehiculo.php";
				break;
			case "vehiculo_actualizado_ok":
				$module =  "views/modules/editar.php";
				break;
			case "vehiculo_actualizado_error":
				$module =  "views/modules/editar.php";
				break;
			case "eliminado_error_invalido":
				$module =  "views/modules/usuarios.php";
				break;
			case "eliminado_error_vacio":
				$module =  "views/modules/usuarios.php";
				break;
			case "update_errorinvalido":
				$module =  "views/modules/editar.php";
				break;
			case "update_error_vacio":
				$module =  "views/modules/editar.php";
				break;
			case "vehiculo_update_errorinvalido":
				$module =  "views/modules/editar.php";
				break;
			case "vehiculo_update_error_vacio":
				$module =  "views/modules/editar.php";
				break;
			case "vehiculo_eliminado_ok":
				$module =  "views/modules/informacion_vehiculos.php";
				break;
			case "vehiculo_eliminado_error":
				$module =  "views/modules/informacion_vehiculos.php";
				break;
			case "vehiculo_eliminado_error_invalido":
				$module =  "views/modules/informacion_vehiculos.php";
				break;
			case "vehiculo_eliminado_error_vacio":
				$module =  "views/modules/informacion_vehiculos.php";
				break;
			default:
				$module =  "views/modules/registro.php";
				break;
		}
		return $module;
	}
}
