<?php
/*********WORKERS VIEWER***********/
require_once "./app/models/model_worker.php";
if (isset($_GET['id'])){
  $worker_id=abs($_GET['id']);
  $worker=new Worker();
  $row=$worker->get_info($worker_id);
}
?>
<br><h2>Карточка сотрудника <span style="color: #CCCCCC;"><?php echo $row['name'];?></span></h2><hr><br>
<table class="table table-hover table-bordered">
  <tr>
    <th>ФИО:</th>
    <td><?php echo $row['name'];?></td>
  </tr>
  <tr>
    <th>Телефон:</th>
    <td><?php echo $row['phone'];?></td>
  </tr>
  <tr>
    <th>Должность:</th>
    <td><?php echo $row['function'];?></td>
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
    <?php include_once'./forms/worker_edit.php';?>
  </div>
</div>

</div>
<a href="/?inc=workers"><img class="bordered" src='img/arrow_back_black_24dp.svg'>Назад к списку сотрудников</a>
