<?php
$name = 'Post';
include("../header.php");
$id = $_GET['id'];
?>
<?php
if($id=="1") {
header("Location: /Forum/");
exit();
}

$topicfetch = $conn->prepare("SELECT * FROM Forum WHERE id=:id");
$topicfetch->bindParam(':id', $id, PDO::PARAM_INT);
$topicfetch->execute();
$topic = $topicfetch->fetch(PDO::FETCH_OBJ);

// print_r($topicfetch->errorInfo()); 
?>
<?php
if ($topicfetch->rowCount() > 0) {
?>
<div class="columns">
<div class="column">
<div class="card">
<div class="card-content">

<form method="post" enctype="multipart/form-data">
<h1 class="title is-4 mb-1">Post on forums!</h1>
<input type="text" class="input" name="head" id="name" placeholder="Head">
<div style="height:2px;"></div>
<textarea name="body" class="textarea input" rows="3" placeholder="Body"></textarea>
<div style="height:2px;"></div>
<div class="center">
<div class="g-recaptcha brochure__form__captcha" data-sitekey="6LfYkcMhAAAAALRRnevLdejPlX2ahGc5z0ImImQf"></div>
</div>
<div style="height:2px;"></div>
<input style="border-radius: 5px;" class="button is-link" type="submit" value="Post!" style="width: 128px;height: 50px;" name="submit">
</form>
</div>

</div>
</div>
</div>
<?php
if (isset($_POST['submit'])){
$recaptcha = $_POST['g-recaptcha-response'];
$res = reCaptcha($recaptcha);
if($res['success']){
$head = ProfanityFilter($_POST['head']);
$body = ProfanityFilter($_POST['body']);
if($head != null){
if($body != null){

$post = $conn->prepare("INSERT INTO Threads (head, body, poster, topic) VALUES (:head, :body, '$myu->username', :id)");
$post->bindParam(':head', $head, PDO::PARAM_STR);
$post->bindParam(':body', $body, PDO::PARAM_STR);
$post->bindParam(':id', $id, PDO::PARAM_STR);
$post->execute();
$givefposts = $conn->prepare("UPDATE Users SET `forumposts`=forumposts+1 WHERE id=:id");
$givefposts->bindParam(':id', $myu->id, PDO::PARAM_INT);
$givefposts->execute();
header("Location: /Forum/topic.php?id=".$id);
}
}
}
}
?>
<?php
}else{
echo 'no';
}
?> 

<?php
include("../footer.php");
?>

