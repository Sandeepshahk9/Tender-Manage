<?php 

date_default_timezone_set('Asia/Calcutta'); 
setlocale(LC_MONETARY,"en_IN");

include('include/db_connection.php');
error_reporting(0);

set_time_limit(6000);

$todate=date('Y-m-d H:i:s');

if($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1') {
	define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT'].'/tender/');
} else {
	define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT'].'/');
}



?>