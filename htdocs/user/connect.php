<?php
    $db_name="gredients";
    $db_username="root";
    $db_password="li988168";

    $conn = new PDO('mysql:host=localhost;dbname='.$db_name, $db_username, $db_password);
    if(!$conn){
        die("can't connect");
    }
?>