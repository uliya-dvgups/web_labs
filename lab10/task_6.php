<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Задание 6</title>
    </head>
    <body>
      <p>
        Выражение для поиска HTML-цвета, заданного как #ABCDEF, т.е. # и содержит </br>
        затем 6 шестнадцатеричных символов.
      </p>
      <form action="task_6.php" method="post">
        <p>Текст: <input type="text" name="text"></p>
        <p><input type="submit" /></p>
      </form>
      <?php
      $some_text = htmlspecialchars($_POST['text']);
      if (preg_match_all("/^#[0-9A-F]{6}\b/mi", $some_text, $matches)){
        foreach ($matches[0] as $key => $value) {
          echo $key.' -> '.$value;
        }
      }
      ?>
      <p><a href="http://uliya.labs/lab10/task_7.php">Задание 7</a></p>
    </body>
</html>
