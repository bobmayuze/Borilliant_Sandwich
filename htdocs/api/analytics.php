<?php
/*
Inserted data I tested with:

INSERT INTO tbl_combos (creater_id, bread_id, bread_qty, meat_id, meat_qty, cheese_id, cheese_qty, vegetable_id, vegetable_qty, sauce_id, sauce_qty) VALUES ("2", "1", "2", "3,6", "2,1", "1", "1", "9", "1", "7,3", "1,1");
INSERT INTO tbl_combos (creater_id, bread_id, bread_qty, meat_id, meat_qty, cheese_id, cheese_qty, vegetable_id, vegetable_qty, sauce_id, sauce_qty) VALUES ("2", "1", "2", "3,2", "2,1", "1", "1", "9", "1", "7,1", "1,2");
INSERT INTO tbl_combos (creater_id, bread_id, bread_qty, meat_id, meat_qty, cheese_id, cheese_qty, vegetable_id, vegetable_qty, sauce_id, sauce_qty) VALUES ("2", "1", "2", "3", "2", "4,1", "1,1", "9,3", "1,1", "7,2", "1,1");
INSERT INTO tbl_combos (creater_id, bread_id, bread_qty, meat_id, meat_qty, cheese_id, cheese_qty, vegetable_id, vegetable_qty, sauce_id, sauce_qty) VALUES ("2", "1", "2", "3", "2", "4", "1", "9", "1", "7", "1");
INSERT INTO tbl_combos (creater_id, bread_id, bread_qty, meat_id, meat_qty, cheese_id, cheese_qty, vegetable_id, vegetable_qty, sauce_id, sauce_qty) VALUES ("2", "10", "2", "3,8", "2,1", "4,2", "1,1", "2", "1", "7,5", "1,3");
INSERT INTO tbl_combos (creater_id, bread_id, bread_qty, meat_id, meat_qty, cheese_id, cheese_qty, vegetable_id, vegetable_qty, sauce_id, sauce_qty) VALUES ("2", "10", "2", "1", "2", "3,2", "1,1", "2", "1", "7,6", "1,1");
INSERT INTO tbl_combos (creater_id, bread_id, bread_qty, meat_id, meat_qty, cheese_id, cheese_qty, vegetable_id, vegetable_qty, sauce_id, sauce_qty) VALUES ("2", "10", "2", "1,4", "2,1", "3,2", "1,1", "2,1", "1,1", "7", "1");
INSERT INTO tbl_combos (creater_id, bread_id, bread_qty, meat_id, meat_qty, cheese_id, cheese_qty, vegetable_id, vegetable_qty, sauce_id, sauce_qty) VALUES ("2", "6", "2", "1", "2", "3,2", "1,1", "2", "1", "7,8", "1,1");
INSERT INTO tbl_combos (creater_id, bread_id, bread_qty, meat_id, meat_qty, cheese_id, cheese_qty, vegetable_id, vegetable_qty, sauce_id, sauce_qty) VALUES ("2", "6", "2", "2,4", "2,1", "3,2", "1,1", "6", "1", "7", "1");
INSERT INTO tbl_combos (creater_id, bread_id, bread_qty, meat_id, meat_qty, cheese_id, cheese_qty, vegetable_id, vegetable_qty, sauce_id, sauce_qty) VALUES ("2", "5", "2", "2", "2", "3,2", "1,1", "6", "1", "1,10", "1,1");

JavaScript code to get the top 3;
function top3(){

  $.ajax({
    url      : "../api/analytics.php",
    dataType : 'json',
    type     : 'post',
    success  : function(Result){
      alert("Completed");
      //result contains the json string
      console.log(Result);

      }
  });

//returned json string will look something like this:


{
  "top3": [{
    "bread": [{
      "1": ["wheat_bread", "69", "http://img.allw.mn/content/2013/11/24210219_6761.jpg"],
      "2": ["gluten_free_wrap", "75", "http://beyondmeat-uploads.s3.amazonaws.com/recipes/buffalo-gluten-free-chicken-wrap/Buffalo-Gluten-Free-Wrap.jpg"],
      "3": ["white_wrap", "70", "http://img.taste.com.au/xzkCGkYB/w643-h428-cfill-q90/taste/2016/11/barbecue-beef-wraps-59449-1.jpeg"]
    }],
    "meat": [{
      "1": ["honey_ham", "34", "http://food.fnr.sndimg.com/content/dam/images/food/fullset/2015/8/14/0/WU1104H_Honey-Glazed-Ham_s4x3.jpg.rend.hgtvcom.616.462.suffix/1439583024885.jpeg"],
      "2": ["turkey", "22", "http://cdn-mf0.heartyhosting.com/sites/mensfitness.com/files/styles/gallery_slideshow_image/public/sliced-turkey.jpg"],
      "3": ["roast_beef", "35", "https://images.eatthismuch.com/site_media/img/99969_ldementhon_2d356fa3-a0af-49a3-b7ce-49d5ae8f4a0b.png"]
    }],
    "cheese": [{
      "1": ["provolone", "96", "http://www.murrayscheese.com/site/images/items/20019700000.0.jpg?resizeid=3&resizeh=600&resizew=600"],
      "2": ["american", "104", "http://thumbs.ifood.tv/files/images/editor/images/American%20Cheese.jpg"],
      "3": ["swiss", "106", "https://boygeniusreport.files.wordpress.com/2015/05/swiss_cheese.jpg?quality=98&strip=all"]
    }],
    "vegetable": [{
      "1": ["tomato", "4", "http://growyourowngroceries.org/wp-content/uploads/2015/07/bigstock-Red-sliced-tomato-90434192-300x171.jpg"],
      "2": ["brocoli", "31", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkmgfbl6WvUpe1YQfPNfmWreEIomJ1_Tv_OwhaWqVz1FO8RTNFAQ"],
      "3": ["avocado", "234", "https://www.organicfacts.net/wp-content/uploads/avocado.jpg"]
    }],
    "sauce": [{
      "1": ["bbq_sauce", "25", "https://target.scene7.com/is/image/Target/16759960?wid=520&hei=520&fmt=pjpeg"],
      "2": ["ranch_dressing", "73", "https://www.jaysbakingmecrazy.com/wp-content/uploads/2016/01/paleo_ranch2.jpg"],
      "3": ["dijon_mustard", "5", "http://chefsbest.com/wp-content/uploads/2015/11/Maille-Dijon-Mustard-FRONT.jpg"]
    }]
  }]
}  

}
*/
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include('../user/connect.php');

$result = $conn->prepare("SELECT bread_id, count(*) FROM tbl_combos GROUP BY bread_id ORDER BY count(*) DESC LIMIT 3");
$result->execute();

$jsonString = '{"top3":[{';

$data = $result->fetchAll();

unset($result);

$jsonString = $jsonString . '"bread":[{';

for ($i = 0; $i < sizeof($data); $i++){

	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	if ($i == 0){
		$num = "first";
	} else if ($i == 1){
		$num = "second";
	} else {
		$num = "third";
	}

	$jsonString = $jsonString . '"' . $num . '": ';

	$result = $conn->prepare("SELECT * FROM tbl_ingredient_bread WHERE id = :id");

	$result->execute(array(':id' => $data[$i]["bread_id"]));

	$innerData = $result->fetchAll();

	unset($result);

	$jsonString = $jsonString . '["' . $innerData[0]['name'] . '", "' . $innerData[0]['calories'] . '", "' . $innerData[0]['pictureURL'] . '"]';

}

$jsonString = $jsonString . '}],';
//===========================================================================================
//meat
$result = $conn->prepare("SELECT meat_id FROM tbl_combos");
$result->execute();

$data = $result->fetchAll();

unset($result);
$values = [];
$numEntries = 0;
for ($i = 0; $i < sizeof($data); $i++){
	$temp = implode(',', $data[$i]);
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

$jsonString = $jsonString . '"meat":[{';

$i = 0;
foreach ($values as $key => $value){

	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	if ($i == 0){
		$num = "first";
	} else if ($i == 1){
		$num = "second";
	} else {
		$num = "third";
	}

	$jsonString = $jsonString . '"' . $num . '": ';

	$result = $conn->prepare("SELECT * FROM tbl_ingredient_meat WHERE id = :id");
	$result->execute(array(':id' => $key));

	$innerData = $result->fetchAll();

	unset($result);

	$jsonString = $jsonString . '["' . $innerData[0]['name'] . '", "' . $innerData[0]['calories'] . '", "' . $innerData[0]['pictureURL'] . '"]';

	if ($i == 2){
		break;
	}
	$i++;
}

$jsonString = $jsonString . '}],';

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
	$temp = implode(',', $data[$i]);
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

$jsonString = $jsonString . '"cheese":[{';

$i = 0;
foreach ($values as $key => $value){

	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	if ($i == 0){
		$num = "first";
	} else if ($i == 1){
		$num = "second";
	} else {
		$num = "third";
	}

	$jsonString = $jsonString . '"' . $num . '": ';

	$result = $conn->prepare("SELECT * FROM tbl_ingredient_cheese WHERE id = :id");
	$result->execute(array(':id' => $key));

	$innerData = $result->fetchAll();

	unset($result);

	$jsonString = $jsonString . '["' . $innerData[0]['name'] . '", "' . $innerData[0]['calories'] . '", "' . $innerData[0]['pictureURL'] . '"]';

	if ($i == 2){
		break;
	}
	$i++;
}

$jsonString = $jsonString . '}],';

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
	$temp = implode(',', $data[$i]);
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

$jsonString = $jsonString . '"vegetable":[{';

$i = 0;
foreach ($values as $key => $value){

	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	if ($i == 0){
		$num = "first";
	} else if ($i == 1){
		$num = "second";
	} else {
		$num = "third";
	}

	$jsonString = $jsonString . '"' . $num . '": ';

	$result = $conn->prepare("SELECT * FROM tbl_ingredient_vegetable WHERE id = :id");
	$result->execute(array(':id' => $key));

	$innerData = $result->fetchAll();

	unset($result);

	$jsonString = $jsonString . '["' . $innerData[0]['name'] . '", "' . $innerData[0]['calories'] . '", "' . $innerData[0]['pictureURL'] . '"]';

	if ($i == 2){
		break;
	}
	$i++;
}

$jsonString = $jsonString . '}],';

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
	$temp = implode(',', $data[$i]);
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

$jsonString = $jsonString . '"sauce":[{';

$i = 0;
foreach ($values as $key => $value){

	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	if ($i == 0){
		$num = "first";
	} else if ($i == 1){
		$num = "second";
	} else {
		$num = "third";
	}

	$jsonString = $jsonString . '"' . $num . '": ';

	$result = $conn->prepare("SELECT * FROM tbl_ingredient_sauce WHERE id = :id");
	$result->execute(array(':id' => $key));

	$innerData = $result->fetchAll();

	unset($result);

	$jsonString = $jsonString . '["' . $innerData[0]['name'] . '", "' . $innerData[0]['calories'] . '", "' . $innerData[0]['pictureURL'] . '"]';

	if ($i == 2){
		break;
	}
	$i++;
}

$jsonString = $jsonString . '}]';

//=========================================================================================


$jsonString = $jsonString . '}]}';

$jsonObject = json_encode($jsonString);

echo($jsonObject);

?>

