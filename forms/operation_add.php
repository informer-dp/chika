<?php
/*OPERATION ADD*/
 ?>
 <form
 class="docker-form"
 name="operation_add"
 id="operation_add"
 action="actions/operation_add.php"
 method="post"
 enctype="multipart/form-data">

<h4>
  <button type="button" class="btn-close" aria-label="Close" onClick="elementToggle('operation_add');"></button>
  &nbsp;Добавить операцию</h4><hr>
   <fieldset>
     <legend></legend>
     <!--<label for"operation_date" class="form-label">Дата:</label><br>-->
     <input type="date" id="operation_date" name="operation_date"
       value="<?php echo date("Y-m-d")?>"
       min="2018-01-01" max="<?php echo date("Y-m-d")?>" class="form-control"><br>
     <label for"worker" class="form-label">Работник:</label><br>
     <?php worker_select($pdo);?><br>
     <label for"operation" class="form-label">Операция:</label><br>
     <?php operation_select($pdo);?><br>
     <label for"quantity" class="form-label">Количество:</label><br>
     <input type="quantity" name="quantity" value="" class="form-control">
     <input type="hidden" name="user" value="1"><br>
     <label for"comment" class="form-label">Комментарий</label><br>
     <textarea name="comment" rows="1" cols="80" placeholder="Введите текст комментария (необязательно)" class="form-control"></textarea><br>
     <input class="btn btn-primary" type="submit" name="save" value="Сохранить">
     <input class="btn btn-primary" type="button" name="cansel" value="Отмена" onClick="elementToggle('operation_add');">
   </fieldset>
 </form>
