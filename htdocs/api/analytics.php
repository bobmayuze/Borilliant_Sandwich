<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include('../user/connect.php');

$result = $conn->prepare("SELECT bread_id, count(*) FROM tbl_combos GROUP BY bread_id ORDER BY count(*) DESC LIMIT 3");
$result->execute();

$jsonString = '{"top3":{';

$data = $result->fetchAll();

unset($result);

$jsonString = $jsonString . '"bread":[';

for ($i = 0; $i < sizeof($data); $i++){

	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	$result = $conn->prepare("SELECT * FROM tbl_ingredient_bread WHERE id = :id");

	$result->execute(array(':id' => $data[$i]["bread_id"]));

	$innerData = $result->fetchAll();

	unset($result);

	$jsonString = $jsonString . '{'. '"rank": "' . ($i+1) . '", "name": "' . $innerData[0]['name'] . '", "calories": "' . $innerData[0]['calories'] . '", "pictureURL": "' . $innerData[0]['pictureURL'] . '"}';

}

$jsonString = $jsonString . '],';
//===========================================================================================
//meat
$result = $conn->prepare("SELECT meat_id FROM tbl_combos");
$result->execute();

$data = $result->fetchAll();

unset($result);
$values = [];
$numEntries = 0;
for ($i = 0; $i < sizeof($data); $i++){
	$temp = str_replace('"[', "", $data[$i][0]);
	$temp = str_replace(']"', "", $temp);
	$splitValues = explode(',', $temp);
	for ($j = 0; $j < sizeof($splitValues); $j++){
		if (array_key_exists($splitValues[$j], $values)){
			$values[$splitValues[$j]] = $values[$splitValues[$j]] + 1;
		}else{
			$values[$splitValues[$j]] = 1;
			$numEntries++;
		}
	}
}

//All data is counted twice so I have to go back and divide everything by 2
foreach ($values as &$temp) {
    $temp = $temp / 2;
}

arsort($values);

$jsonString = $jsonString . '"meat":[';

$i = 0;
foreach ($values as $key => $value){

	if ($i != 0){
		$jsonString = $jsonString . ',';
	}


	$result = $conn->prepare("SELECT * FROM tbl_ingredient_meat WHERE id = :id");
	$result->execute(array(':id' => $key));

	$innerData = $result->fetchAll();

	unset($result);

	$jsonString = $jsonString . '{'. '"rank": "' . ($i+1) . '", "name": "' . $innerData[0]['name'] . '", "calories": "' . $innerData[0]['calories'] . '", "pictureURL": "' . $innerData[0]['pictureURL'] . '"}';

	if ($i == 2){
		break;
	}
	$i++;
}

$jsonString = $jsonString . '],';

//=========================================================================================
//===========================================================================================
//cheese
$result = $conn->prepare("SELECT cheese_id FROM tbl_combos");
$result->execute();

$data = $result->fetchAll();

unset($result);
$values = [];
$numEntries = 0;
for ($i = 0; $i < sizeof($data); $i++){
	$temp = str_replace('"[', "", $data[$i][0]);
	$temp = str_replace(']"', "", $temp);
	$splitValues = explode(',', $temp);
	for ($j = 0; $j < sizeof($splitValues); $j++){
		if (array_key_exists($splitValues[$j], $values)){
			$values[$splitValues[$j]] = $values[$splitValues[$j]] + 1;
		}else{
			$values[$splitValues[$j]] = 1;
			$numEntries++;
		}
	}
}

//All data is counted twice so I have to go back and divide everything by 2
foreach ($values as &$temp) {
    $temp = $temp / 2;
}

arsort($values);

$jsonString = $jsonString . '"cheese":[';

$i = 0;
foreach ($values as $key => $value){

	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	$result = $conn->prepare("SELECT * FROM tbl_ingredient_cheese WHERE id = :id");
	$result->execute(array(':id' => $key));

	$innerData = $result->fetchAll();

	unset($result);

	$jsonString = $jsonString . '{'. '"rank": "' . ($i+1) . '", "name": "' . $innerData[0]['name'] . '", "calories": "' . $innerData[0]['calories'] . '", "pictureURL": "' . $innerData[0]['pictureURL'] . '"}';

	if ($i == 2){
		break;
	}
	$i++;
}

$jsonString = $jsonString . '],';

//=========================================================================================
//===========================================================================================
//vegetable
$result = $conn->prepare("SELECT vegetable_id FROM tbl_combos");
$result->execute();

$data = $result->fetchAll();

unset($result);
$values = [];
$numEntries = 0;
for ($i = 0; $i < sizeof($data); $i++){
	$temp = str_replace('"[', "", $data[$i][0]);
	$temp = str_replace(']"', "", $temp);
	$splitValues = explode(',', $temp);
	for ($j = 0; $j < sizeof($splitValues); $j++){
		if (array_key_exists($splitValues[$j], $values)){
			$values[$splitValues[$j]] = $values[$splitValues[$j]] + 1;
		}else{
			$values[$splitValues[$j]] = 1;
			$numEntries++;
		}
	}
}

//All data is counted twice so I have to go back and divide everything by 2
foreach ($values as &$temp) {
    $temp = $temp / 2;
}

arsort($values);

$jsonString = $jsonString . '"vegetable":[';

$i = 0;
foreach ($values as $key => $value){

	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	$result = $conn->prepare("SELECT * FROM tbl_ingredient_vegetable WHERE id = :id");
	$result->execute(array(':id' => $key));

	$innerData = $result->fetchAll();

	unset($result);

	$jsonString = $jsonString . '{'. '"rank": "' . ($i+1) . '", "name": "' . $innerData[0]['name'] . '", "calories": "' . $innerData[0]['calories'] . '", "pictureURL": "' . $innerData[0]['pictureURL'] . '"}';

	if ($i == 2){
		break;
	}
	$i++;
}

$jsonString = $jsonString . '],';

//=========================================================================================
//===========================================================================================
//sauce
$result = $conn->prepare("SELECT sauce_id FROM tbl_combos");
$result->execute();

$data = $result->fetchAll();

unset($result);
$values = [];
$numEntries = 0;
for ($i = 0; $i < sizeof($data); $i++){
	$temp = str_replace('"[', "", $data[$i][0]);
	$temp = str_replace(']"', "", $temp);
	$splitValues = explode(',', $temp);
	for ($j = 0; $j < sizeof($splitValues); $j++){
		if (array_key_exists($splitValues[$j], $values)){
			$values[$splitValues[$j]] = $values[$splitValues[$j]] + 1;
		}else{
			$values[$splitValues[$j]] = 1;
			$numEntries++;
		}
	}
}

//All data is counted twice so I have to go back and divide everything by 2
foreach ($values as &$temp) {
    $temp = $temp / 2;
}

arsort($values);

$jsonString = $jsonString . '"sauce":[';

$i = 0;
foreach ($values as $key => $value){

	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	$result = $conn->prepare("SELECT * FROM tbl_ingredient_sauce WHERE id = :id");
	$result->execute(array(':id' => $key));

	$innerData = $result->fetchAll();

	unset($result);

	$jsonString = $jsonString . '{'. '"rank": "' . ($i+1) . '", "name": "' . $innerData[0]['name'] . '", "calories": "' . $innerData[0]['calories'] . '", "pictureURL": "' . $innerData[0]['pictureURL'] . '"}';

	if ($i == 2){
		break;
	}
	$i++;
}

$jsonString = $jsonString . ']';

//=========================================================================================


$jsonString = $jsonString . '}}';

$jsonObject = json_encode($jsonString);
$jsonObject = json_decode($jsonObject);

echo($jsonObject);

?>

