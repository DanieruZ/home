<?php
 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	
require_once "Config/Autoload.php";
require_once "Config/Config.php";
require_once "Config/Router.php";
require_once "Utils/Utils.php";

use Config\Autoload as Autoload;
use Config\Config as Config;
use Config\Router as Router;
use Utils\Utils as Utils;

Autoload::Start();

session_start();

require_once(VIEWS_PATH."head.php");

$controller = $_GET['controller'] ?? 'Home';
$action = $_GET['action'] ?? 'Index';

Router::Route($controller, $action);

require_once(VIEWS_PATH."footer.php");

?>