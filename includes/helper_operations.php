<?php
/***********СПРАВОЧНИК ОПЕРАЦИЙ*************/

 ini_set('error_reporting', E_ALL);
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $operations = "SELECT * FROM `helper_operations` ORDER BY `product`,`name` ASC";
 $stmt=$pdo->query($operations);
 $op=" по всем изделиям";
 if(isset($_GET['product'])){
   $operations = "SELECT * FROM helper_operations WHERE `product`=:product ORDER BY `name` ASC";
   $stmt=$pdo->prepare($operations, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $stmt->execute(array('product' => $_GET['product']));
   $op=" по изделию ".get_name_by_id($pdo,"helper_products",abs($_GET['product']));

 }
   /*echo '<form class="d-flex" method="post" action="/?inc=operations&worker='.$_GET['worker'].'">';
   echo  '<input class="form-control me-2" type="date" value="'.date("Y-m-d").'">';
   echo '<button class="btn btn-outline-success" type="submit">Search</button>';
   echo '</form>';*/
   session_msg();
 ?>
 <br>
 <h2>Справочник операций<?php echo $op;?></h2><hr>
 <div id='wrapper'>
 <div id="actions">
 </div>
 <p>
   <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
     Добавить
   </a>
 </p>
 <div class="collapse" id="collapseExample">
   <div class="card card-body">
     <?php include_once'forms/card_operation_add.php';?>
   </div>
 </div>
 <hr>
 <?php
   echo "<table class='table table-striped table-hover table-bordered'>";
   echo"<tr>
         <th>ID</th>
         <th>Изделие</th>
         <th>Название операции</th>
         <th>Цена, грн</th>
           </tr>";
   $date=date("Y-m-d");
   foreach ($stmt as $row) {
   echo "<tr>
   <td>".$row['id']."</td>
   <td>".get_name_by_id($pdo,"helper_products",$row['product'])."</td>
   <td><a href='/?inc=card_operation&opid=".$row['id']."'>".$row['name']."</a></td>
   <td align='right'>".number_format(($row['price']/100), 2, '.', '')."</td>
   </tr>";
 }
   echo "</table>";

 ?>
 </div>
