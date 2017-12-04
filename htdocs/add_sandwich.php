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
      $bread_id = $comboObj->{'bread_id'};
	  print_r($bread_id);
      $bread_qty = $conn->quote($comboObj->{'bread_qty'});
      print_r($bread_qty);
      $meat_id = implode(", ",$comboObj->{'meat_id'});
      print_r($meat_id);
      $meat_qty = $conn->quote(implode(", ",$comboObj->{'meat_qty'}));
      print_r($meat_qty);
      $cheese_id = implode(", ",$comboObj->{'cheese_id'});
      print_r($cheese_id);
      $cheese_qty = $conn->quote(implode(", ",$comboObj->{'cheese_qty'}));
      print_r($cheese_qty);
      $vegetable_id = implode(", ",$comboObj->{'vegetable_id'});
      print_r($vegetable_id);
      $vegetable_qty = $conn->quote(implode(", ",$comboObj->{'vegetable_qty'}));
      print_r($vegetable_qty);
      $sauce_id = implode(", ",$comboObj->{'sauce_id'});
      print_r($sauce_id);
      $sauce_qty = $conn->quote(implode(", ",$comboObj->{'sauce_qty'}));
	  print_r($sauce_qty);
      $sql = $conn->prepare("INSERT INTO 'tbl_combos' (username, bread_id, bread_qty, meat_id, meat_qty, cheese_id, cheese_qty, vegetable_id, vegetable_qty, sauce_id, sauce_qty) VALUES (:username, :bread_id, :bread_qty, :meat_id, :meat_qty, :cheese_id, :cheese_qty, :vegetable_id, :vegetable_qty, :sauce_id, :sauce_qty)");
      $sql->bindParam(':username', $username);
	  $sql->bindParam(':bread_id', $bread_id);
	  $sql->bindParam(':bread_qty', $bread_qty);
	  $sql->bindParam(':meat_id', $meat_id);
	  $sql->bindParam(':meat_qty', $meat_qty);
	  $sql->bindParam(':cheese_id', $cheese_id);
	  $sql->bindParam(':cheese_qty', $cheese_qty);
	  $sql->bindParam(':vegetable_id', $vegetable_id);
	  $sql->bindParam(':vegetable_qty', $vegetable_qty);
	  $sql->bindParam(':sauce_id', $sauce_id);
	  $sql->bindParam(':sauce_qty', $sauce_qty);
	 try {
		$sql->execute();
		echo $sql->error;
    	echo "New sandwich created successfully";
	 } catch (PDOException $e) {
		echo "Error: " . $e;
	 }
	}
?>
