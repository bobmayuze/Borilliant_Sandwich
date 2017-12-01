<?php 
  header("Content-Type: text/html; charset=utf8");
  $email=$_POST['email'];//get user email
  $password=$_POST['password'];//get user password

  include('connect.php');//connect to db

  $q="insert into tbl_user(id,username,password) values (null,'$email','$password')";
  $reslut=mysql_query($q,$con);
  
  if (!$reslut){
      die('Error: ' . mysql_error());
  }else{
    echo "Success";
    echo "
      <script>
        setTimeout(function(){window.location.href='logIn.html';},1000);
      </script>
    ";
  }

  mysql_close($con);

?>