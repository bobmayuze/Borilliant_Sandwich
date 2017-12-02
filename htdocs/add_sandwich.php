<?PHP
    header("Content-Type: text/html; charset=utf8");

    include('connect.php');//Conncet to the database

    // print_r($_POST);

    $comboJSON = $_POST['comboJSON'];//get user email
    $username = md5($_POST['username']);//get user password
    
    if ($comboJSON && $username){//if both email and password are not null
      echo "Adding sandwich...";
      $comboObj = json_decode($comboJSON);
      $bread_id = mysql_real_escape_string($comboObj->{'bread_id'});
      $bread_qty = mysql_real_escape_string($comboObj->{'bread_qty'});
      $meat_id = mysql_real_escape_string($comboObj->{'meat_id'});
      $meat_qty = mysql_real_escape_string($comboObj->{'meat_qty'});
      $cheese_id = mysql_real_escape_string($comboObj->{'cheese_id'});
      $cheese_qty = mysql_real_escape_string($comboObj->{'cheese_qty'});
      $vegetable_id = mysql_real_escape_string($comboObj->{'vegetable_id'});
      $vegetable_qty = mysql_real_escape_string($comboObj->{'vegetable_qty'});
      $sauce_id = mysql_real_escape_string($comboObj->{'sauce_id'});
      $sauce_qty = mysql_real_escape_string($comboObj->{'sauce_qty'});
      $sql = "INSERT INTO tbl_combos
      VALUES ('$username', $bread_id, $bread_qty, $meat_id, $meat_qty, $cheese_id, $cheese_id, $cheese_qty, $vegetable_id, $vegetable_qty, $sauce_id, $sauce_qty)";
     if ($conn->query($sql) === TRUE) {
    	echo "New sandwich created successfully";
	} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
	} 
    }

    mysql_close();//close connection
?>
