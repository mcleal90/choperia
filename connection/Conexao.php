<?php
class Conexao {
   
    public static $instance;
 
    private function __construct() {
        //
    }
 
    public static function getConexao() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost;dbname=choperia', 'root', '1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
 
        return self::$instance;
    }
 
 }


// Definir a conexão com o banco de dados
// $host = 'localhost';
// $user = 'ideau';
// $password = 'ideau123';
// $database = 'sysbreja';
// $conn = new mysqli($host, $user, $password, $database);
?>