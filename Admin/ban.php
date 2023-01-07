<?php
$name='Ban User';
include("../header.php");
if ($myu->admin=="true") {
$id = $_GET['id'];

$getuser = $conn->prepare("SELECT * FROM Users WHERE id=:id");
$getuser->bindParam(':id', $id, PDO::PARAM_INT);
$getuser->execute();
$gU = $getuser->fetch(PDO::FETCH_OBJ);
?>

<div class="card">
  <div class="card-content">
    <div class="content">
      <form method="post" enctype="multipart/form-data">
        <div class="field has-addons">
          <div class="control" style="width: 100%;">
            <input name="reason" class="input" type="text" placeholder="What's the reason?">
          </div>
          <div class="control">
            <button type="submit" name="submit" style="border-radius: .25rem; border-top-left-radius:0px; border-bottom-left-radius:0px;" class="button is-info">
Ban User
</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
if (isset($_POST['submit'])) {
if ($gU->admin=="true") {
echo 'cant ban an admin';
exit();
}
if ($_POST['reason'] == NULL) {
echo 'u cant ban for no reason lol, its not brickhill';
exit();
}

$banuser = $conn->prepare("UPDATE Users SET Banned=1,banreason=:text WHERE id=:id");
$banuser->bindParam(':text', $_POST['reason'], PDO::PARAM_STR);
$banuser->bindParam(':id', $id, PDO::PARAM_INT);
$banuser->execute();
}
}else{
header("Location: /Dashboard/");
}
?>