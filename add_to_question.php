<meta charset="UTF-8">
<?php
include ('database.php');

// передаємо змінній user_name значення глобального масиву POST
 $test_id = $_POST['test_id']; 
 $q_test = $_POST['q_test']; 
 $q_level = $_POST['q_level']; 
 $q_media = $_POST['q_media']; 
 $media_file = $_POST['media_file']; 

 // добавляємо дані через INSERT
 $sql = 'INSERT INTO questions(test_id, q_test, q_level, q_media, media_file)
 VALUES("'.$test_id.'", "'.$q_test.'", "'.$q_level.'", "'.$q_media.'", "'.$media_file.'")';

// перевірка та поява повідомлень

 if(!mysql_query($sql))
 {echo '<center><p><b>Помилка при збереженні! Перевірте правильність вводу!</b></p></center>';}
 else
 {echo '<center><p style="color:green"><b>Дані успішно добавлені!</b></p></center>';}


echo '<center><p><b><a href="add_question.html"><button>Внести ще одне запитання</button></a></b></p></center>';
echo '<center><p><b><a href="add.html"><button>Занести дані в іншу таблицю</button></a></b></p></center>';
echo '<center><p><b><a href="index.html"><button>Повернутися на головну</button></a></b></p></center>';
?>
