<?php
session_start();
require_once'../config/connection.php';
require_once'../config/functions.php';
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//adding a new operation
 if(isset($_POST)){
      //echo "<pre>"; print_r($_POST); echo "</pre>";
     $allowed = array(
        "category",
         "article",
         "name",
         "price",
         "notes"
         ); // allowed fields

     $sql = "UPDATE helper_products SET ".pdoSet($allowed,$values)." WHERE `id`=:id";
 //array_view($_POST);
 //echo $sql;
 $stm = $pdo->prepare($sql);
 //array_view($values);
 $values['id']=$_POST['id'];
 $stm->execute($values);
 $_SESSION['msg']="Продукт <b>".$_POST['name']."</b> успешно отредактирован";
 header("Location:".$_SERVER['HTTP_REFERER']);
 }
 ?>
