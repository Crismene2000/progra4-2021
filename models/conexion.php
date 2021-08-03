<?php

class Conexion{

    public static function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=pdophp","root","");
        //$link = new PDO("mysql:host=localhost;dbname=id17243158_pdophp","id17243158_progra4","D+^aT0Q>K46z*mD");

        return $link;
    }
}

// $a = new Conexion();

// $a -> conectar();