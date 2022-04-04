<?php
require_once'../config/connection.php';
require_once'../config/functions.php';
//adding a new operation
 if(isset($_POST)){
   $price=get_price_by_operation($pdo,"helper_operations",$_POST['operation']);
   $_POST['price']=$price;
      //echo "<pre>"; print_r($_POST); echo "</pre>";
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

     $sql = "INSERT INTO operations SET ".pdoSet($allowed,$values);
 //array_view($_POST);
 //echo $sql;
 $stm = $pdo->prepare($sql);
 //array_view($values);
 $stm->execute($values);
 header("Location:".$_SERVER['HTTP_REFERER']);
 }
 ?>
