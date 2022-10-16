<?php
// Добавить скрипт для чтения данных MySQL и экспорта в Excel
include ( "vendor/read_and_export.php" ) ;
?>

<!DOCTYPE html>
<html>
<head>
<title>Экспорт данных MySQL в Excel с помощью PHP</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
<br/><br/><h2 style='color:green'>Информация о таблице товаров</h2>
<div class="col-sm-12">
<div>
<form action="vendor/read_and_export.php" method="post">
<button type="submit" id="export" name="export"
value="Export to excel" class="btn btn-success">Экспорт в Excel</button>
</form>
</div>
</div>
<br/>
<table id="" class="table table-striped table-bordered">
<tr>
<th>ID</th>
<th>Название</th>
<th>Описание</th>
<th>Цена</th>
<th>Категория</th>
</tr>
<tbody>
<?php foreach($items as $item) { ?>
<tr>
<td><?php echo $item ['id']; ?></td>
<td><?php echo $item ['title']; ?></td>
<td><?php echo $item ['description']; ?></td>
<td><?php echo $item ['price']; ?></td>
<td><?php echo $item ['categories']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

</body>
</html>