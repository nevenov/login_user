<?php 

require("init.php");


if (isset($_POST['user_email'])) {


	$email = $database->escape_string($_POST['user_email']);
	$user_id = $database->escape_string($_POST['user_id']);

	$sql = "SELECT * FROM profiles WHERE user_id != {$user_id} AND email = '{$email}' ";
	$result_set = $database->query($sql);

	if (mysqli_num_rows($result_set) > 0) {

		echo "<div class='alert alert-danger'>User with same email address already exist!</div>";
		
	} else {

		echo "submit";
	}

}

?>