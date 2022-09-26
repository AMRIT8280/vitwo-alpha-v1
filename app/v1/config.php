<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

$PROJECT_MODE=""; //LIVE OR LOCAL (IF YOU SET NOTHING THEN SYSTEM WILL AUTO DETECT THE MODE)

if($PROJECT_MODE=="" && in_array($_SERVER['HTTP_HOST'],["localhost","127.0.0.1"])){
  $PROJECT_MODE="LOCAL";
}else{
  $PROJECT_MODE="LIVE";
}
//hello amrit
if($PROJECT_MODE=="LIVE"){
  //for live
  $hostName = "localhost";
  $userName = "tennijop_livescore_tennisworldxi";
  $databasePass = "eh&n_ej;%PLZ";
  $databaseName="tennijop_livescore_tennisworldxi";
  define("BASE_URL",$_SERVER['REQUEST_SCHEME'] . "://".$_SERVER['HTTP_HOST']."/");
}else{
  //for local
  $hostName = "localhost";
  $userName = "root";
  $databasePass = "";
  $databaseName="vitwo_alpha";
  define("BASE_URL",$_SERVER['REQUEST_SCHEME'] . "://".$_SERVER['HTTP_HOST']."/projects/vitwo-alpha/");
}
// Create connection
$dbCon = mysqli_connect($hostName, $userName, $databasePass, $databaseName);

// Check connection
if (!$dbCon) {
  die("Connection failed: " . mysqli_connect_error());
  exit();
}else{
  //change the time zone of phpmyadmin
	if(mysqli_query($dbCon,"SET time_zone='+5:30'")){
		//echo "changed time zone<br>";
	}else{
		echo "<p style='color:red'>Phpmyadmin time_zone not changed :(</p><br>";
	}
}

define("ADMIN_URL",BASE_URL."admin/");
define("COMPANY_URL",BASE_URL."company/");
define("BRANCH_URL",BASE_URL."branch/");
define("VENDOR_URL",BASE_URL."vendor/");
define("WEB_ADMIN_URL",BASE_URL."webmaster/");
?>
