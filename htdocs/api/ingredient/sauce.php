<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

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

//get all information in sauce table
$result = $conn->query("SELECT * FROM tbl_ingredient_sauce");

//format all information into json
$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'  . $rs["id"] . '",';
    $outp .= '"name":"'  . $rs["name"] . '",';
    $outp .= '"calories":"'   . $rs["calories"] . '",';
    $outp .= '"pictureURL":"'   . $rs["pictureURL"] . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

//return information in json format
echo($outp);
?>
