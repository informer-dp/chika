<?php
/**********dashboard************/
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
<h2>Привет, Чирвочка!!!</h2><hr>
<h3><a href="./?inc=operations_dates">Операции</a></h3>
<?php
/***********СЧЕТЧИК ОПЕРАЦИЙ*************/
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$operations = "SELECT operation, COUNT(*) AS counting FROM `operations` GROUP BY `operation`";
$stmt=$pdo->query($operations);
$op=" по всем изделиям";
?>
<br>
<hr>
<?php
  echo "<table class='table table-striped table-hover table-bordered'>";
  echo"<tr>
        <th>Изделие</th>
        <th>Название операции</th>
        <th>Количество</th>
          </tr>";
  //$date=date("Y-m-d");
  foreach ($stmt as $row) {
    
  echo "<tr>
  <td>"./*get_name_by_id($pdo,"helper_products",$row['product']).*/"</td>
  <td><a href='/?inc=card_operation&opid=".$row['operation']."'>".get_name_by_id($pdo,"helper_operations",$row['operation'])."</a></td>
  <td align='right'>";
  //print_r($row);
  echo $row['counting']."</td>;
  </tr>";
}
  echo "</table>";