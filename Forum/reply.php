<?php
$name = 'Reply';
include("../header.php");
$id = $_GET['id'];
?>
<?php
if ($user) {
?>
<?php
$threadfetch = $conn->prepare("SELECT * FROM Threads WHERE id=:id");
$threadfetch->bindParam(':id', $id, PDO::PARAM_INT);
$threadfetch->execute();
$thread = $threadfetch->fetch(PDO::FETCH_OBJ);

// print_r($threadfetch->errorInfo()); 
?>
<?php
if ($threadfetch->rowCount() > 0) {
if ($thread->locked=="0") {
?>
<div class="columns">
<div class="column">
<div class="card">
<div class="card-content">

<h1 class="title is-4 mb-1">Reply</h1>
<br>
<form method="post" enctype="multipart/form-data">
<textarea name="reply" class="textarea input" rows="3" placeholder="Body"></textarea>
<div class="g-recaptcha brochure__form__captcha" data-sitekey="6LfYkcMhAAAAALRRnevLdejPlX2ahGc5z0ImImQf"></div>
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
$post = ProfanityFilter($_POST['reply']);
$reply = $conn->prepare("INSERT INTO Replies (post, poster, thread) VALUES (:post, '$myu->username', :id)");
$reply->bindParam(':post', $post, PDO::PARAM_STR);
$reply->bindParam(':id', $id, PDO::PARAM_INT);
$reply->execute();

$givefposts = $conn->prepare("UPDATE Users SET `forumposts`= forumposts+1 WHERE id=:id");
$givefposts->bindParam(':id', $myu->id, PDO::PARAM_INT);
$givefposts->execute();
 header("Location: /Forum/thread.php?id=".$id);
}
}
?>
<?php
}else{
header("Location: /Forum/");
}
}else{
header("Location: /Forum/");
}
?>
<? } ?> 

<?php
include("../footer.php");
?>




