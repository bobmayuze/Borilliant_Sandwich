<?php 
  header("Content-Type: text/html; charset=utf8");
  $email=$_POST['email'];//get user email
  $password=md5($_POST['password']);//get user password

  include('connect.php');//connect to db

  $result = $conn->prepare('INSERT INTO `gredients`.`tbl_user` (id, username, password) VALUES (null, :email , :password)');
  $result->execute(array(':email' => $email, ':password' => $password));
  
  if (!$result){
      die('Error');
  }else{
    echo "Success";
    echo $email;
    echo $password;
    echo "
      <script>
        setTimeout(function(){window.location.href='logIn.html';},1000);
      </script>
    ";
  }

?>