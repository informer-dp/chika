<?php
/**********dashboard************/
function operation_count($operation){
  $pdo=connect_to_db();
  $operations = "SELECT COUNT(*) FROM operations WHERE `operation`=:operation ORDER BY `created` DESC";
  $stmt=$pdo->prepare($operations, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array('operation' => $operation));
  $result['name']=get_name_by_id($pdo,"helper_operations",$operation);
foreach($stmt as $k=>$v){
  $result['counter']=$v;
}
return $result;
}
  ?>
<h2>Привет, Чирвочка!!!</h2><hr>
<h3><a href="./?inc=operations_dates">Операции</a></h3>
<?
print_r(operation_count(7));
