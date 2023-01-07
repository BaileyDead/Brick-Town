<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
    $conn = new PDO("mysql:host=mysql.ct8.pl;dbname=m30838_bricktown", 'm30838_bricktown','Vxzs~qxs2S/H81g5-5^001fu5erqKk');
header("Content-Type: image/png");
$id = $_GET['id'];
if($_GET['id']){
$getUser = $conn->prepare("SELECT * FROM Users WHERE id=:id");
$getUser->bindParam(':id', $id, PDO::PARAM_INT);
$getUser->execute();
} $avatar = $getUser->fetch(PDO::FETCH_OBJ);


$Body = $avatar->package;
if (empty($Body)) {
$Body = "Avatar.png";
}


$pants = $avatar->pants;
if (empty($pants)) {
$pants = "CharacterBG.png";
}

$shirt = $avatar->shirt;
if (empty($shirt)) {
$shirt = "CharacterBG.png";
}

$hat = $avatar->hat;
if (empty($hat)) {
$hat = "CharacterBG.png";
}

$accessory = $avatar->accessory;
if (empty($accessory)) {
$accessory = "CharacterBG.png";
}

$hair = $avatar->hair;
if (empty($hair)) {
$hair = "CharacterBG.png";
}


$face = $avatar->face;
if (empty($face)) {
$face = "face.png";
}

$tool = $avatar->tool;
if (empty($tool)) {
$tool = "CharacterBG.png";
}

$mask = $avatar->mask;
if (empty($mask)) {
$mask = "CharacterBG.png";
}

$headcolor = $avatar->headcolor;
if (empty($headcolor)) {
$headcolor = "CharacterBG";
}
$torsocolor = $avatar->torsocolor;
if (empty($torsocolor)) {
$torsocolor = "CharacterBG";
}


$leftarmcolor = $avatar->leftarmcolor;
if (empty($leftarmcolor)) {
$leftarmcolor = "CharacterBG";
}

$rightarmcolor = $avatar->rightarmcolor;
if (empty($rightarmcolor)) {
$rightarmcolor = "CharacterBG";
}

$leftlegcolor = $avatar->leftlegcolor;
if (empty($leftlegcolor)) {
$leftlegcolor = "CharacterBG";
}

$rightlegcolor = $avatar->rightlegcolor;
if (empty($rightlegcolor)) {
$rightlegcolor = "CharacterBG";
}

class StackImage
{
  private $image;
  private $width;
  private $height;
  
  public function __construct($Path)
  {
    if(!isset($Path) || !file_exists($Path))
      return;
    $this->image = imagecreatefrompng($Path);
    imagesavealpha($this->image, true);
    imagealphablending($this->image, true);
    $this->width = imagesx($this->image);
    $this->height = imagesy($this->image);
  }
  
  public function AddLayer($Path)
  {
    if(!isset($Path) || !file_exists($Path))
      return;
    $new = imagecreatefrompng($Path);
    imagesavealpha($new, true);
    imagealphablending($new, true);
    imagecopy($this->image, $new, 0, 0, 0, 0, imagesx($new), imagesy($new));
  }
  
  public function Output($type = "image/png")
  {
    //header("Content-Type: {$type}");
    imagepng($this->image);
    imagedestroy($this->image);
  }
  
  public function GetWidth()
  {
    return $this->width;
  }
  
  public function GetHeight()
  {
    return $this->height;
  }
}
$Image = new StackImage($_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/CharacterBG.png");
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/".$Body);

$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/COLORS/".$headcolor);
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/COLORS/".$torsocolor);
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/COLORS/".$leftarmcolor);
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/COLORS/".$rightarmcolor);
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/COLORS/".$leftlegcolor);
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/COLORS/".$rightlegcolor);

$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/".$face);
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/".$mask);
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/".$pants);
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/".$shirt);
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/".$accessory);
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/".$hair);
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/".$hat);
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/".$tool);
$Image->Output();
?>










