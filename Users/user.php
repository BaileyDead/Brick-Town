<?php
$name=$iT->name;
include("../header.php");
$id=$_GET['id'];
$userr = $conn->prepare("SELECT * FROM Users WHERE id=:id");
$userr->bindParam(':id',$id, PDO::PARAM_INT);
$userr->execute();
$iT = $userr->fetch(PDO::FETCH_OBJ);

if(!$iT) {
header('Location: /Users/');
exit();
}


?>
<title>BrickTown - <?php echo htmlspecialchars($iT->username); ?> </title>
<?php
if ($user){
?>
<script>
document.title = "<?php echo htmlspecialchars($iT->username);?> - BrickTown"
</script>
<h2>
  <?php echo htmlspecialchars($iT->username);?>
</h2>
<div class="columns">
  <div class="column is-one-third">
    <div class="card mb-2">
      <div class="card-image">
        <figure class="image is-4byb">
          <img src="/avatar.php?id=<?php echo htmlspecialchars($iT->id);?>" alt="Placeholder image">
        </figure>
        <br>
      </div>
    </div>
    
<?php
if ($user) {
  if ($iT->id != $myu->id) {
?>
    <a href="/Users/message.php?id=<?php echo $iT->id; ?>" class="button is-link mb-2" style="border-radius: 5px; width: 100%;">Message</a>
<?php 
  }
  if ($myu->admin=="true") {
  ?>
    <a href="/Admin/ban.php?id=<?php echo $iT->id; ?>" class="button is-danger mb-2" style="border-radius: 5px; width: 100%;">Ban User</a>
  <?php
  }
} 
?>
    
  </div>
  <div class="column">
    
    <div class="card">
      <div class="card-content">
        <div class="content">
          <i class="fa-solid fa-quote-left"></i> <?=htmlspecialchars($iT->status)?> <i class="fa-solid fa-quote-right"></i>
        </div>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-content">
        <div class="content">
<div class="columns" style="text-align: center;">
  <div class="column"><b><h4 class="title is-5 mb-0" style="color: white;"><?=$iT->forumposts?></h4><span style="color: grey;">Forum Posts</span></b></div>
  <div class="column"><b><h4 class="title is-5 mb-0" style="color: white;"><?php if($iT->admin == "true") { echo "YES"; } else { echo "NO"; } ?></h4><span style="color: grey;">Admin</span></b></div>
  <div class="column"><b><h4 class="title is-5 mb-0" style="color: white;"><?echo (date("d.m.Y",$iT->datecreated)); ?></h4><span style="color: grey;">Creation Date</span></b></div>
</div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php }else{
header("Location: /Login/");
} ?> 

<?php
include("../footer.php");
?>