<?php

try {

    $conn = new PDO("mysql:host=mysql.ct8.pl;dbname=m30838_bricktown", 'm30838_bricktown','Vxzs~qxs2S/H81g5-5^001fu5erqKk');

} catch (PDOException $pe) {

    die("Could not connect to the database! :" . $pe->getMessage());

}

?>















