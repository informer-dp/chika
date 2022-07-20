<?php
/*********Класс работы с таблицами***********/
/*********WORKING WITH TABLES***********/
require "model.php";
require_once "config/functions.php";
class Table extends Model{
  public function __construct(){

  }
  public static function get_rows_list($table_name){
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
public static function get_row_details($table_name,$row_id){
  $pdo=connect_to_db();
  $sql="SELECT * FROM ".$table_name." WHERE `id`=:row_id";
  $stmt=$pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array('row_id' => $row_id));
  foreach ($stmt as $row){
    return $row;
}
}
public static function row_update($table_name,$row_id,$params){
  $pdo=connect_to_db();
  $sql="UPDATE ".$table_name." SET".$params." WHERE `id`=:row_id";
  $stmt=$pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array('row_id' => $row_id));
  foreach ($stmt as $row){
    return $row;
}
}
}
?>