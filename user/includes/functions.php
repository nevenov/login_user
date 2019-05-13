<?php  


function classAutoLoader($class) {

	$class_lowcase = strtolower($class);

	$the_path = INCLUDES_PATH . DS . "{$class_lowcase}.php";

	if(is_file($the_path) && !class_exists($class)) {
		require_once($the_path);
	} else {
		die ("The file named {$the_path} was not found man...");
	}

}


spl_autoload_register('classAutoLoader');


function redirect($location) {

	header("Location: " . $location);

}

