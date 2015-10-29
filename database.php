<?php
$db = mysql_connect("localhost","root","qwerty123");
mysql_select_db("Info",$db);

//Встановлюємо кодування UTF-8
mysql_query("SET NAMES 'utf8';"); 
mysql_query("SET CHARACTER SET 'utf8';"); 
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';"); 

?>
