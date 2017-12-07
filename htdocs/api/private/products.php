<?php
header("Content-Type: text/html; charset=utf8");
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

}else{
    echo "user not log in</br>";
    echo "
            <script>
              setTimeout(function(){window.location.href='../../user/logIn.html';},1000);
            </script>
        ";
    exit;
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





    $meatid_array = str_split($rs["meat_id"]);
    $meatname_array=array();
    $meatqty_array = str_split($rs["meat_qty"]);
    $meatqty_result=array();
    for ($i=2;$i<count($meatqty_array)-2;$i++){
        array_push($meatqty_result,$meatqty_array[$i]);
        $i++;
    }
    $meaturl_array=array();
    for ($i=2;$i<count($meatid_array)-2;$i++){
        $name = $conn->query("SELECT * FROM `tbl_ingredient_meat` WHERE id=$meatid_array[$i]");
        while ($row = $name->fetch_assoc()) {
            if (!$row) {
                throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
            }
            array_push($meatname_array, $row['name']);
            array_push($meaturl_array, $row['pictureURL']);

        }
        $i++;
    }
    $meatname_result = '['.implode(",", $meatname_array).']';
    $meaturl_result = '['.implode(",", $meaturl_array).']';
    $meatqty_result_ = '['.implode(",", $meatqty_result).']';

    $vegetableid_array = str_split($rs["vegetable_id"]);
    $vegetablename_array=array();
    $vegetableqty_array = str_split($rs["vegetable_qty"]);
    $vegetableqty_result=array();
    for ($i=2;$i<count($vegetableqty_array)-2;$i++){
        array_push($vegetableqty_result,$vegetableqty_array[$i]);
        $i++;
    }
    $vegetableurl_array=array();
    for ($i=2;$i<count($vegetableid_array)-2;$i++){
        $name = $conn->query("SELECT * FROM `tbl_ingredient_vegetable` WHERE id=$vegetableid_array[$i]");
        while ($row = $name->fetch_assoc()) {
            if (!$row) {
                throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
            }
            array_push($vegetablename_array, $row['name']);
            array_push($vegetableurl_array, $row['pictureURL']);

        }
        $i++;
    }
    $vegetablename_result = '['.implode(",", $vegetablename_array).']';
    $vegetableurl_result = '['.implode(",", $vegetableurl_array).']';
    $vegetableqty_result_ = '['.implode(",", $vegetableqty_result).']';

    $cheeseid_array = str_split($rs["cheese_id"]);
    $cheesename_array=array();
    $cheeseqty_array = str_split($rs["cheese_qty"]);
    $cheeseqty_result=array();
    for ($i=2;$i<count($cheeseqty_array)-2;$i++){
        array_push($cheeseqty_result,$cheeseqty_array[$i]);
        $i++;
    }
    $cheeseurl_array=array();
    for ($i=2;$i<count($cheeseid_array)-2;$i++){
        $name = $conn->query("SELECT * FROM `tbl_ingredient_cheese` WHERE id=$cheeseid_array[$i]");
        while ($row = $name->fetch_assoc()) {
            if (!$row) {
                throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
            }
            array_push($cheesename_array, $row['name']);
            array_push($cheeseurl_array, $row['pictureURL']);

        }
        $i++;
    }
    $cheesename_result = '['.implode(",", $cheesename_array).']';
    $cheeseurl_result = '['.implode(",", $cheeseurl_array).']';
    $cheeseqty_result_ = '['.implode(",", $cheeseqty_result).']';

    $sauceid_array = str_split($rs["sauce_id"]);
    $saucename_array=array();
    $sauceqty_array = str_split($rs["sauce_qty"]);
    $sauceqty_result=array();
    for ($i=2;$i<count($sauceqty_array)-2;$i++){
        array_push($sauceqty_result,$sauceqty_array[$i]);
        $i++;
    }
    $sauceurl_array=array();
    for ($i=2;$i<count($sauceid_array)-2;$i++){
        $name = $conn->query("SELECT * FROM `tbl_ingredient_sauce` WHERE id=$sauceid_array[$i]");
        while ($row = $name->fetch_assoc()) {
            if (!$row) {
                throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
            }
            array_push($saucename_array, $row['name']);
            array_push($sauceurl_array, $row['pictureURL']);

        }
        $i++;
    }
    $saucename_result = '['.implode(",", $saucename_array).']';
    $sauceurl_result = '['.implode(",", $sauceurl_array).']';
    $sauceqty_result_ = '['.implode(",", $sauceqty_result).']';


    if ($outp != "") {$outp .= ",";}
    $outp .= '{"combo":"'  . $rs["id"] . '",';
    $outp .= '"creater_name":"'   . $creater_id . '",';
    $outp .= '"bread_name":"'   . $bread_id . '",';
    $outp .= '"bread_qty":"'   . $bread_qty . '",';
    $outp .= '"bread_url":"'   . $bread_url . '",';
    $outp .= '"meat_name":"'   . $meatname_result . '",';
    $outp .= '"meat_qty":"'   . $meatqty_result_ . '",';
    $outp .= '"meat_url":"'   . $meaturl_result . '",';
    $outp .= '"cheese_name":"'   . $cheesename_result . '",';
    $outp .= '"cheese_qty":"'   . $cheeseqty_result_ . '",';
    $outp .= '"cheese_url":"'   . $cheeseurl_result . '",';
    $outp .= '"vegetable_name":"'   . $vegetablename_result . '",';
    $outp .= '"vegetable_qty":"'   . $vegetableqty_result_ . '",';
    $outp .= '"vegetable_url":"'   . $vegetableurl_result . '",';
    $outp .= '"sauce_name":"'   . $saucename_result . '",';
    $outp .= '"sauce_url":"'   . $sauceurl_result. '",';
    $outp .= '"sauce_qty":"'   . $sauceqty_result_ . '"}';
}

$outp ='{"records":['.$outp.']}';
$conn->close();

echo ($outp);

?>


