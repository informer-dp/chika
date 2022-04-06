<?php
/*OPERATION ADD*/
 ?>
 <form
 name="operation_add1"
 id="operation_add1"
 action="actions/operation_add.php"
 method="post"
 enctype="multipart/form-data"
 class="row gy-2 gx-3 align-items-center"
 >


     <div class="col-auto">
       <input type="date" id="operation_date" name="operation_date"
       value="<?php echo date("Y-m-d")?>"
       min="2018-01-01" max="<?php echo date("Y-m-d")?>" class="form-control">
     </div>
     <div class="col-auto">
     <?php worker_select($pdo);?>
   </div>
   <div class="col-auto">
     <?php operation_select($pdo);?>
   </div>
   <div class="col-auto">
     <input type="quantity" name="quantity" value="" class="form-control" placeholder="Количество" size="3" required>
</div>
     <input type="hidden" name="user" value="1">
     <input type="hidden" name="comment">
     <!--<textarea name="comment" rows="1" cols="80" placeholder="Введите текст комментария (необязательно)" class="form-control"></textarea><br>-->
<div class="col-auto">
     <input class="btn btn-primary" type="submit" name="save" value="Сохранить">
   </div>
 </form>
