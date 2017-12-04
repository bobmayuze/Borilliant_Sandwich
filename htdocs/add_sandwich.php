<?PHP
    
    include('user/connect.php');//Conncet to the database

    //print_r($_POST);

	if (!$conn) {
		print_r("not connected");
	}
	$data = json_decode(file_get_contents("php://input"));
    $comboObj = $data->comboJSON;//get user email
    $username = md5($data->username);//get user password
    
    if ($comboObj && $username){//if both email and password are not null
      echo "Adding sandwich...";
      //$comboObj = json_decode($comboJSON);
      $bread_id = $conn->quote($comboObj->{'bread_id'});
      $bread_qty = $conn->quote($comboObj->{'bread_qty'});
      $meat_id = $conn->quote(implode(", ",$comboObj->{'meat_id'}));
      $meat_qty = $conn->quote(implode(", ",$comboObj->{'meat_qty'}));
      $cheese_id = $conn->quote(implode(", ",$comboObj->{'cheese_id'}));
      $cheese_qty = $conn->quote(implode(", ",$comboObj->{'cheese_qty'}));
      $vegetable_id = $conn->quote(implode(", ",$comboObj->{'vegetable_id'}));
      $vegetable_qty = $conn->quote(implode(", ",$comboObj->{'vegetable_qty'}));
      $sauce_id = $conn->quote(implode(", ",$comboObj->{'sauce_id'}));
      $sauce_qty = $conn->quote(implode(", ",$comboObj->{'sauce_qty'}));
	  $sql = "INSERT INTO 'tbl_combos' (username, bread_id, bread_qty, meat_id, meat_qty, cheese_id, cheese_qty, vegetable_id, vegetable_qty, sauce_id, sauce_qty) VALUES ($username, $bread_id, $bread_qty, $meat_id, $meat_qty, $cheese_id, $cheese_qty, $vegetable_id, $vegetable_qty, $sauce_id, $sauce_qty)";
     try {
		$conn->query($sql);
    	echo "New sandwich created successfully";
	 } catch (PDOException $e) {
		echo "Error: " . $e;
	 }
	}
?>
