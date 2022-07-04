<?php
//Форма  добавления сотрудника
 ?>
<form name="worker" method="post" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-center" action="/actions/worker_edit.php">
<div class="col-auto">
  <label for="name" style="font-weight: bold;">Имя:</label><input type="text" name="name" value="<?php echo $row['name'];?>" placeholder="Ведите имя" required class="form-control"></div>
<div class="col-auto">
  <label for="phone" style="font-weight: bold;">Телефон:</label><input type="text" name="phone" value="<?php echo $row['phone'];?>" placeholder="Телефон" required class="form-control"></div>
<div class="col-auto">
  <label for="function" style="font-weight: bold;">Должность:</label><input type="text" name="function" value="<?php echo $row['function'];?>" placeholder="Введите должнось" required class="form-control"></div>
<div class="col-auto">
  <label for="notes" style="font-weight: bold;">Заметки:</label><textarea name="notes" cols="30" rows="3" placeholder="Комментарий" required class="form-control"><?php echo $row['notes'];?></textarea></div>
<input type="hidden" name="id" value="<?echo $worker_id;?>">
<div class="col-auto"><input type="submit" name="submit" value="Сохранить" class="btn-primary form-control"></div>
</form>
