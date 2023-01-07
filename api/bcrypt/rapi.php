<?php
include ("../../MISC/header.php")
?>
<?php
if (!$user) {
$username = $_POST['username'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$email = $_POST['email'];
$submit = $_POST['submit'];

function is_alphanumeric($username) {
return (bool)preg_match("/^([a-zA-Z0-9])+$/i", $username);
}

if ($submit) {
if (!$username||!$password||!$confirmpassword||!$email) {
echo "<div class='reg-alert'><p class='basic-font reg-alert-txt'>Please fill in all required fields</p></div>";
}
else {
$userExist1 = "SELECT * FROM Users WHERE username=:username";
$userExist = $conn->prepare($userExist1);
$userExist->execute(array(':username' => $username));
$userExist = ($userExist->rowCount());
if ($userExist > 0) {
echo "<div class='reg-alert'><p class='basic-font reg-alert-txt'>That username already exists</p></div>";
}
else {
if ($password != $confirmpassword) {
echo "<div class='reg-alert'><p class='basic-font reg-alert-txt'>Your password and confirm password does not match</p></div>";
}
else {
if (strlen($username) >= 15) {
echo "<div class='reg-alert'><p class='basic-font reg-alert-txt'>Your username is too long</p></div>";
}
elseif (strlen($username) < 3) {
echo "<div class='reg-alert'><p class='basic-font reg-alert-txt'>Your username is too short</p></div>";
}
elseif (strlen($password) <= 4) {
echo "<div class='reg-alert'><p class='basic-font reg-alert-txt'>Your password is too short</p></div>";
}
elseif (!is_alphanumeric($username)) {
echo "<div class='reg-alert'><p class='basic-font reg-alert-txt'>You username contains some invalid characters</p></div>";
} else {
$encrypt = password_hash($password, PASSWORD_BCRYPT);

$encrypt1 = hash('sha512',$password);
//$encrypt = hash('sha512',$encrypt1);
$date = time();
session_start();
$_SESSION['username'] = $user;
$_SESSION['hash'] = $encrypt;
$ip = 4;
$data1 = "INSERT INTO Users (username, password, email, datecreated) VALUES (:username, :password, :email, :datecreated)";
$data2 = $conn->prepare($data1);
$data2->execute(array(':username' => $username, ':password' => $encrypt, ':email' => $email, ':datecreated' => $date));
$giveEmeralds = $conn->query("UPDATE Users SET points=5 WHERE username='$username'");
header("Location: ../../login.php");
exit();
}
}
}
}
}
} else {
header("Location: ../../login.php");
exit();	
}
?>