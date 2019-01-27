<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Document</title>
  </head>
  <body>
    <form action="my_form.php" method="post">
      <p>Ваш отзыв о наших услугах</p>
      <p>Ваше имя:<input type="text" name="name"></p>
      <p>Ваш возраст:<input type="text" name="age"></p>
      <p>Ваш пол: Мужской<input type="radio" value="man" name="gender">
                  Женский<input type="radio" value="woman" name="gender"></p>
      <p>Ваши интересы:
        <input type="checkbox" value="pc" name="interest[]">Компьютеры
        <input type="checkbox" value="sport" name="interest[]">Спорт
        <input type="checkbox" value="art" name="interest[]">Искусство
        <input type="checkbox" value="sci" name="interest[]">Наука</p>
      <p>Ваше мнение:</p>
      <p><textarea name="opinion" cols="30" rows="10"></textarea></p>
      <p><input type="submit" value="Отправить">
        <input type="reset" value="Очистить форму"></p>
    </form>
    <form enctype="multipart/form-data" action="upload_img.php" method="post">
      <details>
        <summary>Загрузить изображение на сервер</summary>
        <input type="file" name="image" value="30000" />
        <input type="submit" value="Загрузить" />
      </details>
    </form>
  </body>
  <?php
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $interest = $_POST['interest'];
  $opinion = $_POST['opinion'];
  if ($name && $age && $gender && !empty($interest) && $opinion){
    echo "Name: ".$name."</br>";
    echo "Age: ".$age."</br>";
    echo "Gender: ".$gender."</br>";
    $N = count($interest);
    echo "Interest: ";
    for($i=0; $i < $N; $i++)
      {
        echo($interest[$i]." ");
      }
    echo "</br>";
    echo "Opinion: ".$opinion."</br>";

    $to = 'luka99877@gmail.com';
    $subject = "Form data";
    $message = $name . $age . $gender . $interest . $opinion;
    mail($to, $subject, $message);
    echo "<h3>Данные успешно отправлены на почту!</h3>";
  }
  ?>
  <p><a href="http://uliya.labs/lab8/mainpage.php">Назад</a></p>
  <p><a href="http://uliya.labs/mainpage.php">Главная страница</a></p>
</html>
