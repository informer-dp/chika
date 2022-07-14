<?php
//Форма  редактирования изделия
 ?>
<form name="product_edit" method="post" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-auto" action="/actions/product_edit.php">
<input type="hidden" name="id" value="<?php echo $product['id'];?>">
<div class="col-auto"><input type="text" name="category" value="<?php echo $product['category'];?>"  required class="form-control"></div>
<div class="col-auto"><input type="text" name="article" value="<?php echo $product['article'];?>" placeholder="Артикул" required class="form-control"></div>
<div class="col-auto"><input type="text" name="name" value="<?php echo $product['name'];?>" placeholder="Название" required class="form-control"></div>
<div class="col-auto"><input type="text" name="price" value="<?php echo $product['price'];?>" placeholder="" required class="form-control"></div>
<div class="col-auto"><input type="text" name="notes" value="<?php echo $product['notes'];?>" placeholder="Комментарий" required class="form-control"></div>
<div class="col-auto"><input type="submit" name="submit" value="Сохранить" class="btn-primary form-control"></div>
</form>
