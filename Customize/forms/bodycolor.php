<?php

// Head

if(isset($_POST['headcolorwhite'])) {
	$changecolor = $conn->prepare("UPDATE Users SET headcolor='whitehead.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['headcolorgreen'])) {
	$changecolor = $conn->prepare("UPDATE Users SET headcolor='greenhead.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['headcolorblue'])) {
	$changecolor = $conn->prepare("UPDATE Users SET headcolor='bluehead.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['headcolorred'])) {
	$changecolor = $conn->prepare("UPDATE Users SET headcolor='redhead.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['headcoloryellow'])) {
	$changecolor = $conn->prepare("UPDATE Users SET headcolor='yellowhead.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['headcolorgray'])) {
	$changecolor = $conn->prepare("UPDATE Users SET headcolor='grayhead.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['headcolorblackskin'])) {
	$changecolor = $conn->prepare("UPDATE Users SET headcolor='blackskinhead.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['headcolorwhiteskin'])) {
	$changecolor = $conn->prepare("UPDATE Users SET headcolor='whiteskinhead.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

// Torso

if(isset($_POST['torsocolorwhite'])) {
	$changecolor = $conn->prepare("UPDATE Users SET torsocolor='whitetorso.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['torsocolorgreen'])) {
	$changecolor = $conn->prepare("UPDATE Users SET torsocolor='greentorso.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['torsocolorblue'])) {
	$changecolor = $conn->prepare("UPDATE Users SET torsocolor='bluetorso.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['torsocolorred'])) {
	$changecolor = $conn->prepare("UPDATE Users SET torsocolor='redtorso.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['torsocoloryellow'])) {
	$changecolor = $conn->prepare("UPDATE Users SET torsocolor='yellowtorso.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['torsocolorgray'])) {
	$changecolor = $conn->prepare("UPDATE Users SET torsocolor='graytorso.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['torsocolorblackskin'])) {
	$changecolor = $conn->prepare("UPDATE Users SET torsocolor='blackskintorso.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['torsocolorwhiteskin'])) {
	$changecolor = $conn->prepare("UPDATE Users SET torsocolor='whiteskintorso.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

// Left Arm

if(isset($_POST['leftarmcolorwhite'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftarmcolor='whiteleftarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['leftarmcolorgreen'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftarmcolor='greenleftarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['leftarmcolorblue'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftarmcolor='blueleftarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['leftarmcolorred'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftarmcolor='redleftarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['leftarmcoloryellow'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftarmcolor='yellowleftarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['leftarmcolorgray'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftarmcolor='grayleftarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['leftarmcolorblackskin'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftarmcolor='blackskinleftarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['leftarmcolorwhiteskin'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftarmcolor='whiteskinleftarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

// Right Arm

if(isset($_POST['rightarmcolorwhite'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightarmcolor='whiterightarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['rightarmcolorgreen'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightarmcolor='greenrightarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['rightarmcolorblue'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightarmcolor='bluerightarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['rightarmcolorred'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightarmcolor='redrightarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['rightarmcoloryellow'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightarmcolor='yellowrightarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['rightarmcolorgray'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightarmcolor='grayrightarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['rightarmcolorblackskin'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightarmcolor='blackskinrightarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['rightarmcolorwhiteskin'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightarmcolor='whiteskinrightarm.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

// Left Leg

if(isset($_POST['leftlegcolorwhite'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftlegcolor='whiteleftleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['leftlegcolorgreen'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftlegcolor='greenleftleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['leftlegcolorblue'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftlegcolor='blueleftleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['leftlegcolorred'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftlegcolor='redleftleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['leftlegcoloryellow'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftlegcolor='yellowleftleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['leftlegcolorgray'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftlegcolor='grayleftleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['leftlegcolorblackskin'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftlegcolor='blackskinleftleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['leftlegcolorwhiteskin'])) {
	$changecolor = $conn->prepare("UPDATE Users SET leftlegcolor='whiteskinleftleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

// Right Leg

if(isset($_POST['rightlegcolorwhite'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightlegcolor='whiterightleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['rightlegcolorgreen'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightlegcolor='greenrightleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['rightlegcolorblue'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightlegcolor='bluerightleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['rightlegcolorred'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightlegcolor='redrightleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['rightlegcoloryellow'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightlegcolor='yellowrightleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['rightlegcolorgray'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightlegcolor='grayrightleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['rightlegcolorblackskin'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightlegcolor='blackskinrightleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}

if(isset($_POST['rightlegcolorwhiteskin'])) {
	$changecolor = $conn->prepare("UPDATE Users SET rightlegcolor='whiteskinrightleg.png' WHERE id=:id");
	$changecolor->bindParam(':id', $myu->id, PDO::PARAM_INT);
	$changecolor->execute();
}



?>