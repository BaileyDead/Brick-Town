<?php
$name='Ban User';
include("../header.php");
if ($myu->admin=="true") {
$id = $_GET['id'];

$banuser = $conn->prepare("UPDATE Users SET face=NULL,face='Avatar.png',shirt=NULL,pants=NULL,hat=NULL,tool=NULL,accessory=NULL,hair=NULL,mask=NULL WHERE id=:id");
$banuser->bindParam(':id', $id, PDO::PARAM_INT);
$banuser->execute();
header("Location: /Users/user.php?id=".$id);

}else{
header("Location: /Dashboard/");
}
?>