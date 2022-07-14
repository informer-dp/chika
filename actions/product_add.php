<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once'../config/connection.php';
require_once'../config/functions.php';
//adding a new operation
 if(isset($_POST)){
     $allowed = array(
        "category",
        "article",
         "name",
         "price",
         "notes"
         ); // allowed fields

     $sql = "INSERT INTO helper_products SET ".pdoSet($allowed,$values);
 //array_view($_POST);
 //echo $sql;
 $stm = $pdo->prepare($sql);
 //array_view($values);
 $stm->execute($values);
 $_SESSION['msg']="Сотрудник  <b>".$_POST['name'] ."</b> успешно добавлен";
 header("Location:".$_SERVER['HTTP_REFERER']);
 }
 ?>
