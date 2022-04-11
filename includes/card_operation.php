<?php
/************КАРТОЧКА ОПЕРАЦИИ*****************/
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
if(isset($_GET['opid'])){
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $operations = "SELECT * FROM helper_operations WHERE `id`=:opid ORDER BY `name` ASC";
    $stmt=$pdo->prepare($operations, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute(array('opid' => $_GET['opid']));
    foreach ($stmt as $row) {;}
}
?>
<br>
<h2>Карточка операции &laquo;<span style="color: #CCCCCC;"><?php echo $row['name'];?></span>&raquo;</h2><hr><br>


  <table class="table table-hover table-bordered">
    <tr>
      <th>Название:</th>
      <td><?php echo $row['name'];?></td>
    </tr>
    <tr>
      <th>Изделие:</th>
      <td><?php echo get_name_by_id($pdo, "helper_products",$row['product']);?></td>
    </tr>
    <tr>
      <th>Цена:</th>
      <td><?php echo number_format(($row['price']/100), 2, '.', '');?>&nbsp;грн</td>
    </tr>
    <tr>
      <th>Заметки:</th>
      <td><?php echo $row['notes'];?></td>
    </tr>
  </table>
  <p>
    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      Редактировать
    </a>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
      <?php include_once'forms/card_operation.php';?>
    </div>
  </div>
</div>
