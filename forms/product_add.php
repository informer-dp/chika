<?php
//Форма  добавления изделия
 ?>
<form name="product" method="post" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-auto" action="/actions/product_add.php">
<div class="col-auto"><input type="text" name="name" value="" placeholder="Название" required class="form-control"></div>
<div class="col-auto"><input type="text" name="phone" value="" placeholder="Цена" required class="form-control"></div>
<div class="col-auto"><input type="text" name="notes" value="" placeholder="Комментарий" required class="form-control"></div>
<div class="col-auto"><input type="submit" name="submit" value="Добавить" class="btn-primary form-control"></div>
</form>
