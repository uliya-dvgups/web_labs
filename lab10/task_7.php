<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Задание 7</title>
    </head>
    <body>
      <form action="task_7.php" method="post">
        <h2>Введите свои данные о вкладе:</h2>
          <fieldset>
            <legend>Паспортные данные</legend>
            <p><em>Серия:</em><input type="text" name="passport_seria" size="6" maxlength="4" placeholder="Введите серию паспорта" required>
            <em>Номер:</em><input type="text" name="passport_number" size="8" maxlength="6" placeholder="Введите номер паспорта" required>
            <em>Когда выдан:</em><input type="date" name="passport_when_issued" required size="20" placeholder="Выберите дату">
            </p>
            <p><em>Кем выдан:</em><input type="text" name="passport_issued_by" size="50" placeholder="Введите данные" required></p>
          </fieldset>
        <br />
          <fieldset>
            <legend>Данные о вкладе</legend>
            <p><em>Номер лицевого счета:</em><input type="text" name="account_number" size="20" maxlength="20" placeholder="Введите номер лицевого счета" required></p>
            <p><em>Категория вклада:</em>
            <input list="vclad" size="15" placeholder="Выберите категорию вклада" required>
            <datalist id="vclad">
            <option>До востребования</option>
            <option>Сберегательный</option>
            <option>Накопительный</option>
            <option>Расчетный</option>
            <option>Для физических лиц</option>
            <option>Для юридических лиц</option>
            </p>
            <p><em>Текущая сумма вклада:</em>
            <input type="text" name="deposit_amount" required size="15" placeholder="Введите текущую сумму вклада"></p>
            <p><em>Дата последней операции:</em>
            <input type="date" name="last_operation_date" required size="17" placeholder="Выберите дату"></p>
          </fieldset>
        <p><input type="submit"></p>
      </form>
      <?php
      $passport_seria = $_POST['passport_seria'];
      $passport_number = $_POST['passport_number'];
      $passport_when_issued = $_POST['passport_when_issued'];

      $account_number = $_POST['account_number'];
      $deposit_amount = $_POST['deposit_amount'];
      $last_operation_date = $_POST['last_operation_date'];
      if (preg_match_all("/\d{4}/mi", $passport_seria, $matches) &&
          preg_match_all("/\d{6}/mi", $passport_number, $matches) &&
          preg_match_all("/\d{4}-\d{1,2}-\d{1,2}/mi", $passport_when_issued, $matches) &&
          preg_match_all("/\d{20}/mi", $account_number, $matches) &&
          preg_match_all("/\d{2,20}/mi", $deposit_amount, $matches) &&
          preg_match_all("/\d{4}-\d{1,2}-\d{1,2}/mi", $last_operation_date, $matches)) {
    echo "Yes";
      }
      else {
        echo "No";
      }
      ?>
      <p><a href="http://uliya.labs/lab10/task_8.php">Задание 8</a></p>
    </body>
</html>
