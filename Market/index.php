<?php
$name = 'Market';
include("../header.php");
?>

<?php
if (isset($_GET["page"])) {
  $type = $_GET['type'];
  $page = $_GET['page'];
  if (!is_numeric($page)) {
    header("Location: /Market/?page=1&type=hat");
  }
  if ($page <= 0) {
    $page = 1;
  }
} else {
  $page = 1;  
}
  $limit = 8;
  $offset = ($page - 1) * $limit;
  $statement = $conn->prepare("SELECT * FROM Market WHERE type=:type ORDER BY id DESC LIMIT :limit OFFSET :offset");
  $statement->bindParam(':type', $type, PDO::PARAM_STR);
  $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
  $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
  $statement->execute();
  $items = $statement->fetchAll();
  if(!$items) {
  echo 'no items here lol';
  exit();
  }


?>

<div style="height:5px;width:50px;"></div>
<nav class="pagination is-centered" role="navigation" aria-label="pagination">
  <a href="/Market/upload.php" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Upload!</a>
</nav>

<div class="columns">

<div class="column">
<div class="card">
<div class="card-content">

<p>

<text class="title is-3">Types: </text>

<a style="border-radius: 5px;" href="/Market/?page=<?php echo $page; ?>&type=hat" class="button is-link">Hats</a>

<a style="border-radius: 5px;" href="/Market/?page=<?php echo $page; ?>&type=accessory" class="button is-link">Accesories</a>

<a style="border-radius: 5px;" href="/Market/?page=<?php echo $page; ?>&type=face" class="button is-link">Faces</a>

<a style="border-radius: 5px;" href="/Market/?page=<?php echo $page; ?>&type=mask" class="button is-link">Masks</a>

<a style="border-radius: 5px;" href="/Market/?page=<?php echo $page; ?>&type=hair" class="button is-link">Hair</a>

<a style="border-radius: 5px;" href="/Market/?page=<?php echo $page; ?>&type=shirt" class="button is-link">Shirts</a>

<a style="border-radius: 5px;" href="/Market/?page=<?php echo $page; ?>&type=pants" class="button is-link">Pants</a>

</p>
</div>
</div>
</div>


</div>

<div class="columns is-multiline">  
<?php
foreach($items as $iT){ ?>
<div class="column is-one-quarter">
<div class="card" <?php if ($iT['limited']==1){ ?> style="border-style:solid;border-color:red;" <?php } ?>>
<div class="card-content"> 
<a href="/item/<?php echo $iT['id']; ?>">
<?php if ($iT['approved']=="1"){ ?> 
<img src="/itempng.php?id=<?php echo $iT['id']; ?>">
<?php }else{ ?>
<img src="../CDN/ITEMS/awaiting.png">
<?php } ?>

</a>
<div style="text-align:center;margin: 0 auto;"> 
<?php echo htmlspecialchars($iT['name']); ?>
<div style="height:1px;"></div>
Price: <?php 
if (!$iT['price']=="0"){ 
echo htmlspecialchars($iT['price']); 
}else { 
echo 'Free'; 
}  ?>
<div style="height:1px;"></div>
<?php 
if($iT['onsale']=="0"){
echo '<p>Offsale!</p>';
}
?>
<?php
if ($iT['limited']=="1"){ 
if ($iT['amount']>="1"){
echo 'Amount:  '.$iT['amount'];
}else{
echo '<p>Sold Out!</p>';
}
}
?>
</div>
</div>

</div> 
</div>
<?php } ?>    
</div>

<nav class="pagination is-centered" role="navigation" aria-label="pagination">
  <a href="/Market/?page=<?php echo $page-1; ?>&type=<?php echo $type; ?>" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Previous</a>
  
    <a href="/Market/?page=<?php echo $page+1; ?>&type=<?php echo $type; ?>" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Next Page</a>
</nav>
<?php
include("../footer.php");
?>
