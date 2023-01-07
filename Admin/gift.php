<?php
$name='Gift';
include("../header.php");
?>
<?php
if ($myu->admin=="true") {
?>
<div class="card">

<div class="center">
<h1> Gift item</h1>
<div style="height:6px;"></div>
<form method="post">
<input type="number" name="userid" class="center" placeholder="User ID">
<div style="height:2px;"></div>
<input type="number" name="itemid" class="center" placeholder="Item ID"> 
<div style="height:2px;"></div>
<input type="submit" name="submit" class="formbutton center" value="Update">
</form>
</div>
</div>

<?php
if ($_POST['submit']){
$hi = $conn->prepare("INSERT INTO Inventory (user,item) VALUES (:userid, :itemid)");
$hi->bindParam(':userid', $_POST["userid"], PDO::PARAM_INT);
$hi->bindParam(':itemid', $_POST["itemid"], PDO::PARAM_INT);
$hi->execute();
echo 'Gifted!';
}
?>
<?php
}else{
header("Location: /Market/");
}
?>