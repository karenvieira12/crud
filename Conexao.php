<?php
class conexao{
    public static $instance;
    private function __construct(){
        //criar a funcionalidade de instância 
    }
    public static function getConexao(){
        if(!isset(self::$instance)){
            self::$instance = new PDO('mysql;host=localhost;dbname=crud','root','senac',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance ->setAtribute(PDO::ATTR_ERREMODE,POD::ERREMODE_EXCEPTION);
            self::$instance ->setAtribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$instance;

    }