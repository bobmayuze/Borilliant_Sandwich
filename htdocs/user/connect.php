<?php
    $server="localhost";
    $db_username="root";
    $db_password="";

    $con = mysql_connect($server,$db_username,$db_password);
    if(!$con){
        die("can't connect".mysql_error());
    }
    
    mysql_select_db('gredients',$con); // Choose database
?>