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
   $db   = 'chika';
   $user = 'root';
   $pass = '';
   $charset = 'utf8';
   $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
   $opt = [
       PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
       PDO::ATTR_EMULATE_PREPARES   => false,
       PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
   ];
   $pdo = new PDO($dsn, $user, $pass, $opt);
}
function operation_select($pdo){
    $operation = "SELECT * FROM `helper_operations` ORDER BY `name`";
    echo "<select name='operation' class='form-select form-select-lg'>";
    foreach ($pdo->query($operation) as $row) {
    echo "<option name='' value='".$row['id']."'>".$row['name']."</option>";
    }
    echo "</select>";
    }
function worker_select($pdo){
      $worker = "SELECT * FROM `helper_workers` ORDER BY `name`";
      echo "<select name='worker' class='form-select form-select-lg'>";
      foreach ($pdo->query($worker) as $row) {
        if($_GET['worker']==$row['id']){
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
