<?php
  session_start();
  if (isset($_SESSION['check_point'])) {
    echo "И снова здравствуйте!";
  }
  else {
    echo "Эту страницу вы еще не посещали";
    $_SESSION['check_point'] = TRUE;
  }

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