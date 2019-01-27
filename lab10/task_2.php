<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Задание 2</title>
    </head>
    <body>
      <p>
        Любому числу обратных косых \, за которым следует любое число звездочек * </br>
        (любое число может быть и нулем).
      </p>
      <form action="task_2.php" method="post">
        <p>Текст: <input type="text" name="text"></p>
        <p><input type="submit" /></p>
      </form>
      <?php
      $some_text = $_POST['text'];
      if (preg_match_all("/\\\*\**/", $some_text, $matches)){
        foreach ($matches[0] as $key => $value) {
          echo $key.' -> '.$value;
        }
      }
      ?>
      <p><a href="http://uliya.labs/lab10/task_3.php">Задание 3</a></p>
    </body>
</html>
