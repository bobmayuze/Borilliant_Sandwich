<?PHP
    header("Content-Type: text/html; charset=utf8");

    include('connect.php');//Conncet to the database

    // print_r($_POST);

    $email = $_POST['email'];//get user email
    $password = md5($_POST['password']);//get user password
    
    if ($email && $password){//if both email and password are not null
      echo "Querying......";
      $result = $conn->prepare('SELECT * FROM `gredients`.`tbl_user` WHERE username = :email and password = :password');
      $result->execute(array(':email' => $email, ':password' => $password));
      //$sql = "select * from tbl_user where username = '$email' and password='$password'";
      //$result = mysql_query($sql);
      $rows=$result->fetch();
      if($rows){//0 false 1 true
          $cookie_name = "usermail";
          $cookie_value = (string)$email;
          setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day                
          header("Location: ../dev/main.html");//if success, jump tp index.html
          exit;
      }else{
        //print_r($result->fetch());
        echo "Wrong email or password";
        echo "
            <script>
              setTimeout(function(){window.location.href='logIn.html';},1000);
            </script>
        ";
      }
             

    }else{//if email or user password is null
      echo "Form not valid";
      echo "
        <script>
              setTimeout(function(){window.location.href='logIn.html';},1000);
        </script>
      ";
    }

    //mysql_close();//close connection
?>