<?php
session_start();
require_once'../config/connection.php';
require_once'../config/functions.php';
//adding a new operation
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 if(isset($_GET['id'])){
   $values['id']=$_GET['id'];
   $sql = "DELETE FROM operations WHERE `id`=:id";
 //array_view($_POST);
 //echo $sql;
 $values['id']=$_GET['id'];
 $stm = $pdo->prepare($sql);
 $stm->execute($values);
 header("Location:".$_SERVER['HTTP_REFERER']);
 }
 ?>
