<?php
/************ФОРМА РЕДАКТИРОВАНИЯ КАРТОЧКИ ОПЕРАЦИИ**********************/
 ?>
 <h4 style="color:#CCCCCC;">Редактирование операции</h4>
 <form action=""
class="row gy-2 gx-3 align-items-center"
 >
   <div class="mb-3 col-auto">
     <label for="name" class="form-label">Название</label>
        <input type="text" name="name" id="name" value="<?php echo $row['name']?>" required class="form-control">
    </div>
    <div class="mb-3 col-auto">
      <label for="product" class="form-label">Изделие</label>
        <?php product_select($pdo);?>
      </div>
      <div class="mb-3 col-auto">
       <label for="price" class="form-label">Цена</label>
   <input type="text" name="price" id="price" value="<?php echo $row['price']?>" required class="form-control">
 </div>
 <div class="mb-3">
  <label for="notes" class="form-label">Заметки</label>
   <input type="text" name="notes" id="notes" value="<?php echo $row['notes']?>" required class="form-control">
 </div>
 <div class="col-auto">
   <input type="submit" name="submit" value="Сохранить" class="btn btn-primary mb-3">
 </div>
 </form>
