<?php
session_start();

require_once "connect.php";
$items = array();
$result = mysqli_query ($connect, "SELECT * FROM `products`");

// Сохраняем записи таблицы в массив
while( $row = $result->fetch_assoc() ) {
$items[] = $row;
}
// Проверяем, нажата ли кнопка экспорта
if(isset($_POST["export"])) {
// Определим имя файла с текущей датой
$fileName = "DateBase.xls";

// Устанавливаем информацию заголовка для экспорта данных в формате Excel
header('Content-Type: application/x-www-form-urlencoded');
header('Content-Disposition: attachment; filename='.$fileName);

// Устанавливаем переменную в false для заголовка
$heading = false;

// Добавляем данные таблицы MySQL в файл Excel
if(!empty($items)) {
foreach($items as $item) {
if(!$heading) {
echo implode("\t", array_keys($item)) . "\n";
$heading = true;
}
echo implode("\t", array_values($item)) . "\n";
}
}
exit();
}
?>