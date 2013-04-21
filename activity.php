<?php

//retrieving activity

require_once dirname(__FILE__)."/cls/autoload.php";
header('Content-type: application/json');
$retval = Rbit_Nike_Plus::get_activities();

if ($retval === "") {
  echo $retval;
} else {
  header("HTTP/1.0 404 Not Found");
}
