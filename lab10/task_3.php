<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Задание 3</title>
    </head>
    <body>
      <p>Три стоящие подряд копии того, что содержится в переменной $whatever.</p>
      <form action="task_3.php" method="post">
        <p>Переменная: <input type="text" name="whatever"></p>
        <p>Текст: <input type="text" name="text"></p>
        <p><input type="submit" /></p>
      </form>
      <?php
      $some_text = htmlspecialchars($_POST['text']);
      $whatever = htmlspecialchars($_POST['whatever']);
      if (preg_match_all("/($whatever){3}/mi", $some_text, $matches)){
        foreach ($matches[0] as $key => $value) {
          echo $key.' -> '.$value;
        }
      }
      ?>
      <p><a href="http://uliya.labs/lab10/task_4.php">Задание 4</a></p>
    </body>
</html>
