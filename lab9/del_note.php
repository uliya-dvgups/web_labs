<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>WEB Lab9</title>
  </head>

  <body>
    <h3>Удалить существующую запись</h3>
    <form action="del_note.php" method="post">
    <p>
      <label>Введите id записи, которую необходимо удалить: </label><input name='id_note' type="text" maxlength="4" required size="3">
    </p>
      <p><input type="submit" value="Удалить">
    </form>
    <?php
    $id_note = $_POST['id_note'];

    if($id_note){
      $dbconn = pg_connect("host=localhost dbname=lab9 user=postgres password=G77q22vk44") or die('Не удалось подключиться: ' .pg_last_error());
      $select_query = "select * from task9 where id = $id_note";
      $result = pg_query($select_query) or die('Ошибка запроса: ' .pg_last_error());
      $row = pg_fetch_array($result, null, PGSQL_ASSOC);

      if (!$row){
        echo "Записи с таким id не существует.\n";
      }
      else {
        $delete_query = "delete from task9 where id = $id_note";
        $res = pg_query($delete_query) or die('Ошибка запроса: ' .pg_last_error());
        echo "<p>Запись удалена</p>";
      }
      pg_free_result($result);
      pg_close($dbconn);
    }
     ?>
    <p><a href="http://uliya.labs/lab9/mainpage.php">Назад</a></p>
  </body>
</html>
