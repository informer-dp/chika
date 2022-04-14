<?php
session_start();
require_once'../config/connection.php';
require_once'../config/functions.php';
//adding a new operation
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 if(isset($_POST)){
   $price=get_price_by_operation($pdo,"helper_operations",$_POST['operation']);
   $_POST['price']=$price;
      echo "<pre>"; print_r($_POST); echo "</pre>";
     $allowed = array(
         "worker",
         "operation",
         "quantity",
         "price",
         "paid",
         "operation_date",
         "user",
         "comment"
         ); // allowed fields
     $sql = "UPDATE operations SET ".pdoSet($allowed,$values)." WHERE `id`=:id";
 //array_view($_POST);
 //echo $sql;
 $values['id']=$_POST['id'];
 $stm = $pdo->prepare($sql);
 $stm->execute($values);
 header("Location:".$_SERVER['HTTP_REFERER']);
 }
 ?>
