<?php
include("../MISC/trueconnect.php");
include("../MISC/functions.php");
?>

<?php
if ($user) {
if ($myu->Banned=="1") {
?>

<head>
<link rel="stylesheet" href="/MISC/style.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
</head>
<div style="height:20px;"></div>
<div class="center" style="background-color:#2E333A;width: 40%;margin:0 auto;padding:12px;">

<h1> You have been banned!</h1>

Our moderators have come to realise you violated our <b>Terms of Service</b>, 
here's the reason why we think so

<div style="height:6px;"></div>

<text style="color:red;">Reason: <?php echo htmlspecialchars($myu->banreason); ?></text>
<div style="height:3px;"></div>
<text> You can always logout or appeal the ban on our discord server!</text>
<div style="height:3px;"></div>
<a href="/logout.php"><button>Log out!</button></a>
<a href="#"><button>Appeal</button></a>
</div>

<?php
}else{
header("Location: /Dashboard/");
}
}else{
header("Location: /Login/");
}
?>