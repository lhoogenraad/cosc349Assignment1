  <!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
 <html>
    <head>
      <link rel='icon' type='image/x-icon' href='/favicon.ico' />
      <link rel='stylesheet' href='upload.css'>
      <title>Upload an Answer</title>
    </head>

    <body>
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
    
    Even though any sql injection couldn't reveal any sensitive data since
    anything entered is publicly available, I'd still feel remiss if I didn't
    use a prepared statement for an sql operation.
  */
  $sqlcode = "INSERT INTO answers VALUES(?,?,?,?,?)";
  
  $stmt = mysqli_prepare($sql);
  
  $stmt->bind_param("sssss", $code, $year, $question, $answer, $username);
  
  $stmt->execute();
  
  //This line of code redirects the user to the homepage
  //header("Location: http://127.0.0.1:8080/index.php");
  //die();
?>
    <h1>Upload an Answer</h1>
      <form method="post">
        <input type="text" name="code" id="code" placeholder="Paper code" required>
        <input type="text" name="year" id="year" placeholder="Exam year" required>
        <input type="text" name="question" id="question" placeholder="Question" required>
        <input type="text" name="answer" id="answer" placeholder="Your answer" required>
        <input type="text" name="username" id="username" placeholder="Username (optional)">
        <button type="submit" id="submit" value="Submit">
      </form>
      <a href="http://127.0.0.1:8080/index.php">Back to Home</a>
      
   </body>
</html>



