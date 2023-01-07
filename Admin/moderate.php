<?php
$name = 'Moderate';
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
  $limit = 5;
  $offset = ($page - 1) * $limit;
  $statement = $conn->prepare("SELECT * FROM Market WHERE approved=0 ORDER BY id DESC LIMIT :limit OFFSET :offset");
  $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
  $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
  $statement->execute();
  $items = $statement->fetchAll();
  if(!$items) {
  echo '

<div class="alertred center"> 
<p> There is nothing to approve! </p> 
</div>
';
  }


?>


<?php
if ($myu->admin=="true") {
if ($user) {
?>
<div class="card">
<div class="center">
<div class="row">
<?php
foreach($items as $iT){ ?>  
<div class="row col-2"> 
<a href="/Market/item.php?id=<?php echo $iT['id']; ?>">
 
<img src="../CDN/ITEMS/<?php echo $iT['previewimg']; ?>" style="z-index:1;position:absolute;">
<img src="../CDN/ITEMS/Avatar.png">

</a>
<div style="text-align:center;margin: 0 auto;"> 
<?php echo htmlspecialchars($iT['name']); ?>
<div style="height:1px;"></div>
Price: <?php echo $iT['price']; ?>
<div style="height:1px;"></div>
By: <?php echo $iT['creator']; ?>
<div style="height:1px;"></div>
Type: <?php echo $iT['type']; ?>
<div style="height:1px;"></div>
<a href="/Admin/approve.php?id=<?php echo $iT['id']; ?>"><button>Approve!</button></a>
<a href="/Admin/decline.php?id=<?php echo $iT['id']; ?>"><button>Decline!</button></a>
</div> 
</div>
<? } ?> 

</div>

</div>
</div>
<div class="center">
<a href="/Customize/?page=<?php echo $page-1; ?>"><button>Previous Page</button>
<a href="/Customize/?page=<?php echo $page+1; ?>"><button>Next Page</button>
</div>

<?php }else { header("Location: /Login/"); } ?>
<?php } ?>