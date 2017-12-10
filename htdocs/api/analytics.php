<?php
/*
//returned json string will look something like this:
{
	"top3": {
		"bread": {
			"first": {
				"name": "wheat_bread",
				"calories": "69",
				"pictureURL": "http://img.allw.mn/content/2013/11/24210219_6761.jpg"
			},
			"second": {
				"name": "gluten_free_wrap",
				"calories": "75",
				"pictureURL": "http://beyondmeat-uploads.s3.amazonaws.com/recipes/buffalo-gluten-free-chicken-wrap/Buffalo-Gluten-Free-Wrap.jpg"
			},
			"third": {
				"name": "white_wrap",
				"calories": "70",
				"pictureURL": "http://img.taste.com.au/xzkCGkYB/w643-h428-cfill-q90/taste/2016/11/barbecue-beef-wraps-59449-1.jpeg"
			}
		},
		"meat": {
			"first": {
				"name": "honey_ham",
				"calories": "34",
				"pictureURL": "http://food.fnr.sndimg.com/content/dam/images/food/fullset/2015/8/14/0/WU1104H_Honey-Glazed-Ham_s4x3.jpg.rend.hgtvcom.616.462.suffix/1439583024885.jpeg"
			},
			"second": {
				"name": "turkey",
				"calories": "22",
				"pictureURL": "http://cdn-mf0.heartyhosting.com/sites/mensfitness.com/files/styles/gallery_slideshow_image/public/sliced-turkey.jpg"
			},
			"third": {
				"name": "roast_beef",
				"calories": "35",
				"pictureURL": "https://images.eatthismuch.com/site_media/img/99969_ldementhon_2d356fa3-a0af-49a3-b7ce-49d5ae8f4a0b.png"
			}
		},
		"cheese": {
			"first": {
				"name": "provolone",
				"calories": "96",
				"pictureURL": "http://www.murrayscheese.com/site/images/items/20019700000.0.jpg?resizeid=3&resizeh=600&resizew=600"
			},
			"second": {
				"name": "american",
				"calories": "104",
				"pictureURL": "http://thumbs.ifood.tv/files/images/editor/images/American%20Cheese.jpg"
			},
			"third": {
				"name": "swiss",
				"calories": "106",
				"pictureURL": "https://boygeniusreport.files.wordpress.com/2015/05/swiss_cheese.jpg?quality=98&strip=all"
			}
		},
		"vegetable": {
			"first": {
				"name": "tomato",
				"calories": "4",
				"pictureURL": "http://growyourowngroceries.org/wp-content/uploads/2015/07/bigstock-Red-sliced-tomato-90434192-300x171.jpg"
			},
			"second": {
				"name": "brocoli",
				"calories": "31",
				"pictureURL": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkmgfbl6WvUpe1YQfPNfmWreEIomJ1_Tv_OwhaWqVz1FO8RTNFAQ"
			},
			"third": {
				"name": "avocado",
				"calories": "234",
				"pictureURL": "https://www.organicfacts.net/wp-content/uploads/avocado.jpg"
			}
		},
		"sauce": {
			"first": {
				"name": "bbq_sauce",
				"calories": "25",
				"pictureURL": "https://target.scene7.com/is/image/Target/16759960?wid=520&hei=520&fmt=pjpeg"
			},
			"second": {
				"name": "blue_cheese_dressing",
				"calories": "70",
				"pictureURL": "https://i5.walmartimages.com/asr/def10768-4e00-4f82-80f7-3fcdf1e163ab_1.8b796cba97178720ccbfa038715ca0d5.jpeg"
			}
		}
	}
}
*/
//allow cross origin access
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//connect to the database
include('../user/connect.php');

//query to get the top 3 most common bread ids
$result = $conn->prepare("SELECT bread_id, count(*) FROM tbl_combos GROUP BY bread_id ORDER BY count(*) DESC LIMIT 3");
$result->execute();

//string to hold all json, it will be converted into a json object at the end
$jsonString = '{"top3":{';

//get the results from the query
$data = $result->fetchAll();

//clear result so it can be used again
unset($result);

$jsonString = $jsonString . '"bread":[';

//go through the returned most common bread ids
for ($i = 0; $i < sizeof($data); $i++){

	//add a comma to the end of the line unless this is the first trip through the loop
	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	//get the information of the bread with the corresponding bread id in the bread table
	$result = $conn->prepare("SELECT * FROM tbl_ingredient_bread WHERE id = :id");
	$result->execute(array(':id' => $data[$i]["bread_id"]));
	$innerData = $result->fetchAll();

	//clear result
	unset($result);

	//add the information on the bread to the json string
	$jsonString = $jsonString . '{'. '"rank": "' . ($i+1) . '", "name": "' . $innerData[0]['name'] . '", "calories": "' . $innerData[0]['calories'] . '", "pictureURL": "' . $innerData[0]['pictureURL'] . '"}';

}

$jsonString = $jsonString . '],';
//===========================================================================================
//meat
//query to get all meat ids in the combos table
//each row will hold the different meat ids in that combo
$result = $conn->prepare("SELECT meat_id FROM tbl_combos");
$result->execute();
$data = $result->fetchAll();

//clear result
unset($result);

//map to hold ids as keys and the number of times they appear as values
$values = [];
//number of different kinds of the ingredient there are
$numEntries = 0;
//go through the results
for ($i = 0; $i < sizeof($data); $i++){
	//get rid of the extra characters
	$temp = str_replace('"[', "", $data[$i][0]);
	$temp = str_replace(']"', "", $temp);
	//split the ids at the comma
	$splitValues = explode(',', $temp);
	//go through al ids in the sandwich
	for ($j = 0; $j < sizeof($splitValues); $j++){
		//if the id is already a key in the map, add 1 to the value
		if (array_key_exists($splitValues[$j], $values)){
			$values[$splitValues[$j]] = $values[$splitValues[$j]] + 1;
		}else{
			//else add the key to the map and there's one more ingredient
			$values[$splitValues[$j]] = 1;
			$numEntries++;
		}
	}
}

//All data is counted twice so I have to go back and divide values by 2
foreach ($values as &$temp) {
    $temp = $temp / 2;
}

//sorts all the keys by value. This will put the 3 most common ids first in the map
arsort($values);

$jsonString = $jsonString . '"meat":[';

//go through the map
$i = 0;
foreach ($values as $key => $value){

	//if this is the first time through the loop, don't add a comma to the end
	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	//grab infromation on the ingredient with the matching id
	$result = $conn->prepare("SELECT * FROM tbl_ingredient_meat WHERE id = :id");
	$result->execute(array(':id' => $key));
	$innerData = $result->fetchAll();

	//clear result
	unset($result);

	//add the information to the json string
	$jsonString = $jsonString . '{'. '"rank": "' . ($i+1) . '", "name": "' . $innerData[0]['name'] . '", "calories": "' . $innerData[0]['calories'] . '", "pictureURL": "' . $innerData[0]['pictureURL'] . '"}';

	//if this is the 3rd item, break out of the loop
	if ($i == 2){
		break;
	}
	//counter
	$i++;
}

$jsonString = $jsonString . '],';

//=========================================================================================
//===========================================================================================
//cheese
//query to get all cheese ids in the combos table
//each row will hold the different cheese ids in that combo
$result = $conn->prepare("SELECT cheese_id FROM tbl_combos");
$result->execute();
$data = $result->fetchAll();

//clear result
unset($result);

//map to hold all ids and how many times they appear
$values = [];
//number of different ids
$numEntries = 0;
//go through all rows
for ($i = 0; $i < sizeof($data); $i++){
	//remove extra characters
	$temp = str_replace('"[', "", $data[$i][0]);
	$temp = str_replace(']"', "", $temp);
	//split the ids at commas
	$splitValues = explode(',', $temp);
	//go through split ids
	for ($j = 0; $j < sizeof($splitValues); $j++){
		//if the id already exists, add one to its value
		if (array_key_exists($splitValues[$j], $values)){
			$values[$splitValues[$j]] = $values[$splitValues[$j]] + 1;
		}else{
			//else add the id to a key in the map
			$values[$splitValues[$j]] = 1;
			//counter
			$numEntries++;
		}
	}
}

//All data is counted twice so I have to go back and divide values by 2
foreach ($values as &$temp) {
    $temp = $temp / 2;
}

//sorts all the keys by value. This will put the 3 most common ids first in the map
arsort($values);

$jsonString = $jsonString . '"cheese":[';

//go through sorted map
$i = 0;
foreach ($values as $key => $value){

	//if this is the first loop, don't add a comma
	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	//get information from the ingredient table with the corresponding id
	$result = $conn->prepare("SELECT * FROM tbl_ingredient_cheese WHERE id = :id");
	$result->execute(array(':id' => $key));
	$innerData = $result->fetchAll();

	//clear result
	unset($result);

	//add information to json string
	$jsonString = $jsonString . '{'. '"rank": "' . ($i+1) . '", "name": "' . $innerData[0]['name'] . '", "calories": "' . $innerData[0]['calories'] . '", "pictureURL": "' . $innerData[0]['pictureURL'] . '"}';

	//if three ingredients have been gone through, break
	if ($i == 2){
		break;
	}
	//counter
	$i++;
}

$jsonString = $jsonString . '],';

//=========================================================================================
//===========================================================================================
//query to get all vegetable ids in the combos table
//each row will hold the different vegetable ids in that combo
//vegetable
$result = $conn->prepare("SELECT vegetable_id FROM tbl_combos");
$result->execute();
$data = $result->fetchAll();

//clear result
unset($result);

//map to hold ids as keys and their counts as values
$values = [];
//number of different ingredients
$numEntries = 0;
//go through rows
for ($i = 0; $i < sizeof($data); $i++){
	//remove extra characters
	$temp = str_replace('"[', "", $data[$i][0]);
	$temp = str_replace(']"', "", $temp);
	//split ids by commas
	$splitValues = explode(',', $temp);
	//go through split ids
	for ($j = 0; $j < sizeof($splitValues); $j++){
		//if the id is already a key
		if (array_key_exists($splitValues[$j], $values)){
			//add one to its value
			$values[$splitValues[$j]] = $values[$splitValues[$j]] + 1;
		}else{
			//else add it to the map
			$values[$splitValues[$j]] = 1;
			$numEntries++;
		}
	}
}

//All data is counted twice so I have to go back and divide values by 2
foreach ($values as &$temp) {
    $temp = $temp / 2;
}

//sorts all the keys by value. This will put the 3 most common ids first in the map
arsort($values);

$jsonString = $jsonString . '"vegetable":[';

//go through sorted map
$i = 0;
foreach ($values as $key => $value){

	//if this is the first loop, don't add a comma to json string
	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	//get the information on the ingredient from the ingredient with the same id in the table
	$result = $conn->prepare("SELECT * FROM tbl_ingredient_vegetable WHERE id = :id");
	$result->execute(array(':id' => $key));
	$innerData = $result->fetchAll();

	//clear result
	unset($result);

	//add the information to the json string
	$jsonString = $jsonString . '{'. '"rank": "' . ($i+1) . '", "name": "' . $innerData[0]['name'] . '", "calories": "' . $innerData[0]['calories'] . '", "pictureURL": "' . $innerData[0]['pictureURL'] . '"}';

	//if three ingredients have been gone through, break out of the loop
	if ($i == 2){
		break;
	}
	//counter
	$i++;
}

$jsonString = $jsonString . '],';

//=========================================================================================
//===========================================================================================
//sauce
//query to get all sauce ids in the combos table
//each row will hold the different sauce ids in that combo
$result = $conn->prepare("SELECT sauce_id FROM tbl_combos");
$result->execute();
$data = $result->fetchAll();

//clear result
unset($result);

//map to hold ids as keys and their count as values
$values = [];
//number of different ingredients
$numEntries = 0;
//go through all rows
for ($i = 0; $i < sizeof($data); $i++){
	//remove extra characters
	$temp = str_replace('"[', "", $data[$i][0]);
	$temp = str_replace(']"', "", $temp);
	//split ids by commas
	$splitValues = explode(',', $temp);
	//go through split ids
	for ($j = 0; $j < sizeof($splitValues); $j++){
		//if id is already a key, add one to its value
		if (array_key_exists($splitValues[$j], $values)){
			$values[$splitValues[$j]] = $values[$splitValues[$j]] + 1;
		}else{
			//else add id to map
			$values[$splitValues[$j]] = 1;
			$numEntries++;
		}
	}
}

//All data is counted twice so I have to go back and divide values by 2
foreach ($values as &$temp) {
    $temp = $temp / 2;
}

//sorts all the keys by value. This will put the 3 most common ids first in the map
arsort($values);

$jsonString = $jsonString . '"sauce":[';

//go through the sorted map
$i = 0;
foreach ($values as $key => $value){

	//if this is the first loop, don't add a comma to the string
	if ($i != 0){
		$jsonString = $jsonString . ',';
	}

	//get infromstion from the ingredient in the table with the same id
	$result = $conn->prepare("SELECT * FROM tbl_ingredient_sauce WHERE id = :id");
	$result->execute(array(':id' => $key));
	$innerData = $result->fetchAll();

	//clear result
	unset($result);

	//add the infromation to the json string
	$jsonString = $jsonString . '{'. '"rank": "' . ($i+1) . '", "name": "' . $innerData[0]['name'] . '", "calories": "' . $innerData[0]['calories'] . '", "pictureURL": "' . $innerData[0]['pictureURL'] . '"}';

	//if three ingredients have been added, break out of loop
	if ($i == 2){
		break;
	}
	//counter
	$i++;
}

$jsonString = $jsonString . ']';

//=========================================================================================

//close the json string
$jsonString = $jsonString . '}}';

//turn string into json object
$jsonObject = json_encode($jsonString);
$jsonObject = json_decode($jsonObject);

//return json object
echo($jsonObject);

?>

