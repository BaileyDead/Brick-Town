<?php include "../header.php"; ?>
<?php if ($myu->admin=="true"){ ?>

<?php
$id = $_GET['id'];
$getshits = $conn->prepare("SELECT * FROM Threads where id=:id");
$getshits->bindParam(':id', $id, PDO::PARAM_INT);
$getshits->execute();
$gs = $getshits->fetch(PDO::FETCH_OBJ);

$hi = $conn->prepare("UPDATE Threads SET `locked`=1 WHERE id=:id");
$hi->bindParam('id', $id, PDO::PARAM_INT);
$hi->execute();
header("Location: /Forum/");
}
?>
