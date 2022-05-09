<?php
/*База учета для Чирвы*/
//Проверка авторизации
//Подключение библиотеки функций
if(!isset($_SESSION)){session_start();}
require_once('config/functions.php');
require_once('config/connection.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="/css/master.css">
    <link rel="icon" href="img/favicon.svg" type="image/x-icon">
    <script type="text/javascript" src="config/scripts.js">

    </script>
    <title>CHIKA</title>
    <!-- Bootstrap CSS (jsDelivr CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Bootstrap Bundle JS (jsDelivr CDN) -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </head>
  <body>
    <?php
    if(!isset($_SESSION['user'])){
        header("Location:/forms/auth.php") ;
    }
    else {
        include_once 'includes/switcher.php';
    }
    /*echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';*/

    ?>
    <section name='viewer' id='viewer'>
<?php //include_once('includes/switcher.php'); ?>
    </section>
  </body>
</html>
