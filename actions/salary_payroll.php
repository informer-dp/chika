<?php
session_start();
require_once'../config/connection.php';
require_once'../config/functions.php';
//adding a new operation
 if(isset($_POST)){
   //$values=$_POST;
     $allowed = array(
         "payment_date",
         "ground",
         "summa",
         "worker",
         "user",
         "notes"
         ); // allowed fields

     $sql = "INSERT INTO salary SET ".pdoSet($allowed,$values);
// print_r($_POST);
 //echo $sql;
 $stm = $pdo->prepare($sql);
 //print_r($values);
 $stm->execute($values);
 header("Location:".$_SERVER['HTTP_REFERER']);
 }
 ?>
