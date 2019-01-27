<?php
  session_start();
  $now = new DateTime();
  if (isset($_SESSION['last_date'])) {
    $interval = $_SESSION['last_date']->diff($now);
    $diff_min = $interval->i;
    echo "Вас не было $diff_min минут";
    $_SESSION['last_date'] = $now;
  }
  else {
    $_SESSION['last_date'] = $now;
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