 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>WEB Lab9</title>
  </head>

  <body>
    <h3>Вывести определенные записи</h3>
    <form action="filter_note.php" method="post">
      <label>Поле: </label>
    <select name='field'>
      <option>id</option>
      <option>Серия</option>
      <option>Номер</option>
      <option>Кем выдан</option>
      <option>Дата выдачи</option>
      <option>Номер лицевого счета</option>
      <option>Категория вклада</option>
      <option>Текущая сумма вклада</option>
      <option>Дата последней операции</option>
    </select>

    <label>Знак: </label>
  <select name='sign'>
    <option>=</option>
    <option><=</option>
    <option>>=</option>
    <option>!=</option>
    <option>></option>
    <option><</option>
  </select>

  <label>Значение: </label><input name='value' type="text" required size="30">
      <p><input type="submit" value="Показать">
    </form>
    <?php
    $field = $_POST['field'];
    $sign = $_POST['sign'];
    $value = $_POST['value'];
    $error_message = "Некорретные значения в поле: ";
    if ($field && $sign && $value){
      $dbconn = pg_connect("host=localhost dbname=lab9 user=postgres password=G77q22vk44") or die('Не удалось подключиться: ' .pg_last_error());
      if (($field == 'id' || $field == 'Номер лицевого счета' || $field == 'Текущая сумма вклада') && !preg_match("/^\d+/", $value)){
        echo $error_message. $field;
        echo "<p><a href='http://uliya.labs/lab9/filter_note.php'>Назад</a></p>";
        echo "<p><a href='http://uliya.labs/lab9/mainpage.php'>На главную</a></p>";
        exit;
      }
      if ($field == 'Серия' && !preg_match("/^\d{4}/", $value)){
        echo $error_message. $field;
        echo "<p><a href='http://uliya.labs/lab9/filter_note.php'>Назад</a></p>";
        echo "<p><a href='http://uliya.labs/lab9/mainpage.php'>На главную</a></p>";
        exit;
      }
      if ($field == 'Номер' && !preg_match("/^\d{6}/", $value)){
        echo $error_message. $field;
        echo "<p><a href='http://uliya.labs/lab9/filter_note.php'>Назад</a></p>";
        echo "<p><a href='http://uliya.labs/lab9/mainpage.php'>На главную</a></p>";
        exit;
      }
      if (($field == 'Дата выдачи' || $field == 'Дата последней операции') && !preg_match("/^\d{4}-\d{2}-\d{2}/", $value)){
        echo $error_message. $field;
        echo "<p><a href='http://uliya.labs/lab9/filter_note.php'>Назад</a></p>";
        echo "<p><a href='http://uliya.labs/lab9/mainpage.php'>На главную</a></p>";
        exit;
      }

      if (!$value || preg_match("/^ +/", $value)){
        echo "Значение не должно быть пустым.\n";
      }
      else {
        switch ($field) {
          case 'Серия':
            $field = 'passport_seria';
            break;

          case 'Номер':
          $field = 'passport_number';
            break;

          case 'Кем выдан':
          $field = 'passport_issued_by';
            break;

          case 'Дата выдачи':
          $field = 'passport_when_issued';
            break;

          case 'Номер лицевого счета':
          $field = 'account_number';
            break;

          case 'Категория вклада':
          $field = 'type_contribution';
            break;

          case 'Текущая сумма вклада':
          $field = 'deposit_amount';
            break;

          case 'Дата последней операции':
          $field = 'last_operation_date';
            break;
        }

        $select_query = "select * from task9 where $field $sign '$value'";
        $result = pg_query($dbconn, $select_query) or die('Ошибка запроса: ' .pg_last_error());
        $row = pg_fetch_all($result);
        if (!$row){
          echo "Подходящих записей не существует.\n";
        }
        else {
          echo "<h3>Записи по фильтру</h3>";
          $num_fields = pg_num_fields($result);
          echo "<table>\n";
          echo "<col span='12' class='coln'>";
            echo "\t<tr id='title'>\n";
          for($i = 0; $i < $num_fields; $i++){
            $field_name = pg_field_name ($result, $i);
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
              $field = 'Номер лицевого счета';
                break;

              case 'type_contribution':
              $field = 'Категория вклада';
                break;

              case 'deposit_amount':
              $field = 'Текущая сумма вклада';
                break;

              case 'last_operation_date':
              $field = 'Дата последней операции';
                break;
            }
            echo "\t\t<td>$field_name</td>\n";
          }
            echo "\t</tr>\n";

            foreach ($row as $col_value) {
              echo "\t<tr>\n";
              foreach ($col_value as $field) {
                echo "\t\t<td>$field</td>\n";
              }
              echo "\t</tr>\n";
            }
          echo "</table>\n";

          pg_free_result($result);
          pg_close($dbconn);
        }
      }
    }
     ?>
    <p><a href="http://uliya.labs/lab9/mainpage.php">Назад</a></p>

  </body>
</html>
