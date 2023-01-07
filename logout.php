<?php
include('MISC/trueconnect.php');
include('MISC/functions.php');
if ($user){
session_start();
session_destroy();
header('Location: ../');
exit();
die();
}else{
header("Location: /Login/");
}
?>