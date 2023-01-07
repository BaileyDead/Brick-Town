<?php
$name = 'Game';
include($_SERVER['DOCUMENT_ROOT']."/header.php");

$id = $_GET['id'];

$getgame = $conn->prepare("SELECT * FROM Games WHERE id=:id");
$getgame->bindParam(':id', $id, PDO::PARAM_INT);
$getgame->execute();
$gG = $getgame->fetch(PDO::FETCH_OBJ);

if(!$gG) {
header("Location: /Games/");
}

?>
<h1 class="title is-4 mb-1"> <?php echo htmlspecialchars($gG->name); ?> </h1>
<div class="columns">

<div class="column">
	<div class="card">
		<div class="card-content">
			<img style="width:680px;height:313px;" src="https://brick-town.ga/CDN/ITEMS/awaiting.png">
		</div>
	</div>
</div>

<div class="column is-one-quarter">
    <div class="card">
      <div class="card-image">
        <figure class="image is-4by4" style="padding:10px;">
           
          <img src="/CDN/ITEMS/awaiting.png" alt="Avatar">
                  </figure>
      </div>
      <div class="card-content">
        <div style="text-align: center;">
            <p>Grizler</p>
	    <br>
	    <p> <a href="bricktown://1/1"> <button type="submit" name="submit" class="button is-primary" style="border-radius: 5px; width:120px;">Play</button> </a> </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="columns">
<div class="column">
<div class="card">
<div class="card-content">
<span style="color: grey;"> a </span>
</div>
</div>
</div>
</div>

<div class="columns" style="text-align: center;">
	<div class="column">
		<div class="card">
		<div class="card-content">
		<b>
			<h4 class="title is-5 mb-0" style="color: white;"><?echo (date("d.m.Y",$gG->datecreated)); ?></h4>
			<span style="color: grey;">Creation Date</span>
		</b>
		</div>
		</div>
	</div>

	<div class="column">
		<div class="card">
		<div class="card-content">
		<b>
			<h4 class="title is-5 mb-0" style="color: white;"><?echo (date("d.m.Y",$gG->lastupdated)); ?></h4>
			<span style="color: grey;">Last Updated</span>
		</b>
		</div>
		</div>
	</div>

	<div class="column">
		<div class="card">
		<div class="card-content">
		<b>
			<h4 class="title is-5 mb-0" style="color: white;"><?php echo $gG->visits; ?></h4>
			<span style="color: grey;">Visits</span>
		</b>
		</div>
		</div>
	</div>



</div>
