<link rel="stylesheet" type="text/css" href="base.css">
<?php 
	// підключаємо нашу базу даних
	include 'database.php';
  

//--USERS---------------------------------------------------------------

    // вибираємо всі значання з таблиці "users"
    $qr_result = mysql_query("SELECT * FROM subjects;" 
							  . $db_table_to_show) or die(mysql_error());

    // виводимо заголовки HTML-таблиці
  echo '<table class="subject" border="1">';
  echo '<caption><b>ПРЕДМЕТИ</b></caption>';
  echo '<thead>';
  echo '<tr>';
  echo '<th>ІМ`Я ПРЕДМЕТА</th>';
  echo '<th>ІD ПРЕДМЕТА</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  echo '<a href="index.html"><button class="back">НАЗАД</button></a>';
  
   // виводимо в HTML-таблицю всі дані користувачів з таблиці MySQL 
  while($data = mysql_fetch_array($qr_result)){ 
    echo '<tr>';
    echo '<td>' . $data['subject_name'] . '</td>';
    echo '<td>' . $data['subject_id'] . '</td>';
    echo '</tr>';
  }
  
    echo '</tbody>';
  echo '</table>';



//--TESTS---------------------------------------------------------------

    // вибираємо всі значання з таблиці "tests"
    $qr_result = mysql_query("SELECT * FROM tests;" 
							  . $db_table_to_show) or die(mysql_error());

    // виводимо заголовки HTML-таблиці

  echo '<table class="tests" border="1">';
  echo '<caption><b>ТЕСТИ</b></caption>';
  echo '<thead>';
  echo '<tr>';
  echo '<th>НАЗВА ТЕСТУ</th>';
  echo '<th>ID ПРЕДМЕТУ</th>';
  echo '<th>К-СТЬ ПИТАНЬ</th>';
  echo '<th>ЧАС ТЕСТУВАННЯ</th>';
  echo '<th>ВКЛЮЧЕНИЙ?</th>';
  echo '<th>ПРОХІДНИЙ %</th>';
  echo '<th>Тип теста %</th>';
  echo '<th>ID теста</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
   // виводимо в HTML-таблицю всі дані користувачів з таблиці MySQL 
  while($data = mysql_fetch_array($qr_result)){ 
    echo '<tr>';
    echo '<td>' . $data['test_name'] . '</td>';
    echo '<td>' . $data['subject_id'] . '</td>';
    echo '<td>' . $data['how_tasks'] . '</td>';
    echo '<td>' . $data['test_time'] . '</td>';
    echo '<td>' . $data['enabled'] . '</td>';
    echo '<td>' . $data['chances'] . '</td>';
	echo '<td>' . $data['test_type'] . '</td>';
	echo '<td>' . $data['test_id'] . '</td>';
      
    echo '</tr>';
  }
    echo '</tbody>';
    echo '</table>';

  
//--GROUPS---------------------------------------------------------------

    // вибираємо всі значання з таблиці "groups"
    $qr_result = mysql_query("SELECT * FROM questions;" 
							  . $db_table_to_show) or die(mysql_error());

    // виводимо заголовки HTML-таблиці

  echo '<table class="questions" border="1">';
  echo '<caption><b>ЗАПИТАННЯ</b></caption>';
  echo '<thead>';
  echo '<tr>';
  echo '<th>ID ЗАПИТАННЯ</th>';
  echo '<th>ID ТЕСТА</th>';
  echo '<th>ЗАПИТАННЯ</th>';
  echo '<th>РІВЕНЬ ЗАПИТАННЯ</th>';
  echo '<th>ЗАПИТАННЯ ЗМІ</th>';
  echo '<th>МЕДІА-ФАЙЛ</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
   // виводимо в HTML-таблицю всі дані користувачів з таблиці MySQL 
  while($data = mysql_fetch_array($qr_result)){ 
    echo '<tr>';
    echo '<td>' . $data['question_id'] . '</td>';
    echo '<td>' . $data['test_id'] . '</td>';
	echo '<td>' . $data['q_text'] . '</td>';
	echo '<td>' . $data['q_level'] . '</td>';
	echo '<td>' . $data['q_media'] . '</td>';
	echo '<td>' . $data['media_file'] . '</td>';

    echo '</tr>';
  }
  
  echo '</tbody>';
  echo '</table>';
  
  

//--SESSION_RESULT---------------------------------------------------------------

    // вибираємо всі значання з таблиці "sesresults"
    $qr_result = mysql_query("SELECT * FROM answers;" 
							  . $db_table_to_show) or die(mysql_error());

    // виводимо заголовки HTML-таблиці

  echo '<table class="answers" border="1">';
  echo '<caption><b>ВІДПОВІДІ</b></caption>';
  echo '<thead>';
  echo '<tr>';
  echo '<th>ID ЗАПИТАННЯ</th>';
  echo '<th>ПРАВИЛЬНА ВІДПОВІДЬ</th>';
  echo '<th>ВІДПОВІДЬ ЗМІ</th>';
  echo '<th>МЕДІА-ФАЙЛ</th>';
  echo '<th>ВІДПОВІДЬ</th>';
  echo '<th>ID ВІДПОВІДІ</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
   // виводимо в HTML-таблицю всі дані користувачів з таблиці MySQL 
  while($data = mysql_fetch_array($qr_result)){ 
    echo '<tr>';
    echo '<td>' . $data['question_id'] . '</td>';
    echo '<td>' . $data['ans_true'] . '</td>';
    echo '<td>' . $data['ans_media'] . '</td>';
    echo '<td>' . $data['media_file'] . '</td>';
    echo '<td>' . $data['ans_text'] . '</td>';
    echo '<td><b>' . $data['ans_id'] . '</b></td>';


    echo '</tr>';
  }
  
  echo '</tbody>';
  echo '</table>';






    // закриваємо з'єднання с сервером бази даних
    mysql_close($connect_to_db);
?>

