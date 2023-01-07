<? include "../header.php";
if ($user){
$money=$myu->cubes;
$id=$_GET['id'];
$item = $conn->prepare("SELECT * FROM Market WHERE id=:id");
$item->bindParam(':id', $id, PDO::PARAM_INT);
$item->execute();
$gB = $item->fetch(PDO::FETCH_OBJ);
$owncheck = $conn->prepare("SELECT * FROM Inventory WHERE (user,item) = (:userid,:itemid)");
$owncheck->bindParam(':userid', $myu->id, PDO::PARAM_INT);
$owncheck->bindParam(':itemid', $id, PDO::PARAM_INT);
$owncheck->execute();
// print_r($owncheck->errorInfo()); 
if (!$owncheck->rowCount() > 0){ 
if ($gB->onsale == 1){
if ($gB->approved == 1){
if ($money >= $gB->price){
$new = ($money - $gB->price);
$give = (0 + $gB->price);

if ($gB->limited == 0){
$pay = $conn->prepare("UPDATE Users SET `cubes`='$new' WHERE id='$myu->id'");
$pay->execute();
$pay1 = $conn->prepare("UPDATE Users SET `cubes`=cubes+$gB->price WHERE username='$gB->creator'");
$pay1->execute();
$succ = $conn->prepare("INSERT INTO Inventory (item,user) VALUES (:id,$myu->id)");
$succ->bindParam(':id', $id, PDO::PARAM_INT);
$succ->execute();
}

if ($gB->limited == 1) {
if ($gB->amount >= 1) {
$pay = $conn->prepare("UPDATE Users SET `cubes`='$new' WHERE id='$myu->id'");
$pay->execute();
$pay1 = $conn->prepare("UPDATE Users SET `cubes`=cubes+$gB->price WHERE username='$gB->creator'");
$pay1->execute();
$succ = $conn->prepare("INSERT INTO Inventory (item,user) VALUES (:id,$myu->id)");
$succ->bindParam(':id', $id, PDO::PARAM_INT);
$succ->execute();
$removeamount = $conn->prepare("UPDATE Market SET amount=amount-1 WHERE id=:id");
$removeamount->bindParam(':id', $id, PDO::PARAM_INT);
$removeamount->execute(); 
} else {
  echo 'sold out';
  exit();
}
}



header("Location: /Customize/");
// print_r($succ->errorInfo()); 
}else {
    echo'too poor';
}
}else{
    echo'item not approved';
}
}else {
    echo'item not onsale';
}
}else {
    echo'u already own it';
}
}
