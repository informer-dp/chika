<?php
/*$sql="SELECT * FROM orders";
$res=mysql_query($sql) or trigger_error(mysql_error());
while($row=mysql_fetch_assoc($res)){
	$order=$row;
	echo $order['id'],"<br/>",$order['type']," ",$order['comment'];
}*/
?>
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$operations = "SELECT * FROM operations ORDER BY `operation_date` DESC";
$stmt=$pdo->query($operations);
$op=" все";
if(isset($_GET['worker'])){
  $operations = "SELECT * FROM operations WHERE `worker`=:worker ORDER BY `operation_date` DESC";
  $stmt=$pdo->prepare($operations, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array('worker' => $_GET['worker']));
  $op=" работника ".get_name_by_id($pdo,"helper_workers",$_GET['worker']);

}
  /*echo '<form class="d-flex" method="post" action="/?inc=operations&worker='.$_GET['worker'].'">';
  echo  '<input class="form-control me-2" type="date" value="'.date("Y-m-d").'">';
  echo '<button class="btn btn-outline-success" type="submit">Search</button>';
  echo '</form>';*/
$total=0;
$total_day=0;
?>
<br>
<h2><img src='img/fact_check_black_24dp.svg' width="42">  Операции<?php echo $op;?></h2><hr>
<div id='wrapper'>
<div id="actions">
  <?php include_once'forms/operation_add1.php';?>
</div>
<hr>
<?php
  echo "<table class='table  table-hover table-bordered'>";
  echo"<tr>
        <th>ID</th>
        <th>Работник</th>
        <th>Название операции</th>
        <th>Кол-во</th>
        <th>Цена</th>
        <th>Стоимость</th>
        <th>Оплата</th>
          </tr>";
  $date=date("Y-m-d");
  foreach ($stmt as $row) {
    $cost=$row['price']*$row['quantity']/100;
    $total+=$cost;
    if($row['operation_date']!=$date){
        if($total_day!=0){
              echo"<tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style='text-align:right;'>Итого за день:</th>
                    <th style='text-align:right;'>".number_format($total_day, 2, '.', '')."</th>
                    <th>грн.</th>
                      </tr>";
                    }
      echo "<tr><td colspan='7' style='border:none;background-color: #f1f1f1;'><br><h4>".human_date_format($row['operation_date'])."</h4></td></tr>";
      $date=$row['operation_date'];
      $total_day=0;
    }
    $total_day+=$cost;
    if($row['paid']==0){
      $paid="-";
    }else{
      $paid="Оплачено";
    }
  echo "<tr>
  <td>".$row['id']."</td>
  <td>".get_name_by_id($pdo,"helper_workers",$row['worker'])."</td>
  <td>".get_name_by_id($pdo,"helper_operations",$row['operation'])."</td>
  <td>".$row['quantity']."</td>
  <td align='right'>".number_format(($row['price']/100), 2, '.', '')."</td>
  <td align='right'>".number_format($cost, 2, '.', '')."</td>
  <td><a href='/?inc=operation_details&opid=".$row['id']."&worker=".$row['worker']."&op=".$row['operation']."' title='Редактировать запись'><img src='img/edit_note_black_24dp.svg'></a>
  <a
  href='../actions/operation_delete.php?id=".$row['id']."'
  title='Удалить операцию из списка'
  data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\"
  ><img src='img/clear_black_24dp.svg'></a>

  </td>
  </tr>";

  }
  echo"<tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th style='text-align:right;'>Итого за день:</th>
        <th style='text-align:right;'>".number_format($total_day, 2, '.', '')."</th>
        <th>грн.</th>
          </tr>";
  echo"<tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th style='text-align:right;'>Итого:</th>
        <th style='text-align:right;'>".number_format($total, 2, '.', '')."</th>
        <th>грн.</th>
          </tr>";
  echo "</table>";

?>

<!--<div id="stripe"><?php //include_once 'stripe.php';?></div>-->

<?php
include_once 'forms/operation_add.php';
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Удаление операции</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Чи, подумай и определись: ты действительно хочешь удалить операцию из журнала?И нафига оно тебе надо?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary">Удалить</button>
        <a class="btn btn-primary" href="../actions/operation_delete.php?id=<?php echo $row['id'];?>">Удалить</a>
      </div>
    </div>
  </div>
</div>
