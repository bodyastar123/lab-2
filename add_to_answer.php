<meta charset="UTF-8">
<?php
include ('database.php');

// передаємо змінній user_name значення глобального масиву POST
 $question_id = $_POST['question_id']; 
 $ans_true = $_POST['ans_true'];
 $ans_media = $_POST['ans_media'];
 $media_file = $_POST['media_file'];
 $ans_text = $_POST['ans_text'];

 // добавляємо дані через INSERT
 $sql = 'INSERT INTO answers(question_id, ans_true, ans_media, media_file, ans_text)
 VALUES("'.$question_id.'", "'.$ans_true.'", "'.$ans_media.'", "'.$media_file.'", "'.$ans_text.'")';

// перевірка та поява повідомлень

 if(!mysql_query($sql))
 {echo '<center><p><b>Помилка при збереженні! Перевірте правильність вводу!</b></p></center>';}
 else
 {echo '<center><p style="color:green"><b>Дані успішно добавлені!</b></p></center>';}


echo '<center><p><b><a href="add_answer.html"><button>Внести ще одну відповідь</button></a></b></p></center>';
echo '<center><p><b><a href="add.html"><button>Занести дані в іншу таблицю</button></a></b></p></center>';
echo '<center><p><b><a href="index.html"><button>Повернутися на головну</button></a></b></p></center>';
?>
