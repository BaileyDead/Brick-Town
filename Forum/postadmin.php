<?php
$name = 'Post';
include("../header.php");
?>
<?php
$topicfetch = $conn->prepare("SELECT * FROM Forum WHERE id=:id");
$topicfetch->bindParam(':id', $id, PDO::PARAM_INT);
$topicfetch->execute();
$topic = $topicfetch->fetch(PDO::FETCH_OBJ);

// print_r($topicfetch->errorInfo()); 
?>
<?php
if ($myu->admin=="true") {
?>
<div class="card">
<form method="post" enctype="multipart/form-data">
<h1>Post on forums!</h1>
<input type="text" class="center" name="head" id="name" placeholder="Head">
<div style="height:2px;"></div>
<textarea name="body" class="center" rows="3" placeholder="Body"></textarea>
<div style="height:2px;"></div>
<div class="center">
<div style="height:2px;"></div>
<input class="formbutton center" type="submit" value="Upload!" style="width: 128px;height: 50px;" name="submit">
</form>
</div>
<?php
if (isset($_POST['submit'])){
$head = ProfanityFilter($_POST['head']);
$body = ProfanityFilter($_POST['body']);

$post = $conn->prepare("INSERT INTO Threads (head, body, poster, topic) VALUES (:head, :body, '$myu->username', 1)");
$post->bindParam(':head', $head, PDO::PARAM_STR);
$post->bindParam(':body', $body, PDO::PARAM_STR);
$post->execute();
$givefposts = $conn->prepare("UPDATE Users SET `forumposts`=forumposts+1 WHERE id=:id");
$givefposts->bindParam(':id', $myu->id, PDO::PARAM_INT);
$givefposts->execute();
}
?>
<?php
}else{
header("Location: /Forum/");
}
?> 

<?php
include("../footer.php");
?>

