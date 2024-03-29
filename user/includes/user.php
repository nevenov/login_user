<?php 


class User extends Db_object {


	protected static $db_table = "users";
	protected static $db_table_fields = array("username", "password");
	public $id;
	public $username;
	public $password;



	public static function verify_user($username, $password) {
		global $database;

		$username = $database->escape_string($username);
		$password = $database->escape_string($password);

		$sql = "SELECT * FROM " . self::$db_table . " WHERE ";
		$sql .= "`username` = '{$username}' AND ";
		$sql .= "`password` = '{$password}' ";
		$sql .= "LIMIT 1";

		$the_result_array = self::find_by_query($sql);	

		return !empty($the_result_array) ? array_shift($the_result_array) : false;

	}


} // End of Class User




