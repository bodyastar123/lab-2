<link rel="stylesheet" type="text/css" href="base.css">
<meta charset="UTF-8">
<?php
 //
include 'database.php';
 

//Якщо була натиснута силка на видалення, видаляємо запис 
if (isset($_GET['del'])) { 
    $del = intval($_GET['del']); 
    $query = "DELETE FROM answers WHERE (ans_id='$del')"; 
    //Виконуємо запит. Якщо буде помилка - вивести її.
    mysql_query($query) or die(mysql_error()); 
}

//Заносимо в змінну $qwery всю базу даних 
$query = "SELECT * FROM answers";
//Виконуємо запит. Якщо буде помилка - вивести її.
$res = mysql_query($query) or die(mysql_error());
//Дізнаємося к-сть даних в таблиці 
$row = mysql_num_rows($res);


// Виводимо дані з таблиці 
  echo '<table class="subject" border="1">';
  echo '<caption><b>ВІДПОВІДІ</b></caption>';
  echo '<thead>';
  echo '<tr>';
  echo '<th>ID ЗАПИТАННЯ</th>';
  echo '<th>ПРАВИЛЬНА ВІДПОВІДЬ</th>';
  echo '<th>ВІДПОВІДЬ ЗМІ</th>';
  echo '<th>МЕДІА-ФАЙЛ</th>';
  echo '<th>ВІДПОВІДЬ</th>';
  echo '<th>ID ВІДПОВІДІ</th>';
  echo '<th>ВИДАЛЕННЯ</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

    //Цикл виводу даних з бази
    while ($row = mysql_fetch_array($res)) {

    echo '<tr>';
    echo '<td>' . $row['question_id'] . '</td>';
    echo '<td>' . $row['ans_true'] . '</td>';
    echo '<td>' . $row['ans_media'] . '</td>';
    echo '<td>' . $row['media_file'] . '</td>';
    echo '<td>' . $row['ans_text'] . '</td>';
    echo '<td><b>' . $row['ans_id'] . '</b></td>';


        //Генеруємо силку для видалення запису 
        echo "<td><a name=\"del\" href=\"delete_answers.php?del=".$row["ans_id"]."\">Видалити</a></td>\n";
        echo "</tr>\n";
    }
echo ("</table>\n");
 
//Закриваємо з'єднання 
mysql_close();
 
//Виводимо кнопку повернення
echo ("<a href='delete_data.html'><button class='back'>НАЗАД</button></a>");
?>