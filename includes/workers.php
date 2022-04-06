<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$workers = "SELECT * FROM helper_workers ORDER BY `name` ASC";
$stmt=$pdo->query($workers);
?>
<br>
<h2>Работники</h2><hr>
<div id='wrapper'>
<div id="actions">
  <?php include_once'forms/worker_add.php';?>

</div>
<hr>
<?php
  echo "<table class='table table-striped table-hover table-bordered'>";
  echo"<tr>
        <th>Имя</th>
        <th>Номер телефона</th>
        <th>Должность</th>
        <th>Заметки</th>
          </tr>";
  foreach ($stmt as $row) {
  echo "<tr>
  <td>".$row['name']."</td>
  <td>".$row['phone']."</td>
  <td>".$row['function']."</td>
  <td>".$row['notes']."</td>
  </tr>";

  }
  echo "</table>";
?>
