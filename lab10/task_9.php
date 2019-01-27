<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Задание 9</title>
    </head>
    <body>
      <p>Напишите программу, проверяющую IP-адрес на корректность</p>
      <form action="task_9.php" method="post">
        <p>Текст: <input type="text" name="text"></p>
        <p><input type="submit" /></p>
      </form>
      <?php
      $some_text = htmlspecialchars($_POST['text']);
      if (preg_match_all("/(?:(?:\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.){3}(?:\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])/mi", $some_text, $matches)){
        foreach ($matches[0] as $key => $value) {
          echo $key.' -> '.$value;
        }
      }
      ?>
      <p><a href="http://uliya.labs/lab10/mainpage.php">Главная страница задания</a></p>
    </body>
</html>
