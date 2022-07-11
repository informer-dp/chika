<?php
/************ФОРМА КАРТОЧКИ ОПЕРАЦИИ**********************/
 ?>
 <h4 style="color:#CCCCCC;">Добавление операции</h4>
 <form
 name="operation_add"
 id="operation_add"
 action="actions/helper_operation_add.php"
 method="post"
 enctype="multipart/form-data"
 class="row gy-2 gx-3 align-items-center"
 >
   <div class="mb-3 col-auto">
     <label for="name" class="form-label">Название</label>
        <input
        type="text"
        name="name"
        id="name"
        value=""
        placeholder="Введите название операции"
        required
        class="form-control">
    </div>
    <div class="mb-3 col-auto">
      <label for="product" class="form-label">Изделие</label>
        <?php
          if(isset($_GET['id'])){
            $product_id=abs($_GET['id']);
          }else{
            $product_id=0;
          }
        product_select($pdo,$product_id);?>
      </div>
      <div class="mb-3 col-auto">
       <label for="price" class="form-label">Цена (в копейках)</label>
   <input
   type="number"
   name="price"
   id="price"
   value=""
   placeholder="Введите цену"
   required
   class="form-control">
 </div>
 <div class="mb-3">
  <label for="notes" class="form-label">Заметки</label>
   <input
   type="text"
   name="notes"
   id="notes"
   value=""
   placeholder="Введите заметку"
   class="form-control">
 </div>
 <div class="col-auto">
   <input type="submit" name="submit" value="Сохранить" class="btn btn-primary mb-3">
 </div>
 </form>
