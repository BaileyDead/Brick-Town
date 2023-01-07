<?php
include("../header.php");
$id = $_GET['id'];
$page = $_GET['page'];
if ($user) {
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
$forumfetch = $conn->prepare("SELECT * FROM Threads WHERE topic=:id ORDER BY id DESC LIMIT :limit OFFSET :offset");
$forumfetch->bindParam(':id', $id, PDO::PARAM_INT);
$forumfetch->bindParam(':offset', $offset, PDO::PARAM_INT);
$forumfetch->bindParam(':limit', $limit, PDO::PARAM_INT);
$forumfetch->execute();
$forumFETC = $forumfetch->fetchAll();
?>
<?php 
$topicfetch = $conn->prepare("SELECT * FROM Forum WHERE id=:id");
$topicfetch->bindParam(':id', $id, PDO::PARAM_INT);
$topicfetch->execute();
$topic = $topicfetch->fetch(PDO::FETCH_OBJ);
if(!$topicfetch->rowCount() > 0) {
header('location: /Forum/');
exit();
}
?>
<title>BrickTown - <?php echo htmlspecialchars($topic->name); ?> </title>
<?php
if ($user){
if ($topic->adminonly=="0"){  
?>
<nav class="pagination is-centered" role="navigation" aria-label="pagination">
<a class="pagination-previous is-current" style="background-color: #1E1E1E; border: 0px solid; border-radius: 5px; color: white;" href="/Forum/post.php?id=<?php echo $id; ?>">Post</a>
</nav>
<?php
}
}
?>

<?php
if ($topic->adminonly=="1"){ 
if ($myu->admin=="true"){ 
?>
<nav class="pagination is-centered" role="navigation" aria-label="pagination">
<a class="pagination-previous is-current" style="background-color: #1E1E1E; border: 0px solid; border-radius: 5px; color: white;" href="/Forum/postadmin.php?id=<?php echo $id; ?>">Post</a>
</nav>
<?php
}
}
?>

<div class="card">
<header class="card-header">
<p class="card-header-title">
BrickTown Forums
</p>
</header>
<div class="card">

<?php
foreach($forumFETC as $fF) {
?>
<a href="/thread/<?php echo $fF['id']; ?>" style="color:white;">
<div class="card-content">
<div class="content">

<text class="title is-4 mb-3"> <?php echo htmlspecialchars($fF['head']);  ?> </text>
<div style="height:1px;"></div>
By: <?php echo htmlspecialchars($fF['poster']);  ?>
</div>
</div>

</a>
<?php
}
?>
</div>
</div>

<nav class="pagination is-centered" role="navigation" aria-label="pagination">
  <a href="/Forum/topic.php?id=<?php echo $id; ?>&page=<?php echo $page-1; ?>" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Previous</a>
  
    <a href="/Forum/topic.php?id=<?php echo $id; ?>&page=<?php echo $page+1; ?>" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Next Page</a>
</nav>

<?php
}else{
header("Location: /Register/");
}
?>
<?php
include("../footer.php");
?>
