<?php
  $count_update_page = (isset($_COOKIE['login'])) ? $_COOKIE['count_update_page'] : 0;
  $count_update_page++;
  $login = $_COOKIE['login'];
  setcookie('count_update_page', $count_update_page, time()+30);
  echo "$login обновил страницу $count_update_page раз";

  echo "<p><a href='http://uliya.labs/lab8/my_site.php'>Назад</a></p>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
</body>
</html>
