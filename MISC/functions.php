<?php
function reCaptcha($recaptcha){
  $secret = "6LfYkcMhAAAAAJ96VIgfSFUhaPDjv4USi6h8l-1M";
  $ip = $_SERVER['REMOTE_ADDR'];

  $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);
  $url = "https://www.google.com/recaptcha/api/siteverify";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
  $data = curl_exec($ch);
  curl_close($ch);

  return json_decode($data, true);
}
?>
<?php
$maintenance = 0;
if ($maintenance == 1) {
   if (isset($_COOKIE['maintenance222'])) {
      if ($_COOKIE['maintenance222'] != "somepass") {
          header("Location: /Maintenance");
      }
   } 
   else {
       header("Location: /Maintenance");
   }
}




$time = time();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_name('bricktown');
session_start();
session_id();
ob_start();
date_default_timezone_set('America/New_York');
$user = $_SESSION['username'];
$encrypt = $_SESSION['hash'];
?>
<?php

$User = $conn->prepare("SELECT * FROM Users");
$usr = $User->fetch(PDO::FETCH_OBJ);
if ($user) {
$myusr = $conn->query("SELECT * FROM Users WHERE username='".$user."'");
$myu = $myusr->fetch(PDO::FETCH_OBJ);
}

if ($time > $myu->getcubes) {
$newcbs = $time + 86400;
if ($myu->elite == 0) {
$amounttoadd = 15;
}
elseif ($myu->elite == 1) {
$amounttoadd = 25;
}
$givecubes = $conn->prepare("UPDATE Users SET cubes=cubes + $amounttoadd WHERE id='$myu->id'");
$givecubes->execute();
$updatedate = $conn->prepare("UPDATE Users SET getcubes='$newcbs' WHERE id='$myu->id'");
$updatedate->execute();
}

?>