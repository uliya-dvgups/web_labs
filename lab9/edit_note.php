<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Задание 7</title>
    </head>
    <body>
      <form action="edit_note.php" method="post">
        <h2>Введите свои данные о вкладе:</h2>
          <fieldset>
            <legend>Паспортные данные</legend>
            <p><em>id:</em><input type="text" name="id_note" size="6" maxlength="4" placeholder="Введите id записи" required>
            <em>Серия:</em><input type="text" name="passport_seria" size="6" maxlength="4" placeholder="Введите серию паспорта">
            <em>Номер:</em><input type="text" name="passport_number" size="8" maxlength="6" placeholder="Введите номер паспорта">
            </p>
            <p><em>Кем выдан:</em><input type="text" name="passport_issued_by" size="50" placeholder="Введите данные"></p>
            <p><em>Когда выдан:</em><input type="date" name="passport_when_issued" size="20" placeholder="Выберите дату"></p>
          </fieldset>
        <br />
          <fieldset>
            <legend>Данные о вкладе</legend>
            <p><em>Номер лицевого счета:</em><input type="text" name="account_number" size="26" maxlength="8" placeholder="Введите номер лицевого счета"></p>
            <p><em>Категория вклада:</em>
            <input list="vclad" size="26" placeholder="Выберите категорию вклада" name="type_contribution">
            <datalist id="vclad">
            <option>До востребования</option>
            <option>Сберегательный</option>
            <option>Накопительный</option>
            <option>Расчетный</option>
            <option>Для физических лиц</option>
            <option>Для юридических лиц</option>
            </p>
            <p><em>Текущая сумма вклада:</em>
            <input type="text" name="deposit_amount" size="26" maxlength="8" placeholder="Введите текущую сумму вклада"></p>
            <p><em>Дата последней операции:</em>
            <input type="date" name="last_operation_date" size="17" placeholder="Выберите дату"></p>
          </fieldset>
        <p><input type="submit"></p>
      </form>
  <?php
      $id_note = $_POST['id_note'];
      $passport_seria = $_POST['passport_seria'];
      $passport_number = $_POST['passport_number'];
      $passport_when_issued = $_POST['passport_when_issued'];
      $passport_issued_by = $_POST['passport_issued_by'];

      $account_number = $_POST['account_number'];
      $type_contribution = $_POST['type_contribution'];
      $deposit_amount = $_POST['deposit_amount'];
      $last_operation_date = $_POST['last_operation_date'];

      $dbconn = pg_connect("host=localhost dbname=lab9 user=postgres password=G77q22vk44") or die('Не удалось подключиться: ' .pg_last_error());
      $error_message = "Некорретные значения в поле: ";

      $select_query = "select * from task9 where id = $id_note";
      $result = pg_query($select_query) or die('Ошибка запроса: ' .pg_last_error());
      $row = pg_fetch_array($result, null, PGSQL_ASSOC);

      if (!$row){
        echo "Записи с таким id не существует.\n";
      }
      else {
        $my_str = '';
        if ($passport_seria){
          if (!preg_match("/^\d{4}/", $passport_seria)){
            echo $error_message. 'Серия';
            exit;
          }
          else{
            $my_str .= "passport_seria = '$passport_seria' ,";
          }
        }
        if ($passport_number){
          if (!preg_match("/^\d{6}/", $passport_number)) {
            echo $error_message. 'Номер';
            exit;
          }
          else{
            $my_str .= "passport_number = '$passport_number', ";
          }
        }
        if ($passport_issued_by){
          $my_str .= "passport_issued_by = '$passport_issued_by', ";
        }
        if ($passport_when_issued){
          if (!preg_match("/^\d{4}-\d{2}-\d{2}/", $passport_when_issued)) {
            echo $error_message. 'Дата выдачи';
            exit;
          }
          else{
            $my_str .= "passport_when_issued = '$passport_when_issued', ";
          }
        }
        if ($account_number){
          if (!preg_match("/^\d+/", $account_number)) {
            echo $error_message. 'Номер лицевого счета';
            exit;
          }
          else{
            $my_str .= "account_number = '$account_number', ";
          }
        }
        if ($type_contribution){
          $my_str .= "type_contribution = '$type_contribution', ";
        }
        if ($deposit_amount){
          if (!preg_match("/^\d+/", $deposit_amount)) {
            echo $error_message. 'Текущая сумма вклада';
            exit;
          }
          else{
            $my_str .= "deposit_amount = '$deposit_amount', ";
          }
        }
        if ($last_operation_date){
          if (!preg_match("/^\d{4}-\d{2}-\d{2}/", $last_operation_date)) {
            echo $error_message. 'Дата последней операции';
            exit;
          }
          else{
            $my_str .= "last_operation_date = '$last_operation_date', ";
          }
        }

        $my_top_str = substr($my_str, 0, -2);
        $update_query = "update task9 set $my_top_str where id = '$id_note'";
        $res = pg_query($update_query) or die('Ошибка запроса: ' .pg_last_error());
        echo "<p>Запись изменена</p>";
      }
      ?>
      <p><a href="http://uliya.labs/lab9/mainpage.php">Назад</a></p>
    </body>
</html>
