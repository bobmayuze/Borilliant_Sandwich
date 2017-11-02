<?php 
if (!$_POST['input']) {
	$message = "Please fill out the form";
	echo "Hello Nameless";
	echo "<script type='text/javascript'>alert('$message');</script>";
	sleep(2);
	header("Location: http://localhost/dashboard"); /* Redirect browser */
	exit();
	echo "Hello Nameless";
}
else {
	echo "Hello ";	
	echo $_POST['input']; 
}
	

?>