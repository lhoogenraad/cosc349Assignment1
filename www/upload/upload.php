  <!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
 <html>
    <head>
      <link rel='icon' type='image/x-icon' href='/favicon.ico' />
      <link rel='stylesheet' href='upload.css'>
      <title>Upload an Answer</title>
    </head>

    <body>
    <h1>Upload an Answer</h1>
      <form action="upload.php" method="post">
        <input type="text" name="code" id="code" placeholder="Paper code" required>
        <input type="text" name="year" id="year" placeholder="Exam year" required>
        <input type="text" name="question" id="question" placeholder="Question" required>
        <input type="text" name="answer" id="answer" placeholder="Your answer" required>
        <input type="text" name="username" id="username" placeholder="Username (optional)">
        <button type="submit" id="submit" value="Submit">Submit</button>
      </form>
      <a href="http://127.0.0.1:8080/index.php">Back to Home</a>
      
    <?php
      $db_host = '192.168.2.12';
      $db_name = 'examanswers';
      $db_user = 'webuser';
      $db_passwd = 'db_pw';

      $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

      $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
      
      /*
        This code uses prepared statements to prevent against sql injections
      */
        
      $sql = "INSERT INTO answer VALUES(:code, :year, :question, :answer, :username)";
      
      $stmt = $pdo->prepare($sql);
      
      $stmt->bindParam(":code", $code);
      $stmt->bindParam(":year", $year);
      $stmt->bindParam(":question", $question);
      $stmt->bindParam(":answer", $answer);
      $stmt->bindParam(":username", $username);
        
      $form = $_POST;
      $code = $form['code'];
      $year = $form['year'];
      $question = $form['question'];
      $answer = $form['answer'];
      $username = $form['username'];
        
      $result = $stmt->execute();
    ?>
   </body>
</html>



