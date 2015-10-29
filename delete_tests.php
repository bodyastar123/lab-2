<link rel="stylesheet" type="text/css" href="base.css">
<meta charset="UTF-8">
<?php
 //
include 'database.php';
 

//Якщо була натиснута силка на видалення, видаляємо запис 
if (isset($_GET['del'])) { 
    $del = intval($_GET['del']); 
    $query = "DELETE FROM tests WHERE (test_id='$del')"; 
    //Виконуємо запит. Якщо буде помилка - вивести її.
    mysql_query($query) or die(mysql_error()); 
}

//Заносимо в змінну $qwery всю базу даних 
$query = "SELECT * FROM tests";
//Виконуємо запит. Якщо буде помилка - вивести її.
$res = mysql_query($query) or die(mysql_error());
//Дізнаємося к-сть даних в таблиці 
$row = mysql_num_rows($res);


// Виводимо дані з таблиці 
echo '<table class="delete" border="1">';
    echo '<caption><b>ТЕСТИ</b></caption>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>НАЗВА ТЕСТУ</th>';
    echo '<th>ID ПРЕДМЕТУ</th>';
    echo '<th>КІЛЬКІСТЬ ПИТАНЬ</th>';
    echo '<th>ЧАС ТЕСТУВАННЯ</th>';
    echo '<th>АКТИВНИЙ</th>';
    echo '<th>ПРОХІДНИЙ %</th>';
	echo '<th>Тип теста %</th>';
    echo '<th>ID теста</th>';
	echo '<th>ВИДАЛЕННЯ</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    //Цикл виводу даних з бази
    while ($row = mysql_fetch_array($res)) {

        echo '<tr>';
        echo '<td>' . $row['test_name'] . '</td>';
        echo '<td>' . $row['subject_id'] . '</td>';
        echo '<td>' . $row['how_tasks'] . '</td>';
        echo '<td>' . $row['test_time'] . '</td>';
        echo '<td>' . $row['enabled'] . '</td>';
        echo '<td>' . $row['chances'] . '</td>';
		echo '<td>' . $row['test_type'] . '</td>';
	    echo '<td>' . $row['test_id'] . '</td>';


        //Генеруємо силку для видалення запису 
        echo "<td><a name=\"del\" href=\"delete_tests.php?del=".$row["test_id"]."\">Видалити</a></td>\n";
        echo "</tr>\n";
    }
echo ("</table>\n");
 
//Закриваємо з'єднання 
mysql_close();
 
//Виводимо кнопку повернення
echo ("<a href='delete_data.html'><button class='back'>НАЗАД</button></a>");
?>