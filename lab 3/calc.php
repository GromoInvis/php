<?php

include 'calc.inl.php';

$num1 = $_POST['num1Inserted'];
$num2 = $_POST['num2Inserted'];
$cal = $_POST['calInserted'];

$calculator = new Calc($num1, $num2, $cal);
echo $calculator->calcMethod();
echo " <br> <a href='index.html'>Назад</a> ";
