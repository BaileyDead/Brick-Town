<?php
$deez = 'a';
include($_SERVER['DOCUMENT_ROOT']."/MISC/trueconnect.php");
include($_SERVER['DOCUMENT_ROOT']."/MISC/functions.php");
include($_SERVER['DOCUMENT_ROOT']."/Customize/forms/bodycolor.php");
if ($user){
?>

<link rel="stylesheet" href="/MISC/new.css">

<div class="body centered">
	<form method="post">
		<p>Head:</p>
		<input type="submit" name="headcolorwhite" value=" " style="width:20px;height:20px;background-color: #D6D6D6"></input>
		<input type="submit" name="headcolorgreen" value=" " style="width:20px;height:20px;background-color: #00B214"></input>
		<input type="submit" name="headcolorblue" value=" " style="width:20px;height:20px;background-color: #00167C"></input>
		<input type="submit" name="headcolorred" value=" " style="width:20px;height:20px;background-color: #FF0000"></input>
		<input type="submit" name="headcoloryellow" value=" " style="width:20px;height:20px;background-color: #FFD800"></input>
		<input type="submit" name="headcolorgray" value=" " style="width:20px;height:20px;background-color: #404040"></input>
		<input type="submit" name="headcolorblackskin" value=" " style="width:20px;height:20px;background-color: #7C4B38"></input>
		<input type="submit" name="headcolorwhiteskin" value=" " style="width:20px;height:20px;background-color: #FFD77C"></input>
	</form>

	<form method="post">
		<p>Torso:</p>
		<input type="submit" name="torsocolorwhite" value=" " style="width:20px;height:20px;background-color: #D6D6D6"></input>
		<input type="submit" name="torsocolorgreen" value=" " style="width:20px;height:20px;background-color: #00B214"></input>
		<input type="submit" name="torsocolorblue" value=" " style="width:20px;height:20px;background-color: #00167C"></input>
		<input type="submit" name="torsocolorred" value=" " style="width:20px;height:20px;background-color: #FF0000"></input>
		<input type="submit" name="torsocoloryellow" value=" " style="width:20px;height:20px;background-color: #FFD800"></input>
		<input type="submit" name="torsocolorgray" value=" " style="width:20px;height:20px;background-color: #404040"></input>
		<input type="submit" name="torsocolorblackskin" value=" " style="width:20px;height:20px;background-color: #7C4B38"></input>
		<input type="submit" name="torsocolorwhiteskin" value=" " style="width:20px;height:20px;background-color: #FFD77C"></input>
	</form>

	<form method="post">
		<p>Left Arm:</p>
		<input type="submit" name="leftarmcolorwhite" value=" " style="width:20px;height:20px;background-color: #D6D6D6"></input>
		<input type="submit" name="leftarmcolorgreen" value=" " style="width:20px;height:20px;background-color: #00B214"></input>
		<input type="submit" name="leftarmcolorblue" value=" " style="width:20px;height:20px;background-color: #00167C"></input>
		<input type="submit" name="leftarmcolorred" value=" " style="width:20px;height:20px;background-color: #FF0000"></input>
		<input type="submit" name="leftarmcoloryellow" value=" " style="width:20px;height:20px;background-color: #FFD800"></input>
		<input type="submit" name="leftarmcolorgray" value=" " style="width:20px;height:20px;background-color: #404040"></input>
		<input type="submit" name="leftarmcolorblackskin" value=" " style="width:20px;height:20px;background-color: #7C4B38"></input>
		<input type="submit" name="leftarmcolorwhiteskin" value=" " style="width:20px;height:20px;background-color: #FFD77C"></input>
	</form>

	<form method="post">
		<p>Right Arm:</p>
		<input type="submit" name="rightarmcolorwhite" value=" " style="width:20px;height:20px;background-color: #D6D6D6"></input>
		<input type="submit" name="rightarmcolorgreen" value=" " style="width:20px;height:20px;background-color: #00B214"></input>
		<input type="submit" name="rightarmcolorblue" value=" " style="width:20px;height:20px;background-color: #00167C"></input>
		<input type="submit" name="rightarmcolorred" value=" " style="width:20px;height:20px;background-color: #FF0000"></input>
		<input type="submit" name="rightarmcoloryellow" value=" " style="width:20px;height:20px;background-color: #FFD800"></input>
		<input type="submit" name="rightarmcolorgray" value=" " style="width:20px;height:20px;background-color: #404040"></input>
		<input type="submit" name="rightarmcolorblackskin" value=" " style="width:20px;height:20px;background-color: #7C4B38"></input>
		<input type="submit" name="rightarmcolorwhiteskin" value=" " style="width:20px;height:20px;background-color: #FFD77C"></input>
	</form>

	<form method="post">
		<p>Left Leg:</p>
		<input type="submit" name="leftlegcolorwhite" value=" " style="width:20px;height:20px;background-color: #D6D6D6"></input>
		<input type="submit" name="leftlegcolorgreen" value=" " style="width:20px;height:20px;background-color: #00B214"></input>
		<input type="submit" name="leftlegcolorblue" value=" " style="width:20px;height:20px;background-color: #00167C"></input>
		<input type="submit" name="leftlegcolorred" value=" " style="width:20px;height:20px;background-color: #FF0000"></input>
		<input type="submit" name="leftlegcoloryellow" value=" " style="width:20px;height:20px;background-color: #FFD800"></input>
		<input type="submit" name="leftlegcolorgray" value=" " style="width:20px;height:20px;background-color: #404040"></input>
		<input type="submit" name="leftlegcolorblackskin" value=" " style="width:20px;height:20px;background-color: #7C4B38"></input>
		<input type="submit" name="leftlegcolorwhiteskin" value=" " style="width:20px;height:20px;background-color: #FFD77C"></input>
	</form>

	<form method="post">
		<p>Right Leg:</p>
		<input type="submit" name="rightlegcolorwhite" value=" " style="width:20px;height:20px;background-color: #D6D6D6"></input>
		<input type="submit" name="rightlegcolorgreen" value=" " style="width:20px;height:20px;background-color: #00B214"></input>
		<input type="submit" name="rightlegcolorblue" value=" " style="width:20px;height:20px;background-color: #00167C"></input>
		<input type="submit" name="rightlegcolorred" value=" " style="width:20px;height:20px;background-color: #FF0000"></input>
		<input type="submit" name="rightlegcoloryellow" value=" " style="width:20px;height:20px;background-color: #FFD800"></input>
		<input type="submit" name="rightlegcolorgray" value=" " style="width:20px;height:20px;background-color: #404040"></input>
		<input type="submit" name="rightlegcolorblackskin" value=" " style="width:20px;height:20px;background-color: #7C4B38"></input>
		<input type="submit" name="rightlegcolorwhiteskin" value=" " style="width:20px;height:20px;background-color: #FFD77C"></input>
	</form>




</div>

<?php
}else{
header("Location: /Register/");
}
?>