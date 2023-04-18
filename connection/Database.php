<?php
//     /** Desarrollado por Josué Marfil
//      * @version 1.0
//      * email: josue.marfilg@gmail.com
//      * @license http://creativecommons.org/licenses/by-nc-sa/3.0/
//      */
//

//Incluimos el archivo datos.php que contiene las constantes para la conexion a la base de datos
include 'connection/datos.php';

//Creacion de la clase DB con sus atributos para la conexion
class Database {
    private static $instance = NULL;
    private function __construct() {}
    private function __clone() {}
    public static function getInstance() {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $pdo_options);
        }
        return self::$instance;
    }

    //Estos metodos son para que no tengamos que llamar a la instancia de la clase
    public static function prepare($sql) {
        return self::getInstance()->prepare($sql);
    }

    //Explica para que sirve el metodo query y prepare en la clase PDO de PHP en el siguiente enlace: http://php.net/manual/es/pdo.query.php
    public static function query($sql) {
        return self::getInstance()->query($sql);
    }

    public static function lastInsertId() {
        return self::getInstance()->lastInsertId();
    }

    public static function beginTransaction() {
        return self::getInstance()->beginTransaction();
    }

    public static function errorCode() {
        return self::getInstance()->errorCode();
    }

    public static function errorInfo() {
        return self::getInstance()->errorInfo();
    }

    public static function exec($sql) {
        return self::getInstance()->exec($sql);
    }

    //Metodo para cerrar conexion a la base de datos de forma manual y no esperar a que el script termine su ejecucion 
    public static function close() {
        self::$instance = null;
    }
}
?>