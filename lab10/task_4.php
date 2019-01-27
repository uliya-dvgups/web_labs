<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Задание 4</title>
    </head>
    <body>
      <p>Любые пять символов, включая символ новой строки</p>
      <form action="task_4.php" method="post">
        <p>Текст: <input type="text" name="text"></p>
        <p><input type="submit" /></p>
      </form>
      <?php
      $some_text = htmlspecialchars($_POST['text']);
      if (preg_match_all("/.{5}/", $some_text, $matches)){
        foreach ($matches[0] as $key => $value) {
          echo $key.' -> '.$value;
        }
      }
      else {
        echo "no";
      }
      ?>
      <p><a href="http://uliya.labs/lab10/task_5.php">Задание 5</a></p>
    </body>
</html>
