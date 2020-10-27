<?php
/*
* connection database
*/
$Connect = mysql_connect('localhost', 'root', 'tom251139') or die('Error connecting to MySQL');
mysql_select_db('it_db', $Connect) or die('Database sysapp does not exist!');
mysql_query('SET NAMES UTF8');

?>
