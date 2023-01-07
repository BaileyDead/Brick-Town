<?php
$name = 'Send Message';
include("../header.php");
$id = $_GET['id'];
if ($user) {
?>

<?php
$usercheck = $conn->prepare("SELECT * FROM Users WHERE id=:id");
$usercheck->bindParam(':id', $id, PDO::PARAM_INT);
$usercheck->execute();
// print_r($usercheck->errorInfo());
if ($usercheck->rowCount()) {
if ($id == $myu->id) {
header("Location: /Dashboard/");
}
?>

<div class="card">
  <div class="card-content">
    <div class="content">
      <form method="post" enctype="multipart/form-data">
        <input class="input mb-2" type="text" name="title" placeholder="Message Title">

        <textarea name="message" class="textarea mb-2" placeholder="Message Description"></textarea>

        <div class="g-recaptcha brochure__form__captcha mb-2" data-sitekey="6LfYkcMhAAAAALRRnevLdejPlX2ahGc5z0ImImQf"></div>

        <button type="submit" name="submit" class="button is-primary" style="border-radius: 5px;">Send Message</button>
      </form>
    </div>
  </div>
</div>
<br>

<?php
$message = ProfanityFilter($_POST['message']);
$title = ProfanityFilter($_POST['title']);

if (isset($_POST['submit'])) {
if ($message && $title == NULL) {
echo 'no';
}
if ($id != $myu->id) {
$recaptcha = $_POST['g-recaptcha-response'];
$res = reCaptcha($recaptcha);
if($res['success']){
$postmessage = $conn->prepare("INSERT INTO Messages (title, sender, user, message, postdate) VALUES (:title ,:sender, :user, :message, $time)");
$postmessage->bindParam(':sender', $myu->id, PDO::PARAM_INT);
$postmessage->bindParam(':user', $id, PDO::PARAM_INT);
$postmessage->bindParam(':title', $title, PDO::PARAM_STR);
$postmessage->bindParam(':message', $message, PDO::PARAM_STR);
$postmessage->execute();
header("Location: /Messages/");
// print_r($postmessage->errorInfo());
}
}
}
?>

<?php
}
}else{
    header("Location: /Register/");
}
?>
<?php
include("../footer.php");
?>