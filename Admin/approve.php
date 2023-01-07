<?php include "../header.php"; ?>
<?php if ($myu->admin=="true"){ ?>

<?php
$id = $_GET['id'];
$getshits = $conn->prepare("SELECT * FROM Market where id=:id");
$getshits->bindParam(':id', $id, PDO::PARAM_INT);
$getshits->execute();
$gs = $getshits->fetch(PDO::FETCH_OBJ);

if($gs->approved=="0") {
$hi = $conn->prepare("UPDATE Market SET `approved`=1 WHERE id=:id");
$hi->bindParam('id', $id, PDO::PARAM_INT);
$hi->execute();
$creator = $conn->prepare("SELECT * FROM Users WHERE username=:username");
$creator->bindParam(':username', $gs->creator, PDO::PARAM_STR);
$creator->execute();
$cQ = $creator->fetch(PDO::FETCH_OBJ);
$itemgive = $conn->prepare("INSERT INTO Inventory (user, item) VALUES (:creator, :id)");
$itemgive->bindParam(':creator', $cQ->id, PDO::PARAM_INT);
$itemgive->bindParam(':id', $id, PDO::PARAM_INT);
$itemgive->execute();
$sendmessage = $conn->prepare("INSERT INTO Messages (sender, user, title, message, postdate) VALUES (1, :creator, 'Item Approved', 'Your item has been approved!', $time)");
$sendmessage->bindParam(':creator', $cQ->id, PDO::PARAM_INT);
$sendmessage->execute();

header("Location: /Market/item.php?id=".$id);
}else{
header("Location: /Dashboard/");
}
}
?>
