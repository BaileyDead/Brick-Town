<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include ("../../MISC/header.php")
?>
<?php
if (!$user) {
$username = $_POST['username'];
$password = $_POST['password'];
$submit = $_POST['submit'];
if ($submit) {
if (!$username || !$password) {
echo "<div class='sign-alert'><p class='basic-font sign-alert-txt'>You have missing fields</p></div>";
} else {
$encrypt = password_verify($password, PASSWORD_BCRYPT);
$checkUser1 = "SELECT * FROM Users WHERE username=:username";
$checkUser = $conn->prepare($checkUser1);
$checkUser->execute(array(':username' => $username));
$cU = ($checkUser->rowCount());
if ($cU == 0) {
echo "<div class='sign-alert'><p class='basic-font sign-alert-txt'>That user does not exist</p></div>";
} else {
$getPassword1 = "SELECT * FROM Users WHERE username=:username AND password=:password";
$getPassword = $conn->prepare($getPassword1);
$getPassword->execute(array(':username' => $username, ':password' => $encrypt));
$gP = ($getPassword->rowCount());
if ($gP == 0) {
echo "<div class='sign-alert'><p class='basic-font sign-alert-txt'>That password is incorrect</p></div>";
} else {
$_SESSION['username']=$username;
$_SESSION['hash']=$encrypt;                        
header("Location: ../");                    
}
}
}
}
} else {
header("Location: ../");
exit();    
}
?>