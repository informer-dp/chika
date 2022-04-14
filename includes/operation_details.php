<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_GET['opid'])){
  $operations = "SELECT * FROM operations WHERE `id`=:id";
  $stmt=$pdo->prepare($operations, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array('id' => $_GET['opid']));
}
  /*echo '<form class="d-flex" method="post" action="/?inc=operations&worker='.$_GET['worker'].'">';
  echo  '<input class="form-control me-2" type="date" value="'.date("Y-m-d").'">';
  echo '<button class="btn btn-outline-success" type="submit">Search</button>';
  echo '</form>';*/
?>
<br>
<h2><img src='img/fact_check_black_24dp.svg' width="42">  Операция №<?php echo $_GET['opid'];?></h2><hr>
<div id='wrapper'>
<div id="actions">
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
  <td>".$paid."</td>
  </tr>";

  }
  echo "</table>";

?>
<p>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Редактировать
  </a>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    <?php include_once'forms/operation_edit.php';?>
  </div>
</div>
<!--<div id="stripe"><?php //include_once 'stripe.php';?></div>-->

<?php
include_once 'forms/operation_add.php';
?>
</div>
