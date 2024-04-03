<?php
$c1 = $_POST["firstCount"];
$c2 = $_POST["secondCount"];
$s = $_POST["sign"];
$res;
if (ctype_digit($c1) && ctype_digit($c2)) {
    switch ($s) {
        case '+':
            $res = $c1 + $c2;
            break;
        case '-':
            $res = $c1 - $c2;
            break;
        case '*':
            $res = $c1 * $c2;
            break;
        case '/':
            if ($c2 != 0) {
                $res = $c1 / $c2;
            } else {
                $res = 'Деление на нуль';
            }
            break;

        default:
            $res = 'Неверный ввод знака';
            break;
    }
} else {
    $res = "Неверный ввод чисел";
}
echo "Ответ: $res <br> <a href='http://calc/'>Назад</a> ";
