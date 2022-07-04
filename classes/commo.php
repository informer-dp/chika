<?php
/*********БАЗОВЫЙ КЛАСС***********/
class Commo{
  public function __construct(){

  }
  public static function connect_to_db(){
     $host = 'localhost';
     $db   = 'jnylmamd_chirva';
     $user = 'jnylmamd_chirva';
     $pass = 'q3MM2_chika';
     $charset = 'utf8';
     $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
     $opt = [
         PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
         PDO::ATTR_EMULATE_PREPARES   => false,
         PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
     ];
     $pdo = new PDO($dsn, $user, $pass, $opt);
     return $pdo;
  }
  
}
 ?>
