<?php
echo "<h3>Все записи из таблицы</h3>";
$dbconn = pg_connect("host=localhost dbname=lab9 user=postgres password=G77q22vk44") or die('Не удалось подключиться: ' .pg_last_error());
$create_query = "select * from task9";

$res = pg_query($create_query) or die('Ошибка запроса: ' .pg_last_error());
$num_fields = pg_num_fields($res);
echo "<table>\n";
  echo "\t<tr id='title'>\n";
for($i = 0; $i < $num_fields; $i++){
  $field_name = pg_field_name($res, $i);
  switch ($field_name) {
    case 'passport_seria':
      $field_name = 'Серия';
      break;

    case 'passport_number':
    $field_name = 'Номер';
      break;

    case 'passport_issued_by':
    $field_name = 'Кем выдан';
      break;

    case 'passport_when_issued':
    $field_name = 'Дата выдачи';
      break;

    case 'account_number':
    $field_name = 'Номер лицевого счета';
      break;

    case 'type_contribution':
    $field_name = 'Категория вклада';
      break;

    case 'deposit_amount':
    $field_name = 'Текущая сумма вклада';
      break;

    case 'last_operation_date':
    $field_name = 'Дата последней операции';
      break;
  }
  echo "\t\t<td>$field_name</td>\n";
}
  echo "\t</tr>\n";
  $row = pg_fetch_all($res);
    foreach ($row as $col_value) {
      echo "\t<tr>\n";
      foreach ($col_value as $field) {
        echo "\t\t<td>$field</td>\n";
      }
      echo "\t</tr>\n";
    }
  echo "</table>\n";
pg_free_result($res);
pg_close($dbconn);
echo "<p><a href='http://uliya.labs/lab9/mainpage.php'>На главную</a></p>";
 ?>
