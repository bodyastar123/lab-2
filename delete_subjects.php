<link rel="stylesheet" type="text/css" href="base.css">
<meta charset="UTF-8">
<?php
 //
include 'database.php';
 

//Якщо була натиснута силка на видалення, видаляємо запис 
if (isset($_GET['del'])) { 
    $del = intval($_GET['del']); 
    $query = "DELETE FROM subjects WHERE (subject_id='$del')"; 
    //Виконуємо запит. Якщо буде помилка - вивести її.
    mysql_query($query) or die(mysql_error()); 
}

//Заносимо в змінну $qwery всю базу даних 
$query = "SELECT * FROM subjects";
//Виконуємо запит. Якщо буде помилка - вивести її.
$res = mysql_query($query) or die(mysql_error());
//Дізнаємося к-сть даних в таблиці 
$row = mysql_num_rows($res);


// Виводимо дані з таблиці 
echo '<table class="subject" border="1">';
    echo '<caption><b>ПРЕДМЕТИ</b></caption>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>НАЗВА ПРЕДМЕТУ</th>';
    echo '<th>ID ПРЕДМЕТУ</th>';
    echo '<th>ВИДАЛЕННЯ</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    //Цикл виводу даних з бази
    while ($row = mysql_fetch_array($res)) {

        echo '<tr>';
        echo '<td>' . $row['subject_name'] . '</td>';
        echo '<td>' . $row['subject_id'] . '</td>';


        //Генеруємо силку для видалення запису 
        echo "<td><a name=\"del\" href=\"delete_subjects.php?del=".$row["subject_id"]."\">Видалити</a></td>\n";
        echo "</tr>\n";
    }
echo ("</table>\n");
 
//Закриваємо з'єднання 
mysql_close();
 
//Виводимо кнопку повернення
echo ("<a href='delete_data.html'><button class='back'>НАЗАД</button></a>");
?>