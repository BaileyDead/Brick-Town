<?php
  try {

    $conn = new PDO("mysql:host=mysql.ct8.pl;dbname=m30838_bricktown", 'm30838_bricktown','Vxzs~qxs2S/H81g5-5^001fu5erqKk');

   }
$targetFolder = '/CDN/ITEMS/';
$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;

 $id = $_GET['id'];
 $getUser = $conn->prepare("SELECT * FROM Users WHERE id=:id");
 $getUser->bindParam(':id', $id, PDO::PARAM_INT);
 $getUser->execute();
 $avatar = $getUser->fetch(PDO::FETCH_OBJ);

$bg = "CharacterBG.png";
$package = $avatar->package;
if (empty($package)) {
$Body = "Avatar.png";
}


$hat = $avatar->hat;
if (empty($hat)) {
$hat = "CharacterBG.png";
}
 
$shirt = $avatar->shirt;
if (empty($shirt)) {
$shirt = "CharacterBG.png";
}

$pants = $avatar->pants;
if (empty($pants)) {
$pants = "CharacterBG.png";
}

$face = $avatar->face;
if (empty($face)) {
$face = "CharacterBG.png";
}

$hair = $avatar->hair;
if (empty($hair)) {
$hair = "CharacterBG.png";
}

$tool = $avatar->tool;
if (empty($tool)) {
$tool = "CharacterBG.png";
}

$outputImage = imagecreatefrompng($targetPath . $bg);

$renderpackage = imagecreatefrompng($targetPath . $package);
$renderface = imagecreatefrompng($targetPath . $face);
$renderhair = imagecreatefrompng($targetPath . $hair);
$renderhat = imagecreatefrompng($targetPath . $hat);
$rendershirt = imagecreatefrompng($targetPath . $shirt);
$renderpants = imagecreatefrompng($targetPath . $pants);
$rendertool = imagecreatefrompng($targetPath . $tool);

$transparent = imagecolorallocatealpha($outputImage, 0, 0, 0, 127);

imagecolortransparent($outputImage, $transparent);
imagefill($outputImage, 0, 0, $transparent);

imagesavealpha($outputImage, true);
?>




