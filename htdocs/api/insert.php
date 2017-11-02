<?php  
//insert.php  
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");

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

$data = json_decode(file_get_contents("php://input"));  
if(count($data) > 0) {  
    // $name = $data->name;       
    // $calories = $data->calories;  
    $name = mysqli_real_escape_string($conn, $data->name);       
    $calories = mysqli_real_escape_string($conn, $data->calories);  
    $query = "INSERT INTO tbl_ingredient_bread(name, calories) VALUES ('$name', '$calories')";  
    if(mysqli_query($conn, $query)) {  
      echo "Data Inserted...";  
    } else {  
      echo 'Error';  
    }
}  
?>  