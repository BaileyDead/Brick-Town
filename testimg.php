<?php
  ini_set('display_errors', 1); 
  ini_set('display_startup_errors', 1); 
  error_reporting(E_ALL);
  try {

    $conn = new PDO("mysql:host=mysql.ct8.pl;dbname=m30838_bricktown", 'm30838_bricktown','Vxzs~qxs2S/H81g5-5^001fu5erqKk');

   }

  // include($_SERVER['DOCUMENT_ROOT'].'/MISC/trueconnect.php');
  $targetFolder = '/CDN/ITEMS/';
  $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
  $bg = $targetPath . 'CharacterBG.png';
  $avatar = $targetPath . 'Avatar.png';
  $renderbr = imagecreatefrompng($bg);
  $renderav = imagecreatefrompng($avatar);
  header("Content-type: image/png");
  imagepng($renderav);
?>









