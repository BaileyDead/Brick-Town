<?php
$name='Settings';
include("../header.php");
?>

<?php
if ($user){
?>
<div class="card">
<div class="card-content">
<div style="height:2px;"></div>
<h1>Settings</h1>
<div style="height:2px;"></div>
<form method="post">
<textarea name="description" rows="3" class="textarea" placeholder="Description"><?php echo htmlspecialchars($myu->description) ?></textarea>
<div style="height:2px;"></div>
<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
<div style="height:2px;"></div>
<input type="submit" name="submit" class="button is-link" value="Update">
</form>
<div style="height:2px;"></div>
</div>
</div>

<?php
$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

if (!$token || $token !== $_SESSION['token']) {
    exit;
} else {
if ($_POST['submit']){
$desc = ProfanityFilter($_POST['description']); 
$hi = $conn->prepare("UPDATE Users SET `description`=:desc WHERE id='$myu->id'");
$hi->bindParam(':desc', $desc, PDO::PARAM_STR);
$hi->execute();
header("Location: /Settings/");
}
}
?>

<?php
}else{
header("Location: /Login/");
}
?>