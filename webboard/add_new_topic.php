<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'connect.php';
    $topic = trim($_POST['topic']);
    $detail = trim($_POST['detail']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $created = date('Y-m-d H:i:s');

    $sql = "INSERT INTO questions (topic,detail,name,email,created) VALUES ";
    $sql .= "('{$topic}','{$detail}','{$name}','{$email}','{$created}')";
    $query = mysql_query($sql);
    if ($query == TRUE) {
        echo "Success!<BR>";
        echo "<a href='main_webboard.php'>Back to view your topic.</a>";
    }
    mysql_close();
}