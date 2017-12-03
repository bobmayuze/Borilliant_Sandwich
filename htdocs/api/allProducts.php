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



$outp = "";

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if (!$rs) {
        throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
    }
    $creater_id=$rs["creater_id"];
    $name = $conn->query("SELECT * FROM `tbl_user` WHERE id=$creater_id");
    while ($row = $name->fetch_assoc()) {
        if (!$name) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $creater_id= $row['username'];
    }


    $bread_id=$rs["bread_id"];
    $bread_url;
    $name = $conn->query("SELECT * FROM `tbl_ingredient_bread` WHERE id=$bread_id");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $bread_id= $row['name'];
        $bread_url=$row['pictureURL'];
    }
    $bread_qty=$rs["bread_qty"];


    $meat_name=$rs["meat_id"];
    $meat_url;
    $name = $conn->query("SELECT * FROM `tbl_ingredient_meat` WHERE id=$meat_name");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $meat_name= $row['name'];
        $meat_url=$row['pictureURL'];
    }
    $meat_qty=$rs["meat_qty"];


    $cheese_name=$rs["cheese_id"];
    $cheese_url;
    $name = $conn->query("SELECT * FROM `tbl_ingredient_cheese` WHERE id=$cheese_name");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $cheese_name= $row['name'];
        $cheese_url=$row['pictureURL'];
    }
    $cheese_qty=$rs["cheese_qty"];


    $vegetable_name=$rs["vegetable_id"];
    $vegetable_url;
    $name = $conn->query("SELECT * FROM `tbl_ingredient_vegetable` WHERE id=$vegetable_name");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $vegetable_name= $row['name'];
        $vegetable_url=$row['pictureURL'];
    }
    $vegetable_qty=$rs["vegetable_qty"];


    $sauce_name=$rs["sauce_id"];
    $sauce_url;
    $name = $conn->query("SELECT * FROM `tbl_ingredient_sauce` WHERE id=$sauce_name");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $sauce_name= $row['name'];
        $sauce_url=$row['pictureURL'];
    }
    $sauce_qty=$rs["sauce_qty"];



    if ($outp != "") {$outp .= ",";}
    $outp .= '{"combo":"'  . $rs["id"] . '",';
    $outp .= '"creater_name":"'   . $creater_id . '",';
    $outp .= '"bread_name":"'   . $bread_id . '",';
    $outp .= '"bread_qty":"'   . $bread_qty . '",';
    $outp .= '"bread_url":"'   . $bread_url . '",';
    $outp .= '"meat_name":"'   . $meat_name . '",';
    $outp .= '"meat_qty":"'   . $meat_qty . '",';
    $outp .= '"meat_url":"'   . $meat_url . '",';
    $outp .= '"cheese_id":"'   . $cheese_name . '",';
    $outp .= '"cheese_qty":"'   . $cheese_qty . '",';
    $outp .= '"cheese_url":"'   . $cheese_url . '",';
    $outp .= '"vegetable_id":"'   . $vegetable_name . '",';
    $outp .= '"vegetable_qty":"'   . $vegetable_qty . '",';
    $outp .= '"vegetable_url":"'   . $vegetable_url . '",';
    $outp .= '"sauce_id":"'   . $sauce_name . '",';
    $outp .= '"sauce_url":"'   . $sauce_url . '",';
    $outp .= '"sauce_qty":"'   . $sauce_qty . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);

?>