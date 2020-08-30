
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
        
      $sql = "INSERT INTO answer VALUES(?,?,?,?,?)";
      
      $stmt = $pdo->prepare($sql);
        
      $form = $_POST;
      $code = $form['code'];
      $year = $form['year'];
      $question = $form['question'];
      $answer = $form['answer'];
      $username = $form['username'];

      $result = $stmt->execute([$code, $year, $question, $answer, $username]);
    ?>
