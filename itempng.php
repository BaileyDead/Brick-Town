<?php
  
  $conn = new PDO("mysql:host=mysql.ct8.pl;dbname=m30838_bricktown", 'm30838_bricktown','Vxzs~qxs2S/H81g5-5^001fu5erqKk');
  
if($_GET['id']){
$id = $_GET['id'];
$getUser = $conn->prepare("SELECT * FROM Market WHERE id=:id");
$getUser->bindParam(':id', $id, PDO::PARAM_INT);
$getUser->execute();
} $item = $getUser->fetch(PDO::FETCH_OBJ);

$items = $item->renderimg;
if (empty($items)) {
$items = "CharacterBG.png";
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
    header("Content-Type: {$type}");
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
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/Avatar.png");
$Image->AddLayer($_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/".$items);
$Image->Output();
?>

