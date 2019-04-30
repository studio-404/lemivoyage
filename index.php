<?php
ini_set('post_max_size', '5120M');
ini_set('upload_max_filesize', '5120M');
ini_set('memory_limit', '5120M');
ini_set('display_errors', 0);
ini_set('session.cookie_httponly', 1);
date_default_timezone_set('Asia/Tbilisi');
error_reporting(0); 

session_name("lemivoyage");
session_start();

header('X-Frame-Options: DENY');
header("Content-type: text/html; charset=utf-8");

if($_SERVER["REMOTE_ADDR"]!="94.240.245.46"){
	exit(file_get_contents("under.html"));
}

try{
	if(preg_match('/www/', $_SERVER['HTTP_HOST'])){ 
	  require_once 'app/core/Config.php';
	  require_once 'app/functions/redirect.php';
	  functions\redirect::url(Config::WEBSITE);
	}
	require_once 'app/init.php';
	$app = new App;
}catch(Exception $e){
	die("Error");
}
?>