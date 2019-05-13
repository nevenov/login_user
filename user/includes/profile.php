<?php 


class Profile extends Db_object {


	protected static $db_table = "profiles";
	protected static $db_table_fields = array("id", "user_id", "first_name", "last_name", "email", "date_birth", "address", "user_image");
	public $id;
	public $user_id;
	public $first_name;
	public $last_name;
	public $email;
	public $date_birth;
	public $address;
	public $user_image;
	public $upload_directory = "images";
	public $image_placeholder = "https://via.placeholder.com/400?text=image";


	public static function find_by_user_id($user_id) {
		global $database;
		$the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE user_id=".$user_id." LIMIT 1"); 

		return !empty($the_result_array) ? array_shift($the_result_array) : false;

	}



	public function upload_photo() {

		if (!empty($this->errors)) {
			return false;
		}

		if (empty($this->user_image) || empty($this->tmp_path)) {
			$this->errors[] = "The file was not available.";
			return false;
		}


		$target_path = SITE_ROOT . DS . 'user' . DS . $this->upload_directory . DS . $this->user_image;

		if (file_exists($target_path)) {
		 	$this->errors[] = "The file {$this->user_image} already exist.";
		 	return false;
		 } 


		 if (move_uploaded_file($this->tmp_path, $target_path)) {

		 		unset($this->tmp_path);
		 		return true;

		 } else {

		 	$this->errors[] = "The file directory probably does not have file permissions.";
		 	return false;

		 }


	} // End save method




	public function image_path_and_placeholder() {

		return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory .DS.$this->user_image;
	}




	public function delete_photo() {
			
		$target_path = SITE_ROOT . DS .'user'. DS . $this->upload_directory . DS . $this->user_image;			

		return  unlink($target_path) ? true : false ;

	}


} // End of Class User




