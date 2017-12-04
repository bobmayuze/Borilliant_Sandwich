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
$usermail;
//check if the user loged in
if (isset($_COOKIE['usermail'])) {
    $usermail = $_COOKIE['usermail'];
}
//get user mail
$creater_id;


//get user id
$result = $conn->query("SELECT * FROM `tbl_user`");


while ($row = $result->fetch_array()) {
    if($row["username"]==$usermail){
        $creater_id = $row["id"];
    }
}

$outp = "";
$result = $conn->query("SELECT * FROM `tbl_combos` WHERE creater_id=$creater_id");

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if (!$rs) {
        throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
    }

    $name = $conn->query("SELECT * FROM `tbl_user` WHERE id=$creater_id");
    while ($row = $name->fetch_assoc()) {
        if (!$name) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $creater_id= $row['username'];
    }


    $bread_id=$rs["bread_id"];
    $bread_url;
    $bread_calories;
    $name = $conn->query("SELECT * FROM `tbl_ingredient_bread` WHERE id=$bread_id");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $bread_id= $row['name'];
        $bread_url=$row['pictureURL'];
        $bread_calories=$row['calories'];
    }
    $bread_qty=$rs["bread_qty"];
    $bread_calories*=$bread_qty;


    $meat_name=$rs["meat_id"];
    $meat_url;
    $meat_calories;
    $name = $conn->query("SELECT * FROM `tbl_ingredient_meat` WHERE id=$meat_name");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $meat_name= $row['name'];
        $meat_url=$row['pictureURL'];
        $meat_calories=$row['calories'];
    }
    $meat_qty=$rs["meat_qty"];
    $meat_calories*=$meat_qty;


    $cheese_name=$rs["cheese_id"];
    $cheese_url;
    $cheese_calories;
    $name = $conn->query("SELECT * FROM `tbl_ingredient_cheese` WHERE id=$cheese_name");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $cheese_name= $row['name'];
        $cheese_url=$row['pictureURL'];
        $cheese_calories=$row['calories'];
    }
    $cheese_qty=$rs["cheese_qty"];
    $cheese_calories*=$cheese_qty;

    $vegetable_name=$rs["vegetable_id"];
    $vegetable_url;
    $vegetable_calories;
    $name = $conn->query("SELECT * FROM `tbl_ingredient_vegetable` WHERE id=$vegetable_name");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $vegetable_name= $row['name'];
        $vegetable_url=$row['pictureURL'];
        $vegetable_calories=$row['calories'];
    }
    $vegetable_qty=$rs["vegetable_qty"];
    $vegetable_calories*=$vegetable_qty;

    $sauce_name=$rs["sauce_id"];
    $sauce_url;
    $sauce_calories;
    $name = $conn->query("SELECT * FROM `tbl_ingredient_sauce` WHERE id=$sauce_name");
    while ($row = $name->fetch_assoc()) {
        if (!$row) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $sauce_name= $row['name'];
        $sauce_url=$row['pictureURL'];
        $sauce_calories=$row['calories'];
    }
    $sauce_qty=$rs["sauce_qty"];
    $sauce_calories*=$sauce_qty;
    $temp_cal=$bread_calories+$meat_calories+$vegetable_calories+$sauce_calories+$cheese_calories;


    if ($outp != "") {$outp .= ",";}
    $outp .= '{"combo":"'  . $rs["id"] . '",';
    $outp .= '"creater_name":"'   . $creater_id . '",';
    $outp .= '"Total_calories":"'   . $temp_cal . '",';
    $outp .= '"bread_name":"'   . $bread_id . '",';
    $outp .= '"bread_qty":"'   . $bread_qty . '",';
    $outp .= '"bread_url":"'   . $bread_url . '",';
    $outp .= '"meat_name":"'   . $meat_name . '",';
    $outp .= '"meat_qty":"'   . $meat_qty . '",';
    $outp .= '"meat_url":"'   . $meat_url . '",';
    $outp .= '"cheese_name":"'   . $cheese_name . '",';
    $outp .= '"cheese_qty":"'   . $cheese_qty . '",';
    $outp .= '"cheese_url":"'   . $cheese_url . '",';
    $outp .= '"vegetable_name":"'   . $vegetable_name . '",';
    $outp .= '"vegetable_qty":"'   . $vegetable_qty . '",';
    $outp .= '"vegetable_url":"'   . $vegetable_url . '",';
    $outp .= '"sauce_name":"'   . $sauce_name . '",';
    $outp .= '"sauce_url":"'   . $sauce_url . '",';
    $outp .= '"sauce_qty":"'   . $sauce_qty . '"}';
}

$outp ='{"records":['.$outp.']}';
$conn->close();

echo ($outp);

?>