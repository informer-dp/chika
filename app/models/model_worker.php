<?php
/*********РАБОТНИК***********/
require "model.php";
class Worker extends Model{
  public function __construct(){

  }
  public static function get_info($worker_id){
    $pdo=connect_to_db();
    $sql="SELECT * FROM helper_workers WHERE `id`=:worker_id";
    $stmt=$pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute(array('worker_id' => $worker_id));
    foreach ($stmt as $row){
      return $row;
    }
  }

  }
 ?>
