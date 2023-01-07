<?php
$name = 'Messages';
include("../header.php");

if($user){

if (isset($_GET["page"])) {
  $page = $_GET['page'];
  if (!is_numeric($page)) {
    header("Location: /Forum/");
  }
  if ($page <= 0) {
    $page = 1;
  }
} else {
  $page = 1;  
}

$limit = 5;
$offset = ($page - 1) * $limit;


$getmessages = $conn->prepare("SELECT * FROM Messages WHERE user=:sender ORDER BY id DESC LIMIT :limit OFFSET :offset");
$getmessages->bindParam(':sender', $myu->id, PDO::PARAM_INT);
$getmessages->bindParam(':limit', $limit, PDO::PARAM_INT);
$getmessages->bindParam(':offset', $offset, PDO::PARAM_INT);
$getmessages->execute();
$gM = $getmessages->fetchall();

$getmessageDATA = $conn->prepare("SELECT * FROM Messages WHERE user=:user ORDER BY id DESC LIMIT :limit OFFSET :offset");
$getmessageDATA->bindParam(':user', $myu->id, PDO::PARAM_INT);
$getmessageDATA->bindParam(':limit', $limit, PDO::PARAM_INT);
$getmessageDATA->bindParam(':offset', $offset, PDO::PARAM_INT);
$getmessageDATA->execute();
$messagedata = $getmessageDATA->fetch(PDO::FETCH_OBJ);


if (!$getmessages) {
echo'
<div class="alertred">
<div style="height:3px;"></div>
You have no messages!
<div style="height:3px;"></div>
</div>

';
exit();
}
?>
<?php
foreach ($gM as $message) {
$getsender1 = $conn->prepare("SELECT * FROM Users WHERE id=:id");
$getsender1->bindParam(':id', $message['sender'], PDO::PARAM_INT);
$getsender1->execute();
$sender1 = $getsender1->fetch(PDO::FETCH_OBJ);
?>
<div class="card">
<div class="card-content">
<h1 class="title is-4 mb-1"> <?php echo htmlspecialchars($message['title']);?> <?php if ($message['msgread']==0) { echo '<text style="color:red;">(!)</text>'; } ?> </h1>
<a class="button is-link" href="/Users/message.php?id=<?php echo $message['sender']; ?>">Respond</a>
<?php
if ($message['msgread']==0) {
?>
<a class="button is-link" href="/Messages/read.php?id=<?php echo $message['id']; ?>">Mark as read</a>
<?php
}
?>

<div class="columns">
<div class="column is-one-quarter has-text-centered"> 
<img src="/avatar.php?id=<?php echo htmlspecialchars($message['sender']); ?>"></img>
<?php echo htmlspecialchars($sender1->username); ?>
</div>


<div class="column"> 
<?php echo htmlspecialchars($message['message']);?>
</div>


</div> 

</div>

</div>
<br>

<?php
}
?>

<?php
}else{
header("Location: /Login/");
}
?>
<nav class="pagination is-centered" role="navigation" aria-label="pagination">
  <a href="/Messages/?page=<?php echo $page-1; ?>" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Previous</a>
  
    <a href="/Messages/?page=<?php echo $page+1; ?>" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Next Page</a>
</nav>


<?php
include("../footer.php");
?>


