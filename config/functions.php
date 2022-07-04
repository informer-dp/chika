<?php
/**********БИБЛИОТЕКА ФУНКЦИЙ************/
function pdoSet($allowed, &$values, $source = array()) {
  $set = '';
  $values = array();
  if (!$source) $source = &$_POST;
  foreach ($allowed as $field) {
    if (isset($source[$field])) {
      $set.="`".str_replace("`","``",$field)."`". "=:$field, ";
      $values[$field] = $source[$field];
    }
  }
  return substr($set, 0, -2);
}
function signin_check ($login,$pass){
  if (isset($_POST['authorization'])){
    header("Location:index.php");
  }else {
    $_SESSION['msg']="Что-то не так";
    header("Location:signin.php");
  }
}
function connect_to_db(){
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
   return $pdo;
}
function operation_select($pdo){
    $operation = "SELECT * FROM `helper_operations` ORDER BY `name`";
    echo "<select name='operation' class='form-select' required>";
    echo "<option value='' disabled selected>Выберите операцию</option>";
    foreach ($pdo->query($operation) as $row) {
      if((isset($_GET['op']))&&(($_GET['op']==$row['id']))){
        $selected=" selected";
      }else{
        $selected="";
      }
    echo "<option ".$selected." name='' value='".$row['id']."'>".$row['name']."</option>";
    }
    echo "</select>";
    }
function product_select($pdo){
        $product = "SELECT * FROM `helper_products` ORDER BY `name`";
        echo "<select name='product' class='form-select' required>";
        echo "<option value='' disabled selected>Выберите изделие</option>";
        foreach ($pdo->query($product) as $row) {
        echo "<option name='' value='".$row['id']."'>".$row['name']."</option>";
        }
        echo "</select>";
        }

function worker_select($pdo){
      $worker = "SELECT * FROM helper_workers ORDER BY `name`";
      echo "<select name='worker' class='form-select' required>";
      if(!isset($_GET['worker'])){
        echo "<option value='' disabled selected>Выберите сотрудника</option>";
      }
      foreach ($pdo->query($worker) as $row) {
        if((isset($_GET['worker']))&&(($_GET['worker']==$row['id']))){
          $selected=" selected";
        }else{
          $selected="";
        }
      echo "<option ".$selected." name='' value='".$row['id']."'>".$row['name']."</option>";
      }
      echo "</select>";
      }
function get_name_by_id($pdo,$table,$id){
    $sql="SELECT ".$table.".name FROM ".$table." WHERE ".$table.".id=?";
    $stm=$pdo->prepare($sql);
    $stm->execute(array($id));
    $name=$stm->fetchColumn();
    return $name;
}
function get_username_by_id($pdo,$id){
    if($id==0){
        return "<b>Член экипажа НЛО</b>";
    }else{
        $sql="SELECT * FROM users WHERE id=?";
    $stm=$pdo->prepare($sql);
    $stm->execute(array($id));
    $name=$stm->fetch();
    return $name['name'];
    }
}
function get_price_by_operation($pdo,$table,$id){
    $sql="SELECT ".$table.".price FROM ".$table." WHERE ".$table.".id=?";
    $stm=$pdo->prepare($sql);
    $stm->execute(array($id));
    $price=$stm->fetchColumn();
    return $price;
}
function human_date_format($input_date){
  $months = array(
    '01' => 'января',
    '02' => 'февраля',
    '03' => 'марта',
    '04' => 'апреля',
    '05' => 'мая',
    '06' => 'июня',
    '07' => 'июля',
    '08' => 'августа',
    '09' => 'сентября',
    '10' => 'октября',
    '11' => 'ноября',
    '12' => 'декабря'
  );
  $year=substr($input_date,0,4);
  $month=substr($input_date,5,2);
  $day=substr($input_date,8,2);
  return $day." <span style='opacity:0.4;'>".$months[$month]."</span> <br><span style='opacity:0.2;font-size:0.5em;'>".$year."</span>";
}
function session_msg(){
  if(isset($_SESSION['msg'])){
    echo '<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Чирвочка такая мададєц!)))</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>'.$_SESSION['msg'].'.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>';
unset($_SESSION['msg']);
  }
}
