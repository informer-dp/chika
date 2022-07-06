<?php
/******SALARY*********/
class Salary{

public function __construct(){
  }
   public static function payrol1($worker){
     require_once('config/functions.php');
     //$pdo=connect_to_db();
     $host = 'localhost';
        $db   = 'jnylmamd_chirva';
         $user = 'jnylmamd_chirva';
         $pass = 'q3MM2_chika';
        $charset = 'utf8';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);
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
     <h2><img src='img/fact_check_black_24dp.svg' width="42">  Начислено зарплаты<?php echo $op;?></h2><hr>
     <div id='wrapper'>
     <div id="actions">
       <?php include_once'forms/salary.php';?>
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
       href='#'
       title='Удалить операцию из списка' onclick='operation_delete=".$row['id'].";'
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
  }
  public static function payroll($worker){
    require_once('config/functions.php');
    //$pdo=connect_to_db();

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
    $total=0;
    $total_day=0;
    ?>
    <br>
    <h2><img src='img/fact_check_black_24dp.svg' width="42">  Зарплата<?php echo $op;?></h2><hr>
    <div id='wrapper'>
    <div id="actions">
      <?php include_once'forms/salary.php';?>
    </div>
    <hr>
    <?php
      $date=date("Y-m-d");
      foreach ($stmt as $row) {
        $cost=$row['price']*$row['quantity']/100;
        $total+=$cost;
        if($row['operation_date']!=$date){
            if($total_day!=0){
          $date=$row['operation_date'];
          $total_day=0;
        }
        $total_day+=$cost;
        if($row['paid']==0){
          $paid="-";
        }else{
          $paid="Оплачено";
        }
      }
 }
    return $total;
}
   public static function salary_payment($worker){
     require_once('config/functions.php');
     $pdo=connect_to_db();
     ini_set('error_reporting', E_ALL);
     ini_set('display_errors', 1);
     ini_set('display_startup_errors', 1);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $salary_paid = "SELECT * FROM salary ORDER BY `payment_date` DESC";
     $stmt=$pdo->query($salary_paid);
     $op=" все";
     if(isset($_GET['worker'])){
       $salary_paid = "SELECT * FROM salary WHERE `worker`=:worker ORDER BY `payment_date` DESC";
       $stmt=$pdo->prepare($salary_paid, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $stmt->execute(array('worker' => $_GET['worker']));
     }
     $total=0;
       $date=date("Y-m-d");
       foreach ($stmt as $row) {
         $cost=$row['summa']/100;
         $total+=$cost;
       }
  return $total;
  }
   public static function payments_list($worker){
     require_once('config/functions.php');
     $pdo=connect_to_db();
     ini_set('error_reporting', E_ALL);
     ini_set('display_errors', 1);
     ini_set('display_startup_errors', 1);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $salary_paid = "SELECT * FROM salary ORDER BY `payment_date` DESC";
     $stmt=$pdo->query($salary_paid);
     $op=" все";
     if(isset($_GET['worker'])){
       $salary_paid = "SELECT * FROM salary WHERE `worker`=:worker ORDER BY `payment_date` DESC";
       $stmt=$pdo->prepare($salary_paid, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $stmt->execute(array('worker' => $_GET['worker']));
     }
     $total=0;
       $date=date("Y-m-d");
       echo "<hr/><table class='table  table-hover table-bordered'>";
       echo"<tr>
             <th>ID</th>
             <th>Провел</th>
             <th>Дата</th>
             <th>Сумма</th>
            </tr>";
       foreach ($stmt as $row) {
         $cost=$row['summa']/100;
         $total+=$cost;
         echo "<tr>
         <td>".$row['id']."</td>
         <td>".get_name_by_id($pdo,"users",$row['user'])."</td>
         <td>".human_date_format($row['payment_date'])."</td>
         <td align='right'><strong>".number_format(($row['summa']/100), 2, '.', '')."</strong></td>
         </td>
         </tr>";

         }
         echo "</table>";
       }
}
 ?>
