<?php

/*
 * SONAR.SERVICE.app by Khorolskyi Vitalii
 * All rights reserved  *
 */
if(!isset($_SESSION)){session_start();};
?>

<div >
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);}
?>

    <?php include_once 'forms/auth.php';?>
  </div>
