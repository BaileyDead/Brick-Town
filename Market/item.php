<?php
$name=$iT->name;
include("../header.php");
$id=$_GET['id'];
$item = $conn->prepare("SELECT * FROM Market WHERE id=:id");
$item->bindParam(':id',$id, PDO::PARAM_INT);
$item->execute();
$iT = $item->fetch(PDO::FETCH_OBJ);

$getowner = $conn->prepare("SELECT * FROM Users WHERE username=:owner");
$getowner->bindParam(':owner', $iT->creator, PDO::PARAM_STR);
$getowner->execute();
$gO = $getowner->fetch(PDO::FETCH_OBJ);
?>
<title>BrickTown - <?php echo htmlspecialchars($iT->name); ?> </title>


<div class="columns">  
<div class="column is-one-third">
<div class="card">
<div class="card-image">
<figure class="image is-4by4">
<?php if ($iT->approved=="1"){ ?> 
<img src="/itempng.php?id=<?php echo $iT->id; ?>">
<?php }else{ ?>
<img src="../CDN/ITEMS/awaiting.png">
<?php } ?>
</figure>
<div style="height:1px;"></div>
</div>
</div>
</div> 
<div class="column">

 
<div class="card">
<div class="card-content">
<div><h1><?php echo htmlspecialchars($iT->name);?></h1>
<div style="height:1px;"></div>
<div>
<i class="fa-solid fa-quote-left"></i>
<?php echo htmlspecialchars($iT->description);?>
<i class="fa-solid fa-quote-right"></i>
</div>
<div style="height:1px;"></div>
By: <a href="/Users/user.php?id=<?php echo $gO->id; ?>"><?php echo htmlspecialchars($iT->creator);?> </a>
<div style="height:5px;"></div>
<p>Created at: <?php echo (date("d.m.Y",$iT->creationdate)); ?></p>
<?php if ($user) { ?>
<a class="button is-primary" style="border-radius: 5px;" href="/Market/buy.php?id=<?php echo $iT->id;?>"><?php if (!$iT->price=="0"){ ?>Buy for <?php echo htmlspecialchars($iT->price);?> Cubes <?php }else{ echo 'Get'; } ?></a>
<?php } ?>
</div>
</div>

</div> 
</div>
</div>
    

<?php
include("../footer.php");
?>
