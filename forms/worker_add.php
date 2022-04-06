<?php
//Форма  добавления сотрудника
 ?>
<form name="worker" method="post" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-center" action="/actions/worker_add.php">
<div class="col-auto"><input type="text" name="name" value="" placeholder="Ведите имя" required class="form-control"></div>
<div class="col-auto"><input type="text" name="phone" value="" placeholder="Телефон" required class="form-control"></div>
<div class="col-auto"><input type="text" name="function" value="" placeholder="Введите должнось" required class="form-control"></div>
<div class="col-auto"><input type="text" name="notes" value="" placeholder="Комментарий" required class="form-control"></div>
<div class="col-auto"><input type="submit" name="submit" value="Добавить" class="btn-primary form-control"></div>
</form>
