<?php

$dir = defined('__DIR__') ? __DIR__ : dirname(__FILE__);

//AUTOLOAD
require_once $dir."/rbit_nike_plus.class.php";
require_once $dir."/rbit_nike_plus_config.class.php";
require_once $dir."/rbit_nike_plus_filter.class.php";
require_once $dir."/rbit_nike_plus_admin.class.php";

require_once $dir."/../lib/Twig/Autoloader.php";

Twig_Autoloader::register();

