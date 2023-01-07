<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$name='deez';
include "../header.php";
$id = $_GET['id'];
$item = $conn->prepare("SELECT * FROM Market WHERE id=:id");
$item->bindParam(':id',$id, PDO::PARAM_INT);
$item->execute();
$gI = $item->fetch(PDO::FETCH_OBJ);
$owncheck = $conn->prepare("SELECT * FROM Inventory WHERE (user,item) = (:userid,:itemid)");
$owncheck->bindParam(':userid', $myu->id, PDO::PARAM_INT);
$owncheck->bindParam(':itemid', $gI->id, PDO::PARAM_INT);
$owncheck->execute(); 

if ($owncheck->rowCount() > 0){

echo $gI->type;
echo $gI->renderimg;
$wear = $conn->prepare("UPDATE Users SET `$gI->type`=NULL WHERE id='$myu->id'");
$wear->bindParam(':type',$gI->type, PDO::PARAM_STR);
$wear->execute();
header("Location: /Customize/");
}else{
echo 'get fucked';
}
?>