<meta charset="UTF-8">
<?php
include ('database.php');

// передаємо змінній user_name значення глобального масиву POST
 $test_name = $_POST['test_name']; 
 $subject_id = $_POST['subject_id'];
 $how_tasks = $_POST['how_tasks']; 
 $test_time = $_POST['test_time'];
 $enabled = $_POST['enabled'];
 $chances = $_POST['chances'];
 $test_type = $_POST['test_type'];

 // добавляємо дані через INSERT
 $sql = 'INSERT INTO tests(test_name, subject_id, how_tasks, test_time, enabled, chances, test_type)
 VALUES("'.$test_name.'", "'.$subject_id.'", "'.$how_tasks.'", "'.$test_time.'", "'.$enabled.'", "'.$chances.'", "'.$test_type.'")';

// перевірка та поява повідомлень

 if(!mysql_query($sql))
 {echo '<center><p><b>Помилка при збереженні! Перевірте правильність вводу!</b></p></center>';}
 else
 {echo '<center><p style="color:green"><b>Дані успішно добавлені!</b></p></center>';}


echo '<center><p><b><a href="add_test.html"><button>Внести ще один тест</button></a></b></p></center>';
echo '<center><p><b><a href="add.html"><button>Занести дані в іншу таблицю</button></a></b></p></center>';
echo '<center><p><b><a href="index.html"><button>Повернутися на головну</button></a></b></p></center>';
?>
