<?php
if (!$user) {
$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['token'] = md5(uniqid(mt_rand(), true));
$submit = $_POST['submit'];
if ($submit) {
if (!$username || !$password) {
echo '<div class="alertred">
<div style="height:6px"></div>
You have missing fields!
<div style="height:6px"></div>
</div>
<div style="height:6px"></div>';
} else {
$encrypt1 = hash('sha512',$password);
$encrypt = hash('sha512',$encrypt1);
$checkUser1 = "SELECT * FROM Users WHERE username=:username";
$checkUser = $conn->prepare($checkUser1);
$checkUser->execute(array(':username' => $username));
$cU = ($checkUser->rowCount());
if ($cU == 0) {
echo '<div class="alertred">
<div style="height:6px"></div>
That user doesnt exist!
<div style="height:6px"></div>
</div>
<div style="height:6px"></div>';
} else {
$getPassword1 = "SELECT * FROM Users WHERE username=:username AND password=:password";
$getPassword = $conn->prepare($getPassword1);
$getPassword->execute(array(':username' => $username, ':password' => $encrypt));
$gP = ($getPassword->rowCount());
if ($gP == 0) {
echo '<div class="alertred">
<div style="height:6px"></div>
That password is incorrect!
<div style="height:6px"></div>
</div>
<div style="height:6px"></div>';
} else {
$recaptcha = $_POST['g-recaptcha-response'];
$res = reCaptcha($recaptcha);
if($res['success']){

$_SESSION['username']=$username;
$_SESSION['hash']=$encrypt;						
header("Location: ../Dashboard/");					
}
}
}
}
}
} else {
header("Location: ../");
exit();	
}
?>