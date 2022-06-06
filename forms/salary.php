<?php
//Форма начисления зарплаты
 ?>
 <form
 name="salary_payment"
 id="salary_payment"
 action="actions/salary_payroll.php"
 method="post"
 enctype="multipart/form-data"
 class="row gy-2 gx-3 align-items-center"
 >


     <div class="col-auto">
       <input type="date" id="payment_date" name="payment_date"
       value="<?php echo date("Y-m-d");?>"
       min="2018-01-01" max="<?php echo date("Y-m-d");?>" class="form-control">
     </div>
     <div class="col-auto">
     <?php worker_select($pdo);?>
   </div>
   <div class="col-auto">
     <input type="number" name="summa" value="" class="form-control" placeholder="Сумма" size="11" required>
   </div>
     <input type="hidden" name="user" value="1">
     <input type="hidden" name="notes">
     <input type="hidden" name="ground" value="1">
     <!--<textarea name="comment" rows="1" cols="80" placeholder="Введите текст комментария (необязательно)" class="form-control"></textarea><br>-->
 <div class="col-auto">
     <input class="btn btn-primary" type="submit" name="save" value="Выплатить">
   </div>
 </form>
