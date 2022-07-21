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
$operations = "SELECT operations.operation, SUM(operations.quantity) AS quantity, helper_operations.name FROM operations
INNER JOIN helper_operations ON operations.operation=helper_operations.id
GROUP BY operation";
//$operations="SELECT * FROM operations ORDER BY operation ASC";
$stmt=$pdo->query($operations);
$op=" по всем изделиям";
?>
<br>
<hr>
<?php
  echo "<table class='table table-striped table-hover table-bordered'>";
  echo"<tr>
        <th>ID</th>
        <th>Название операции</th>
        <th>Количество</th>
          </tr>";
  //$date=date("Y-m-d");
  foreach ($stmt as $row) {
  echo "<tr>
  <td>".$row['operation']."</td>
  <td><a href='/?inc=card_operation&opid=".$row['operation']."'>".$row['name']."</a></td>
  <td align='right'>";
  //print_r($row);
  echo $row['quantity']."</td>;
  </tr>";
}
  echo "</table>";