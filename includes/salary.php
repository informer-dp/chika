<?php
require_once("./classes/salary.php");
if(isset($_GET['worker'])){
  $worker=intval($_GET['worker']);
}else {
  $worker=0;
}

$salary = new Salary;
$payroll=Salary::payroll($worker);
$paid=Salary::salary_payment($worker);
$balance=$paid-$payroll;
//Salary::salary_payment($worker);
echo"<h4>Начислено:&nbsp;&nbsp;".number_format($payroll, 2, '.', '')." грн.</h4>";
echo"<h4>Выплачено:&nbsp;&nbsp;".number_format($paid, 2, '.', '')." грн.</h4>";
echo"<h4>Баланc:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".number_format($balance, 2, '.', '')." грн.</h4>";
Salary::payments_list($worker);
?>
