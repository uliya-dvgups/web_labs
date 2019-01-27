<?php
function can_upload($file){
    if($file['name'] == '') return 'Вы не выбрали файл.';
    if($file['size'] == 0) return 'Файл слишком большой.';
    $getMime = explode('.', $file['name']);
    $mime = strtolower(end($getMime));
    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
    if(!in_array($mime, $types)) return 'Недопустимый тип файла.';

    return true;
}

function make_upload($file){
  $name = mt_rand(0, 10000) . $file['name'];
  $new_path = 'img/' . $name;
  copy($file['tmp_name'], $new_path);

  return $new_path;
}

$my_image = $_FILES['image'];

if(isset($my_image)){
  $check = can_upload($my_image);

  if($check){
    $path = make_upload($my_image);
    echo "<h3>Файл загружен! </h3></br>";
    echo "<img src='$path' alt='Какие-то неполадки' width=300px height=300px>";
  }
  else{
    echo "Неудачная загрузка. $check";
  }
  echo "<p><a href='http://uliya.labs/lab8/my_form.php'>Назад</a></p>";
  echo "<p><a href='http://uliya.labs/lab8/mainpage.php'>На главную</a></p>";
}
?>
