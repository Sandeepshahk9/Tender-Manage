<?php 

include('db_connection.php');
error_reporting(0);

set_time_limit(6000);

$todate=date('Y-m-d');

$superkey = 'sandeepshah';

$base_url="https://tendertm.com/";


if($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1') {
	define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT'].'/tender/');
} else {
	define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT'].'/');
}


?>