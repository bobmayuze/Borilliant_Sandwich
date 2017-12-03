<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gredients";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("select * from tbl_combos order by id desc limit 3;");

if (!$result) {
    throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
}



$outp_cal = "";

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if (!$rs) {
        throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
    }



    $bread_calories=$rs["bread_id"];
    $name = $conn->query("SELECT * FROM `tbl_ingredient_bread` WHERE id=$bread_calories");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $bread_calories= $row['calories'];
    }
    $bread_qty=$rs["bread_qty"];
    $bread_calories*=$bread_qty;

    $meat_calories=$rs["meat_id"];
    $name = $conn->query("SELECT * FROM `tbl_ingredient_meat` WHERE id=$meat_calories");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $meat_calories= $row['calories'];
    }
    $meat_qty=$rs["bread_qty"];
    $meat_calories*=$meat_qty;

    $vege_calories=$rs["vegetable_id"];
    $name = $conn->query("SELECT * FROM `tbl_ingredient_vegetable` WHERE id=$vege_calories");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $vege_calories= $row['calories'];
    }
    $vege_qty=$rs["vegetable_qty"];
    $vege_calories*=$vege_qty;

    $sauce_calories=$rs["sauce_id"];
    $name = $conn->query("SELECT * FROM `tbl_ingredient_sauce` WHERE id=$sauce_calories");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $sauce_calories= $row['calories'];
    }
    $sauce_qty=$rs["sauce_qty"];
    $sauce_calories*=$sauce_qty;

    $cheese_calories=$rs["cheese_id"];
    $name = $conn->query("SELECT * FROM `tbl_ingredient_cheese` WHERE id=$cheese_calories");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $cheese_calories= $row['calories'];
    }
    $cheese_qty=$rs["cheese_qty"];
    $cheese_calories*=$cheese_qty;


    $total_calories=$bread_calories+$cheese_calories+$vege_calories+$sauce_calories+$meat_calories;


    if ($outp_cal != "") {$outp_cal .= ",";}
    $outp_cal .= '{"combo":"'  . $rs["id"] . '",';
    $outp_cal .= '"Total_Calories":"'   . $total_calories . '"}';
}


$outp_cal ='{"records_cal":['.$outp_cal.']}';

$conn->close();
?>