<?php 

namespace Config;

define("ROOT", dirname(__DIR__). "/");
define("FRONT_ROOT", "/php/simple_crud_mvc_w3css_mysql/");
define("MODELS_PATH", "Models/");
define("VIEWS_PATH", "Views/");
define("RESOURCES_PATH", "Resources/");
define("CSS_PATH", FRONT_ROOT.RESOURCES_PATH . "css/");
define("JS_PATH", FRONT_ROOT.RESOURCES_PATH . "js/");
define("IMAGES_PATH", FRONT_ROOT.RESOURCES_PATH . "images/");
define("DB_HOST", "localhost");
define("DB_NAME", "store_online");
define("DB_USER", "root");
define("DB_PASS", "");
define("DSN", "mysql:host=".DB_HOST."; dbname=".DB_NAME);

?>