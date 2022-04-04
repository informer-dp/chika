<?php
/*$sql="SELECT * FROM orders";
$res=mysql_query($sql) or trigger_error(mysql_error());
while($row=mysql_fetch_assoc($res)){
	$order=$row;
	echo $order['id'],"<br/>",$order['type']," ",$order['comment'];
}*/
?>
<h2>Операции</h2><hr>
<div id='wrapper'>
<div id="actions">
<a class='btn btn-primary' href="#" onClick="elementToggle('operation_add');">
    Создать операцию
</a>
</div>
<hr><br><br>
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$operations = "SELECT * FROM operations ORDER BY `created` DESC";
$stmt=$pdo->query($operations);
if(isset($_GET['worker'])){
  $operations = "SELECT * FROM operations WHERE `worker`=:worker ORDER BY `created` DESC";
  $stmt=$pdo->prepare($operations, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array('worker' => $_GET['worker']));

}
  /*echo '<form class="d-flex" method="post" action="/?inc=operations&worker='.$_GET['worker'].'">';
  echo  '<input class="form-control me-2" type="date" value="'.date("Y-m-d").'">';
  echo '<button class="btn btn-outline-success" type="submit">Search</button>';
  echo '</form>';*/
$total=0;
  echo "<table class='table table-striped table-hover table-bordered'>";
  echo"<tr>
        <th>ID</th>
        <th>Дата</th>
        <th>Работник</th>
        <th>Название операции</th>
        <th>Количество</th>
        <th>Стоимость</th>
          </tr>";
  foreach ($stmt as $row) {
    $cost=$row['price']*$row['quantity']/100;
    $total+=$cost;
  echo "<tr>
  <td>".$row['id']."</td>
  <td>".$row['operation_date']."</td>
  <td>".get_name_by_id($pdo,"helper_workers",$row['worker'])."</td>
  <td>".get_name_by_id($pdo,"helper_operations",$row['operation'])."</td>
  <td>".$row['quantity']."</td>
  <td>".$cost."</td>
  </tr>";

  }
  echo"<tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>Итого:</th>
        <th>".$total."&nbsp;грн.</th>
          </tr>";
  echo "</table>";

?>

<!--<div id="stripe"><?php //include_once 'stripe.php';?></div>-->

<?php
include_once 'forms/operation_add.php';
?>
</div>
