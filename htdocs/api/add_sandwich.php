// Adds a sandwich to the combos_table
<?PHP
    
    include('../user/connect.php');//Conncet to the database

    //print_r($_POST);

	if (!$conn) {
		print_r("not connected");
	}
	$data = json_decode(file_get_contents("php://input"));
    $comboObj = $data->comboJSON;//get user email
    $username = $data->username;//username
	print_r("Name?" . $username);
	if ($username == "") {
		$username = 'admin';
	}
	$query = "Select id from `tbl_user` where username = " . $username;
	$userid;
	$row = $conn->query($query);
	$userid = $row['id'];
    if ($userid == null) {
		$userid = 9999;
	}
    if ($comboObj && $username){//if both email and password are not null
      echo "Adding sandwich...";
      //$comboObj = json_decode($comboJSON);
      $bread_id = $comboObj->{'bread_id'};
	  $bread_qty = $comboObj->{'bread_qty'};
      $meat_id = json_encode("[" . $comboObj->{'meat_id'} . "]");
      $meat_qty = json_encode("[" . $comboObj->{'meat_qty'} . "]") ;
      $cheese_id = json_encode("[" . $comboObj->{'cheese_id'} . "]");
      $cheese_qty = json_encode("[" . $comboObj->{'cheese_qty'} . "]");
      $vegetable_id = json_encode("[" . $comboObj->{'vegetable_id'} . "]");
      $vegetable_qty = json_encode("[" . $comboObj->{'vegetable_qty'} . "]");
      $sauce_id = json_encode("[" . $comboObj->{'sauce_id'} . "]");
      $sauce_qty = json_encode("[" . $comboObj->{'sauce_qty'} . "]");
	  $sql = $conn->prepare("INSERT INTO `tbl_combos` (creater_id, bread_id, bread_qty, meat_id, meat_qty, cheese_id, cheese_qty, vegetable_id, vegetable_qty, sauce_id, sauce_qty) VALUES (:create, :bread_id, :bread_qty, :meat_id, :meat_qty, :cheese_id, :cheese_qty, :vegetable_id, :vegetable_qty, :sauce_id, :sauce_qty)");
      $sql->bindParam(':create', $userid);
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
		if ($sql->execute()) {
			echo "New sandwich created successfully";
		} else {
			print_r($sql->errorInfo());
		}
    	
	 } catch (PDOException $e) {
		echo "Error: " . $e;
	 }
	}
?>
