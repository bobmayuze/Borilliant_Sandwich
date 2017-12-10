<?php
    //Creates PDO connection to our database
    $db_name="gredients";
    $db_username="root";
    $db_password="";

    $conn = new PDO('mysql:host=localhost;dbname='.$db_name, $db_username, $db_password);
    if(!$conn){
        die("can't connect");
    }
?>
