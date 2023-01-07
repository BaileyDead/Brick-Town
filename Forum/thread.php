<?php
include("../header.php");
$id = $_GET['id'];
?>
<?php
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

$threadfetch = $conn->prepare("SELECT * FROM Threads WHERE id=:id");
$threadfetch->bindParam(':id', $id, PDO::PARAM_INT);
$threadfetch->execute();
$threadd = $threadfetch->fetchAll();

$replyfetch = $conn->prepare("SELECT * FROM Replies WHERE thread=:id ORDER BY id ASC LIMIT :limit OFFSET :offset");
$replyfetch->bindParam(':id', $id, PDO::PARAM_INT);
$replyfetch->bindParam(':offset', $offset, PDO::PARAM_INT);
$replyfetch->bindParam(':limit', $limit, PDO::PARAM_INT);
$replyfetch->execute();
$replyy = $replyfetch->fetchAll();

$replyuser = $conn->prepare("SELECT * FROM Replies WHERE thread=:id");
$replyuser->bindParam(':id', $id, PDO::PARAM_INT);
$replyuser->execute();
$rQ = $replyuser->fetch(PDO::FETCH_OBJ);

$threaduser = $conn->prepare("SELECT * FROM Threads WHERE id=:id");
$threaduser->bindParam(':id', $id, PDO::PARAM_INT);
$threaduser->execute();
$tQ = $threaduser->fetch(PDO::FETCH_OBJ);

$poster = $tQ->poster;
$replier = $rQ->poster;

$getuser = $conn->prepare("SELECT * FROM Users WHERE username=:username");
$getuser->bindParam(':username', $poster, PDO::PARAM_STR);
$getuser->execute();
$iT = $getuser->fetch(PDO::FETCH_OBJ);

if(!$threadd) {
header("Location: /Forum/");
exit();
}
?>

<div class="card">
<header class="card-header">
<p class="card-header-title">
BrickTown Forums
</p>
</header>
<?php
foreach($threadd as $thread) {
?>
<title>BrickTown - <?php echo htmlspecialchars($thread['head']); ?> </title>
<div class="card">
<div style="height:5px;"></div>
<?php
if ($user){ 
if ($thread['locked']=="0") {
?>
<a style="border-radius: 5px;" class="button is-link" href="/Forum/reply.php?id=<?php echo $thread['id']; ?>">Post</a>
<?php
}
}
?>
<?php
if ($myu->admin=="true"){
?>
<a class="button is-link" href="/Admin/lockpost.php?id=<?php echo $thread['id']; ?>">Lock</a>
<a class="button is-link" href="/Admin/unlockpost.php?id=<?php echo $thread['id']; ?>">Unlock</a>

<?php
}
?>
<div class="card">
<div class="card-content">
<h1 class="title is-4 mb-3"><?php echo htmlspecialchars($thread['head']); ?></h1>  
<div class="columns">
<div class="column is-one-quarter has-text-centered" style="color:white"> 

<img src="/avatar.php?id=<?php echo htmlspecialchars($iT->id);?>"></img>
<p><b><a style="color:white" href="/Users/user.php?id=<?php echo $iT->id; ?>"> <?php   echo htmlspecialchars($thread['poster']);?> </a></b> </p>
</div>
<div style="height:1px;"></div>
<div class="column"> 
<?php echo htmlspecialchars($thread['body']);?>
</div>

</div>
</div>
</div>
<? } ?>

<?php
foreach($replyy as $reply) {
$getreplier = $conn->prepare("SELECT * FROM Users WHERE username=:username");
$getreplier->bindParam(':username', $reply['poster'], PDO::PARAM_STR);
$getreplier->execute();
$rT = $getreplier->fetch(PDO::FETCH_OBJ);

?>
<div class="card">
<div class="card-content">
<div class="columns">
<div class="column is-one-quarter has-text-centered"> 
 
<img src="/avatar.php?id=<?php echo htmlspecialchars($rT->id); ?>"></img>
<p><b><a style="color:white" href="/Users/user.php?id=<?php echo $rT->id; ?>"> <?php echo htmlspecialchars($reply['poster']);?> </a></b></p>
</div>
<div class="column"> 
<?php echo htmlspecialchars($reply['post']);?>
</div>

</div> 
</div>
</div>
<? } ?>
</div>
</div>

<nav class="pagination is-centered" role="navigation" aria-label="pagination">
  <a href="/Forum/thread.php?id=<?php echo $id; ?>&page=<?php echo $page-1; ?>" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Previous</a>
  
    <a href="/Forum/thread.php?id=<?php echo $id; ?>&page=<?php echo $page+1; ?>" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Next Page</a>
</nav>

<?php
include("../footer.php");
?>

