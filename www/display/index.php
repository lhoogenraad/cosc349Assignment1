<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <link rel='icon' type='image/x-icon' href='/favicon.ico' />
  <title>Past Otago exam answers</title>
<style>
th { text-align: left; }

table, th, td {
border: 2px solid grey;
border-collapse: collapse;
}

th, td {
padding: 0.2em;
}
</style>
</head>

<body>

<h1>Past Exam Answers</h1>

<table border="1">
<tr><th>Paper Code</th><th>Exam Year</th><th>Exam Question</th><th>Answer</th><th>University Username (optional)</th></tr>
<?php

$db_host = '192.168.2.12';
$db_name = 'examanswers';
$db_user = 'webuser';
$db_passwd = 'db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM answers");

while($row = $q->fetch()){
  echo "<tr><td>".$row["code"]."</td><td>".$row["year"]."</td><td>".$row.["question"]."</td><td>".$row["answer"]."</td><td>".$row["username"]."</td></tr>\n";
}
?>
</table>

</body>
</html>
