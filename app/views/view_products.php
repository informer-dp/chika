<?php
/*********WORKERS VIEWER***********/
require_once "./app/models/model_product.php";
$products=new Product();
if(!isset($_GET['id'])){
$products_list=$products::get_products_list("helper_products");
echo "<h2 class='mt-5'>Справочник изделий</h2><hr /><br />";
include_once "./forms/product_add.php";echo "<br />";
echo "<table class='table table-striped table-hover table-bordered'>";
echo "<tr><th>ID</th><th>Название</th><th>Цена</th></tr>";
foreach ($products_list as $key => $value) {
  echo "<tr>";
  echo  "<td>".$value['id']."</td><td><a href='/?inc=helper_products&id=".$value['id']."'>".$value['name']."</a></td><td>".$value['price']."</td>";
  echo "</tr>";
}
echo "</table>";
}else{
  $row_id=abs($_GET['id']);
  $product=$products::get_product_details("helper_products",$row_id);
  $operations=$products::get_product_operations("helper_operations",$row_id);
  echo "<br /><h2>Карточка продукта <span style='color:#CCCCCC;'>".$product['name']."</h2><hr />";
echo "<table class='table table-striped table-hover table-bordered'>
  <tr><th>Название:</th><td>".$product['name']."</td></tr>
  <tr><th>Цена:</th><td>".$product['price']."</td></tr>
</table>";
?>
<p>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Редактировать
  </a>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
     <h4 style='color:#CCCCCC;'>Редактировать изделие <span ><?echo $product['name'];?></span></h4><hr>
    <?php include_once'forms/product_add.php';?>
  </div>
</div>
<?php
echo "<h4 style='color:#CCCCCC;' class='secondary mt-5'>Операции по продукту ".$product['name']."</h4>";
?>
<p>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
    Добавить операцию
  </a>
</p>
<div class="collapse" id="collapseExample1">
  <div class="card card-body">

    <?php include_once'forms/card_operation_add.php';?>
  </div>
</div>
<?php
echo "<table class='table table-striped table-hover table-bordered'>";
echo "<tr><th>ID</th><th>Название</th><th>Цена</th><th>Заметки</th></tr>";
foreach ($operations as $k => $v) {
    echo "<tr><td>".$v['id']."</td><td><a href='./?inc=card_operation&opid=".$v['id']."'>".$v['name']."</a></td><td>".$v['price']."</td><td>".$v['notes']."</td></tr>";
}
echo "</table>";
?>


</div>
<a href="/?inc=helper_products"><img class="bordered" src='img/arrow_back_black_24dp.svg'>Назад к справочнику изделий</a>
<?php
}
?>
