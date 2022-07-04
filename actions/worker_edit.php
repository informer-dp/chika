<?php
session_start();
require_once'../config/connection.php';
require_once'../config/functions.php';
//adding a new operation
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 if(isset($_POST)){
      //echo "<pre>"; print_r($_POST); echo "</pre>";
     $allowed = array(
         "name",
         "phone",
         "function",
         "notes"
         ); // allowed fields
     $sql = "UPDATE helper_workers SET ".pdoSet($allowed,$values)." WHERE `id`=:id";
 //echo "<pre>"; print_r($_POST); echo "</pre>";
 //echo $sql;
 $values['id']=$_POST['id'];
 $stm = $pdo->prepare($sql);
 $stm->execute($values);
 header("Location:".$_SERVER['HTTP_REFERER']);
 }
 ?>
