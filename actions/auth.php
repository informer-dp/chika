<?php

/*
 * SONAR.SERVICE.app by Khorolskyi Vitalii
 * All rights reserved  *
 */
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once '../config/functions.php';
require_once '../config/connection.php';
if(!isset($_SESSION)){session_start();}
if(isset($_POST)){
   $login= htmlentities($_POST['login']);
   $password= htmlentities($_POST['password']);
   $stmt = $pdo->prepare('SELECT * FROM users WHERE users.login=? AND users.password=md5(?)');
   $stmt->execute([$login,$password]);
   $user = $stmt->fetch();g
   if(strlen($user['login'])>3){
   //echo $user['first_name']." ".$user['last_name'];
   $_SESSION['user']=$user;
   header("Location: ./");
    } else {
        $_SESSION['msg']="Алярма, что-то не так";
    }
}
if($_GET['action']=='exit'){unset($_SESSION['user']);}
//array_view($_SERVER);
$location=$_SERVER['HTTP_REFERER'];
header("Location: /");
//echo 'lOGIN='. $login."<br/>". "HALLO ".$user['first_name'];
