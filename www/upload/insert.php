<?php
  $db_host = '192.168.2.12';
  $db_name = 'examanswers';
  $db_user = 'webuser';
  $db_passwd = 'db_pw';

  $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

  $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
  
  // Getting our values from the input fields
  $code = $_GET['code'];
  $year = $_GET['year'];
  $question = $_GET['question'];
  $answer = $_GET['answer'];
  $username = $_GET['username'];
  
  /*
    The following code is in the interest of preventing any sql injections.
    We write out our sql insert code in $sqlcode with placeholders as ?'s.
    Then we bind our params to the prepared statement and execute it.
  */
  $sqlcode = "INSERT INTO answers VALUES(?,?,?,?,?)";
  
  $stmt = mysqli_prepare($sql);
  
  $stmt->bind_param("sssss", $code, $year, $question, $answer, $username);
  
  $stmt->execute();
?>
