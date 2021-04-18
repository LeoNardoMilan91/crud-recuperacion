<?php

namespace Clases;
use PDO;
use PDOException;

class Conexion{
    protected static $conexion;

    public function __construct(){
        if(self::$conexion == null){
            self::crearConexion();
        }
    }

public static function crearConexion(){
    $opciones=parse_ini_file('../.config');
    $mibase=$opciones["bbdd"];
    $miusuario=$opciones["usuario"];
    $mipass=$opciones["pass"];
    $mihost=$opciones["host"];

    $dns="mysql:host=$mihost;dbname=$mibase;charset=utf8mb4";

    try{
        self::$conexion=new PDO($dns, $miusuario, $mipass);

        self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $ex){
        die("Error al conectar con la BBDD, mensaje: ".$ex->getMessage());
    }
}
}