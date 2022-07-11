<?php
/*********Класс работы с таблицами***********/
/*********WORKING WITH TABLES***********/
require "model_table.php";
class Product extends Table{
  public function __construct(){

  }
  public static function get_products_list($table_name){
    $pdo=connect_to_db();
    $sql="SELECT * FROM ".$table_name." ORDER BY `created` DESC";
    $stmt=$pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt=$pdo->query($sql);
    $rows=[];
    foreach ($stmt as $row){
      //array of all rows
      $rows[]=$row;
    }
    return $rows;
  }
public static function get_product_details($table_name,$row_id){
  $pdo=connect_to_db();
  $sql="SELECT * FROM ".$table_name." WHERE `id`=:row_id";
  $stmt=$pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array('row_id' => $row_id));
  foreach ($stmt as $row){
    return $row;
}
}
public static function get_product_operations($table_name,$product_id){
  $pdo=connect_to_db();
  $sql="SELECT * FROM ".$table_name." WHERE `product`=:product_id";
  $stmt=$pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array('product_id' => $product_id));
  $rows=[];
  foreach ($stmt as $row){
    $rows[]=$row;
}
return $rows;
}
}
?>
