<?php
  $login = $_POST['login'];
  if (isset($_COOKIE['login'])){
    $login = $_COOKIE['login'];
    echo "<h3>Здравствуйте, $login!</h3>";
    return;
  }
  else {
    setcookie('login', $login, time()+30);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Document</title>
  </head>
  <body>
    <form action="page1.php" method="post">
      <p>Логин:<input type="text" name="login"></p>
      <p>Пароль:<input type="password" name="pass"></p>
      <p><input type="submit" value="Войти"></p>
    </form>
  </body>
  <p><a href="http://uliya.labs/lab8/my_site.php">Назад</a></p>
  <p><a href="http://uliya.labs/">Главная страница</a></p>
</html>
