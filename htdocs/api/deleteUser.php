<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include('../user/connect.php');

$data = json_decode(file_get_contents("php://input"));
$idList = implode(", ", $data->idList);
try {
  $sql = "UPDATE `gredients`.`tbl_user` SET activate = 0 WHERE id IN (" .$idList . ")";
  $result = $conn->prepare($sql);
  $result->execute();
  // echo a message to say the UPDATE succeeded
  echo $result->rowCount() . " records UPDATED successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>

