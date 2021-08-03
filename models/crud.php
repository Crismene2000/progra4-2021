<?php

require_once "conexion.php";

class Datos extends Conexion{
    public static function registroUsuarioModel($datos, $tabla){
        $stnt = Conexion::conectar() -> prepare("INSERT INTO $tabla (nombre, password, email) VALUES (:nombre, :password, :email)" );
        $stnt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stnt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stnt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        if ($stnt -> execute()){
            return "success";
        } else {
            $stnt->errorInfo();
        }
    
    }
    #Cargar vehiculos
    public static function crearVehiculoModel($info, $tabla){
        $stnt = Conexion::conectar() -> prepare("INSERT INTO $tabla (vehiculo, mantenimientos, llantas, repuestos, taller, marchamo, riteve) VALUES (:vehiculo, :mantenimientos, :llantas, :repuestos, :taller, :marchamo, :riteve)" );
        $stnt -> bindParam(":vehiculo", $info["vehiculo"], PDO::PARAM_STR);
        $stnt -> bindParam(":mantenimientos", $info["mantenimientos"], PDO::PARAM_STR);
        $stnt -> bindParam(":llantas", $info["llantas"], PDO::PARAM_STR);
        $stnt -> bindParam(":repuestos", $info["repuestos"], PDO::PARAM_STR);
        $stnt -> bindParam(":taller", $info["taller"], PDO::PARAM_STR);
        $stnt -> bindParam(":marchamo", $info["marchamo"], PDO::PARAM_STR);
        $stnt -> bindParam(":riteve", $info["riteve"], PDO::PARAM_STR);
        if ($stnt -> execute()){
            return "success";
        } else {
            $stnt->errorInfo();
        }
    
    }

    public static function mostrarVehiculoModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, vehiculo, mantenimientos, llantas, repuestos, taller, marchamo, riteve FROM $tabla");
		$stmt -> execute();
		return $stmt->fetchAll();
	}

    #Cargar usuarios

    public static function vistaUsuariosModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, email FROM $tabla");
		$stmt -> execute();
		return $stmt->fetchAll();
	}

    public static function borrarUsuarioModel($datos, $tabla){
        $stnt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id = :id" );
        $stnt -> bindParam(":id", $datos, PDO::PARAM_INT);
        if ($stnt -> execute()){
            return "success";
        } else {
            return $stnt->errorInfo();
        }
    }

    public static function borrarVehiculoModel($datos, $tabla){
        $stnt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id = :id" );
        $stnt -> bindParam(":id", $datos, PDO::PARAM_INT);
        if ($stnt -> execute()){
            return "success";
        } else {
            return $stnt->errorInfo();
        }
    }

    public static function editarUsuarioModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, nombre, email FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
        $stmt -> execute();
		return $stmt->fetch();
    }
    public static function editarVehiculoModel($datos, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id, vehiculo, mantenimientos, llantas, repuestos, taller, marchamo, riteve FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
        $stmt -> execute();
		return $stmt->fetch();
    }

    public static function actualizarVehiculoModel($datos, $tabla){
        $stnt = Conexion::conectar() -> prepare("UPDATE $tabla SET vehiculo = :vehiculo, mantenimientos = :mantenimientos, llantas = :llantas, repuestos = :repuestos, taller = :taller, marchamo = :marchamo, riteve = :riteve WHERE id = :id");
        $stnt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stnt -> bindParam(":vehiculo", $datos["vehiculo"], PDO::PARAM_STR);
        $stnt -> bindParam(":mantenimientos", $datos["mantenimientos"], PDO::PARAM_STR);
        $stnt -> bindParam(":llantas", $datos["llantas"], PDO::PARAM_STR);
        $stnt -> bindParam(":repuestos", $datos["repuestos"], PDO::PARAM_STR);
        $stnt -> bindParam(":taller", $datos["taller"], PDO::PARAM_STR);
        $stnt -> bindParam(":marchamo", $datos["marchamo"], PDO::PARAM_STR);
        $stnt -> bindParam(":riteve", $datos["riteve"], PDO::PARAM_STR);
        if ($stnt -> execute()){
            return "success";
        } else {
            $stnt->errorInfo();
        }
    }

    public static function actualizarUsuarioModel($datos, $tabla){
        $stnt = Conexion::conectar() -> prepare("UPDATE $tabla SET nombre = :nombre, password = :password, email = :email WHERE id = :id");
        $stnt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stnt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stnt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stnt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        if ($stnt -> execute()){
            return "success";
        } else {
            $stnt->errorInfo();
        }
    }

    public static function ingresarUsuarioModel($datos, $tabla){
        $stmt = Conexion::conectar() -> prepare("SELECT nombre, password FROM $tabla WHERE nombre = :nombre");
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt -> fetch();
    }
    public static function validarUsuarioModel($datos){
        $stmt = Conexion::conectar() -> prepare("SELECT count(nombre) FROM usuarios WHERE nombre = :nombre");
        $stmt -> bindParam(":nombre", $datos, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt -> fetch();
    }
    public static function validarEmailModel($datos){
        $stmt = Conexion::conectar() -> prepare("SELECT count(email) FROM usuarios WHERE email = :email");
        $stmt -> bindParam(":email", $datos, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt -> fetch();
    }

    public static function subirFotoModel($datos, $tabla){
        $stnt = Conexion::conectar() -> prepare("INSERT INTO $tabla (nombre, ruta) VALUES (:nombre, :ruta)" );
        $stnt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stnt -> bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
        if ($stnt -> execute()){
            return "success";
        } else {
            $stnt->errorInfo();
        }
    }
    public static function mostrarFotoModel($tabla){

        $stmt = Conexion::conectar() -> prepare("SELECT id, nombre, ruta FROM $tabla ");

        $stmt -> execute();

        return $stmt -> fetchAll();
    }
}