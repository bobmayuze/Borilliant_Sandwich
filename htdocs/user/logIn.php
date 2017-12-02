<?PHP
    header("Content-Type: text/html; charset=utf8");

    include('connect.php');//Conncet to the database

    // print_r($_POST);

    $email = $_POST['email'];//get user email
    $password = md5($_POST['password']);//get user password
    
    if ($email && $password){//if both email and password are not null
      echo "Querying......";
      $sql = "select * from tbl_user where username = '$email' and password='$password'";
      $result = mysql_query($sql);
      $rows=mysql_num_rows($result);
      if($rows){//0 false 1 true
          $cookie_name = "usermail";
          $cookie_value = (string)$email;
          setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day                
          header("refresh:0;url=/dev/main.html");//if success, jump tp index.html
          exit;
      }else{
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

    mysql_close();//close connection
?>