<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Задание 8</title>
    </head>
    <body>
      <p>
        Напишите программу, которая посчитает количество смайликов в заданном тексте. </br>
Смайликом будем считать последовательность символов, удовлетворяющую условиям: </br>
* первым символом является либо ; (точка с запятой) либо : (двоеточие) ровно один раз</br>
* далее может идти символ – (минус) сколько угодно раз (в том числе символ минус может идти ноль раз)</br>
* в конце обязательно идет некоторое количество (не меньше одной) одинаковых скобок из следующего набора: (, ), [, ].</br>
* внутри смайлика не может встречаться никаких других символов.</br>
      </p>
      <form action="task_8.php" method="post">
        <p>Текст: <input type="text" name="text"></p>
        <p><input type="submit" /></p>
      </form>
      <?php
      $some_text = htmlspecialchars($_POST['text']);
      if (preg_match_all("/([:;]-*(\)|\(|\]|\[)\2*)/mi", $some_text, $matches)){
        foreach ($matches[0] as $key => $value) {
          echo $key.' -> '.$value;
        }
      }
      ?>
      <p><a href="http://uliya.labs/lab10/task_9.php">Задание 9</a></p>
    </body>
</html>
