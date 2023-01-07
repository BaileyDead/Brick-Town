<?php
$name = 'Forum';
include("../header.php");
?>
<?php
$forumfetch = $conn->prepare("SELECT * FROM Forum ORDER BY id ASC");
$forumfetch->execute();
?>

<div class="card">
<header class="card-header">
<p class="card-header-title">
BrickTown Forums
</p>
</header>
<?php
foreach($forumfetch as $fF) {
?>
<a href="/topic/<?php echo $fF['id']; ?>" style="color:white;">
<div class="card-content">
<div class="content">
<text class="title is-4 mb-1"> <?php echo htmlspecialchars($fF['name']);  ?> </text>
<div style="height:1px;"></div>
<?php echo htmlspecialchars($fF['description']);  ?>
</div>
</div>

</a>

<?php
}
?>
</div>
</div>

<?php
include("../footer.php");
?>
