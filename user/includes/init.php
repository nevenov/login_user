<?php


defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// please define your project root
defined('SITE_ROOT') ? null : define('SITE_ROOT', 'home' . DS . 'server' . DS . 'public_html' . DS . 'login_user');


defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT. DS . 'user' . DS . 'includes');


require_once(INCLUDES_PATH.DS."functions.php");
require_once(INCLUDES_PATH.DS."new_config.php");
require_once(INCLUDES_PATH.DS."database.php");
require_once(INCLUDES_PATH.DS."db_object.php");
require_once(INCLUDES_PATH.DS."user.php");
require_once(INCLUDES_PATH.DS."profile.php");
require_once(INCLUDES_PATH.DS."session.php");




