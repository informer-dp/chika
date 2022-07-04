<?php
session_start();
require_once'../config/connection.php';
require_once'../config/functions.php';
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//adding a new operation
 if(isset($_POST)){
   $_POST['price']=abs($_POST['price']);
      //echo "<pre>"; print_r($_POST); echo "</pre>";
     $allowed = array(
         "name",
         "product",
         "price",
         "notes",
         ); // allowed fields

     $sql = "UPDATE helper_operations SET ".pdoSet($allowed,$values)." WHERE `id`=:id";
 //array_view($_POST);
 //echo $sql;
 $stm = $pdo->prepare($sql);
 //array_view($values);
 $values['id']=$_POST['id'];
 $stm->execute($values);
 $_SESSION['msg']="Операция <b>".$_POST['name']."</b> успешно отредактирована";
 header("Location:".$_SERVER['HTTP_REFERER']);
 }
 ?>
