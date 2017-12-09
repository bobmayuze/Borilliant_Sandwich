<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include('../user/connect.php');

$result = $conn->prepare("SELECT * FROM `gredients`.`tbl_user` WHERE activate = 1");
$result->execute();
$data = $result->fetchAll();

unset($result);

$jsonString = '{"results":[';

for ($i = 0; $i < sizeof($data); $i++){

	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	$jsonString = $jsonString . '{'. '"id": "' . $data[$i]['id'] . '", "username": "' . $data[$i]['username'] . '", "nickname": "' . $data[$i]['nickname'] . '", "activate": "' . $data[$i]['activate'] . '"}';
}

$jsonString = $jsonString . ']}';

$jsonObject = json_encode($jsonString);
$jsonObject = json_decode($jsonObject);

echo($jsonObject);

?>

