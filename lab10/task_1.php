<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Задание 1</title>
    </head>
    <body>
      <p>
        Минимум одному символу a, за которым следует любое число символов b.
      </p>
      <form action="task_1.php" method="post">
        <p>Текст: <input type="text" name="text"></p>
        <p><input type="submit" /></p>
      </form>
      <?php
      $some_text = $_POST['text'];
      if (preg_match_all("/a+b*/", $some_text, $matches)){
        foreach ($matches[0] as $key => $value) {
          echo $key.' -> '.$value;
        }
      }
      ?>
      <p><a href="http://uliya.labs/lab10/task_2.php">Задание 2</a></p>
    </body>
</html>
