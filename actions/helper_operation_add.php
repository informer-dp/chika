<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once'../config/connection.php';
require_once'../config/functions.php';
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//adding a new operation
 if(isset($_POST)){
      //echo "<pre>"; print_r($_POST); echo "</pre>";
     $allowed = array(
         "name",
         "product",
         "price",
         "notes",
         ); // allowed fields

     $sql = "INSERT INTO helper_operations SET ".pdoSet($allowed,$values);
 //array_view($_POST);
 //echo $sql;
 $stm = $pdo->prepare($sql);
 //array_view($values);
 $stm->execute($values);
 header("Location:".$_SERVER['HTTP_REFERER']);
 }
 ?>
