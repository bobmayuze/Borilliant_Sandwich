<?php
//allow cross origin access
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//connect to database
include('../user/connect.php');

//get all the admin users from the database
$result = $conn->prepare("SELECT * FROM `gredients`.`tbl_user` WHERE activate = 1");
$result->execute();
$data = $result->fetchAll();

//clear the result
unset($result);

//create a json string to hold returned information
$jsonString = '{"results":[';

//go through list of admin users
for ($i = 0; $i < sizeof($data); $i++){

	//if this isn't the first loop, add a comma to the json string for formatting purposes
	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	//add information on the admin user to the json string
	$jsonString = $jsonString . '{'. '"id": "' . $data[$i]['id'] . '", "username": "' . $data[$i]['username'] . '", "nickname": "' . $data[$i]['nickname'] . '", "activate": "' . $data[$i]['activate'] . '"}';
}

//close the json string
$jsonString = $jsonString . ']}';

//turn the json string into a json object
$jsonObject = json_encode($jsonString);
$jsonObject = json_decode($jsonObject);

//return the json object
echo($jsonObject);

?>

