<?PHP
  // Delete the cookie
  setcookie('usermail', 'xxx', time()-7000000, '/');
  echo "Successfully logged out, redirecting....";
  echo "
    <script>
      setTimeout(function(){window.location.href='logIn.html';},3000);
    </script>
  ";
?>