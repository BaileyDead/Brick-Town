<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$name='Customize';
include("../header.php");
include($_SERVER['DOCUMENT_ROOT']."/Customize/forms/bodycolor.php");
?>
<?php
if ($user){
?>

<?php
if (isset($_GET["page"])) {
  $page = $_GET['page'];
  if (!is_numeric($page)) {
    header("Location: /Customize/");
  }
  if ($page <= 0) {
    $page = 1;
  }
} else {
  $page = 1;  
}
  $limit = 4;
  $offset = ($page - 1) * $limit;
  $statement = $conn->prepare("SELECT * FROM Inventory WHERE user=:id ORDER BY id DESC LIMIT :limit OFFSET :offset");
  $statement->bindParam(':id',$myu->id, PDO::PARAM_INT);
  $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
  $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
  $statement->execute();
  $items = $statement->fetchAll();
  if(!$items) {
  // header('location: /Customize/');
  // exit();
  }


?>
<div style="color: white; text-align: center;" class="notification is-success">
  <b>Be aware that the bodycolors are a barebones feature!</b>
</div>

<div style="height:2px;"></div>
<div class="columns">
<div class="column is-one-third">
<div class="card">
<div class="card-content">
<figure class="image is-4by4">
<img src="/avatar.php?id=<?php echo $myu->id; ?>"></img>
</figure>
</div>
</div>
</div>
<div class="column is-half">
<div class="card">
<div class="card-content">

  <link rel="stylesheet" href="/MISC/new.css">

<div class="body centered">
  <div class="columns is-multiline">
  <div class="column is-half">
	<form method="post">
		<p>Head:</p>
		<input type="submit" name="headcolorwhite" value=" " style="width:20px;height:20px;background-color: #D6D6D6; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="headcolorgreen" value=" " style="width:20px;height:20px;background-color: #00B214; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="headcolorblue" value=" " style="width:20px;height:20px;background-color: #00167C; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="headcolorred" value=" " style="width:20px;height:20px;background-color: #FF0000; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="headcoloryellow" value=" " style="width:20px;height:20px;background-color: #FFD800; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="headcolorgray" value=" " style="width:20px;height:20px;background-color: #404040; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="headcolorblackskin" value=" " style="width:20px;height:20px;background-color: #7C4B38; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="headcolorwhiteskin" value=" " style="width:20px;height:20px;background-color: #FFD77C; border-radius: 5px; border: 0px solid;"></input>
	</form>
</div>
<div class="column is-half">
	<form method="post">
		<p>Torso:</p>
		<input type="submit" name="torsocolorwhite" value=" " style="width:20px;height:20px;background-color: #D6D6D6; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="torsocolorgreen" value=" " style="width:20px;height:20px;background-color: #00B214; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="torsocolorblue" value=" " style="width:20px;height:20px;background-color: #00167C; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="torsocolorred" value=" " style="width:20px;height:20px;background-color: #FF0000; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="torsocoloryellow" value=" " style="width:20px;height:20px;background-color: #FFD800; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="torsocolorgray" value=" " style="width:20px;height:20px;background-color: #404040; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="torsocolorblackskin" value=" " style="width:20px;height:20px;background-color: #7C4B38; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="torsocolorwhiteskin" value=" " style="width:20px;height:20px;background-color: #FFD77C; border-radius: 5px; border: 0px solid;"></input>
	</form>
</div>
<div class="column is-half">
	<form method="post">
		<p>Left Arm:</p>
		<input type="submit" name="leftarmcolorwhite" value=" " style="width:20px;height:20px;background-color: #D6D6D6; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="leftarmcolorgreen" value=" " style="width:20px;height:20px;background-color: #00B214; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="leftarmcolorblue" value=" " style="width:20px;height:20px;background-color: #00167C; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="leftarmcolorred" value=" " style="width:20px;height:20px;background-color: #FF0000; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="leftarmcoloryellow" value=" " style="width:20px;height:20px;background-color: #FFD800; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="leftarmcolorgray" value=" " style="width:20px;height:20px;background-color: #404040; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="leftarmcolorblackskin" value=" " style="width:20px;height:20px;background-color: #7C4B38; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="leftarmcolorwhiteskin" value=" " style="width:20px;height:20px;background-color: #FFD77C; border-radius: 5px; border: 0px solid;"></input>
	</form>
</div>
<div class="column is-half">
	<form method="post">
		<p>Right Arm:</p>
		<input type="submit" name="rightarmcolorwhite" value=" " style="width:20px;height:20px;background-color: #D6D6D6; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="rightarmcolorgreen" value=" " style="width:20px;height:20px;background-color: #00B214; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="rightarmcolorblue" value=" " style="width:20px;height:20px;background-color: #00167C; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="rightarmcolorred" value=" " style="width:20px;height:20px;background-color: #FF0000; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="rightarmcoloryellow" value=" " style="width:20px;height:20px;background-color: #FFD800; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="rightarmcolorgray" value=" " style="width:20px;height:20px;background-color: #404040; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="rightarmcolorblackskin" value=" " style="width:20px;height:20px;background-color: #7C4B38; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="rightarmcolorwhiteskin" value=" " style="width:20px;height:20px;background-color: #FFD77C; border-radius: 5px; border: 0px solid;"></input>
	</form>
</div>
<div class="column is-half">
	<form method="post">
		<p>Left Leg:</p>
		<input type="submit" name="leftlegcolorwhite" value=" " style="width:20px;height:20px;background-color: #D6D6D6; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="leftlegcolorgreen" value=" " style="width:20px;height:20px;background-color: #00B214; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="leftlegcolorblue" value=" " style="width:20px;height:20px;background-color: #00167C; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="leftlegcolorred" value=" " style="width:20px;height:20px;background-color: #FF0000; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="leftlegcoloryellow" value=" " style="width:20px;height:20px;background-color: #FFD800; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="leftlegcolorgray" value=" " style="width:20px;height:20px;background-color: #404040; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="leftlegcolorblackskin" value=" " style="width:20px;height:20px;background-color: #7C4B38; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="leftlegcolorwhiteskin" value=" " style="width:20px;height:20px;background-color: #FFD77C; border-radius: 5px; border: 0px solid;"></input>
	</form>
</div>
<div class="column is-half">
	<form method="post">
		<p>Right Leg:</p>
		<input type="submit" name="rightlegcolorwhite" value=" " style="width:20px;height:20px;background-color: #D6D6D6; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="rightlegcolorgreen" value=" " style="width:20px;height:20px;background-color: #00B214; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="rightlegcolorblue" value=" " style="width:20px;height:20px;background-color: #00167C; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="rightlegcolorred" value=" " style="width:20px;height:20px;background-color: #FF0000; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="rightlegcoloryellow" value=" " style="width:20px;height:20px;background-color: #FFD800; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="rightlegcolorgray" value=" " style="width:20px;height:20px;background-color: #404040; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="rightlegcolorblackskin" value=" " style="width:20px;height:20px;background-color: #7C4B38; border-radius: 5px; border: 0px solid;"></input>
		<input type="submit" name="rightlegcolorwhiteskin" value=" " style="width:20px;height:20px;background-color: #FFD77C; border-radius: 5px; border: 0px solid;"></input>
	</form>
</div>



</div>
</div>
</div>
</div>
</div>
</div>
<br>

<div class="columns is-multiline">
<?php
foreach ($items as $gN){
$inventory = $conn->prepare("SELECT * FROM Market WHERE id=:id");
$inventory->bindParam(':id', $gN['item'], PDO::PARAM_INT);
$inventory->execute();
$gI = $inventory->fetch(PDO::FETCH_OBJ);
?>
<?php if ($gI->approved=="1"){ ?>
<div class="column is-one-quarter">
<div class="card">
<div class="card-content"> 
<a href="/Market/item.php?id=<?php echo $gI->id; ?>">
<img src="/itempng.php?id=<?php echo $gI->id; ?>">
</a>
<div style="text-align:center;margin: 0 auto;"> 
<?php echo htmlspecialchars($gI->name); ?>
<div style="height:1px;"></div>
<a href="/Customize/wear.php?id=<?php echo $gI->id; ?>" class="button is-link">Wear</a>
<a href="/Customize/remove.php?id=<?php echo $gI->id; ?>" class="button is-link">Remove</a>
</div>
</div>
</div>
</div>


<?php } ?>  
<?php } ?>   

</div>

<nav class="pagination is-centered" role="navigation" aria-label="pagination">
  <a href="/Customize/?page=<?php echo $page-1 ?>" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Previous</a>
  
    <a href="/Customize/?page=<?php echo $page+1 ?>" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Next Page</a>


</nav>

</div>
</div>
<?php }else{
header("Location: /Login/");
} ?> 

<?php
include("../footer.php");
?>
