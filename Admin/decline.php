<?php include "../header.php"; ?>
<?php if ($myu->admin=="true"){ ?>

<?php
$id = $_GET['id'];
$getshits = $conn->prepare("SELECT * FROM Market where id=:id");
$getshits->bindParam(':id', $id, PDO::PARAM_INT);
$getshits->execute();
$gs = $getshits->fetch(PDO::FETCH_OBJ);

if($gs->approved=="0"){
if($getshits->rowCount()) {
$hi = $conn->prepare("DELETE FROM Market WHERE id=:id");
$hi->bindParam('id', $id, PDO::PARAM_INT);
$hi->execute();
$sendmessage = $conn->prepare("INSERT INTO Messages (sender, user, title, message, postdate) VALUES (1, :creator, 'Item Declined', 'Your item has been declined!', $time)");
$sendmessage->bindParam(':creator', $cQ->id, PDO::PARAM_INT);
$sendmessage->execute();
header("Location: /Admin/");
}
}else{
echo'fuckoff';
}
}
?>
