<?php
include("../header.php");

if ($user) {
$id = $_GET['id'];

$messageselect = $conn->prepare("SELECT * FROM Messages WHERE (user, msgread) = ($myu->id, 0)");
$messageselect->execute();

if ($messageselect->rowCount() > 0) {

$messageread = $conn->prepare("UPDATE Messages SET msgread=1 WHERE (id, user) = (:msgid, $myu->id)");
$messageread->bindParam(':msgid', $id, PDO::PARAM_INT);
$messageread->execute();
header("Location: /Messages/");
}else{
echo 'no';
}

}else{
header("Location: /Messages/");
}