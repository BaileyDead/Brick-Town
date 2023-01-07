<?php
if (!$user) {
$username = ProfanityFilter($_POST['username']);
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$email = $_POST['email'];
$submit = $_POST['submit'];

function is_alphanumeric($username) {
return (bool)preg_match("/^([a-zA-Z0-9])+$/i", $username);
}

if ($submit) {
if (!$username||!$password||!$confirmpassword||!$email) {
echo '<div class="alertred">
<div style="height:6px"></div>
Fill in all required fields!
<div style="height:6px"></div>
</div>
<div style="height:6px"></div>';
}
else {
$userExist1 = "SELECT * FROM Users WHERE username=:username";
$userExist = $conn->prepare($userExist1);
$userExist->execute(array(':username' => $username));
$userExist = ($userExist->rowCount());
if ($userExist > 0) {
echo '<div class="alertred">
<div style="height:6px"></div>
That username already exists!
<div style="height:6px"></div>
</div>
<div style="height:6px"></div>';
}
else {
if ($password != $confirmpassword) {
echo '<div class="alertred">
<div style="height:6px"></div>
Passwords dont match!
<div style="height:6px"></div>
</div>
<div style="height:6px"></div>';
}
else {
if (strlen($username) >= 20) {
echo '<div class="alertred">
<div style="height:6px"></div>
Your username is too long!
<div style="height:6px"></div>
</div>
<div style="height:6px"></div>';
}
elseif (strlen($username) < 3) {
echo '<div class="alertred">
<div style="height:6px"></div>
Your username is too short!
<div style="height:6px"></div>
</div>
<div style="height:6px"></div>';
}
elseif (strlen($password) <= 2) {
echo '<div class="alertred">
<div style="height:6px"></div>
Your password is too short!
<div style="height:6px"></div>
</div>
<div style="height:6px"></div>';
}
elseif (!is_alphanumeric($username)) {
echo '<div class="alertred">
<div style="height:6px"></div>
Username contains invalid characters!
<div style="height:6px"></div>
</div>
<div style="height:6px"></div>';
} else {
  $recaptcha = $_POST['g-recaptcha-response'];
$res = reCaptcha($recaptcha);
if($res['success']){
$encrypt1 = hash('sha512',$password);
$encrypt = hash('sha512',$encrypt1);
$date = time();
session_start();
$_SESSION['username'] = $user;
$_SESSION['hash'] = $encrypt;
$ip = 4;
$data1 = "INSERT INTO Users (username, password, email, datecreated) VALUES (:username, :password, :email, :datecreated)";
$data2 = $conn->prepare($data1);
$data2->execute(array(':username' => $username, ':password' => $encrypt, ':email' => $email, ':datecreated' => $date));
$giveEmeralds = $conn->query("UPDATE Users SET cubes=5 WHERE username='$username'");
header("Location: ../Login/");
exit();
}
}
}
}
}
}
} else {
header("Location: ../Login/");
exit();	
}
?>