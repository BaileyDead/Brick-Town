<?php
$name = 'Market';
include("../header.php");
?>

<?php
if (isset($_GET["page"])) {
  $page = $_GET['page'];
  if (!is_numeric($page)) {
    header("Location: /Market/");
  }
  if ($page <= 0) {
    $page = 1;
  }
} else {
  $page = 1;  
}
  $limit = 8;
  $offset = ($page - 1) * $limit;
  $statement = $conn->prepare("SELECT * FROM Market ORDER BY id DESC LIMIT 4");
  $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
  $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
  $statement->execute();
  $items = $statement->fetchAll();
  if(!$items) {
  header('location: /Market/');
  exit();
  }


?>

<h4 class="title is-4">Hats</h4>
<div class="columns">
  <?php
  foreach($items as $iT){ ?>
  <div class="column is-one-quarter">
    <div class="card">
      <div class="card-image">
        <figure class="image is-4by4">
          <?php if ($iT['approved']=="1"){ ?> 
          <img src="/itempng.php?id=<?php echo $iT['id']; ?>" alt="Placeholder image">
          <?php }else{ ?>
          <img src="../CDN/ITEMS/awaiting.png" alt="Placeholder image">
          <?php } ?>
        </figure>
      </div>
      <div class="card-content">
        <div class="media">
          <div class="media-left">
            <figure class="image is-48x48">
              <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
            </figure>
          </div>
          <div class="media-content">
            <p class="title is-6">John Smith</p>
            <p class="subtitle is-6">12</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  } ?>
</div>


<div style="height:5px;width:50px;"></div>
<nav class="pagination is-centered" role="navigation" aria-label="pagination">
  <a href="/Market/upload.php" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Upload!</a>
</nav>
<div style="height:5px;"></div>
<div class="columns is-multiline">  
<?php
foreach($items as $iT){ ?>
<div class="column is-one-quarter">
<div class="card" <?php if ($iT['limited']==1){ ?> style="border-style:solid;border-color:red;" <?php } ?>>
<div class="card-content"> 
<a href="/Market/item.php?id=<?php echo $iT['id']; ?>">
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
echo 'Offsale!';
}
?>
<?php
if ($iT['limited']=="1"){ 
if ($iT['amount']>="1"){
echo 'Amount:  '.$iT['amount'];
}else{
echo 'Sold Out!';
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
  <a href="/Market/?page=<?php echo $page-1; ?>" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Previous</a>
  
    <a href="/Market/?page=<?php echo $page+1; ?>" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Next Page</a>
</nav>
<?php
include("../footer.php");
?>
