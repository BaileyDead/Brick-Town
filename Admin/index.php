<?php
$name = 'Admin';
include("../header.php");
?>

<?php
if ($myu->admin=="true") {
if ($user) {
?>
<div class="card">
<div class="center">
<h1>Welcome to the admin panel</h1>
<div style="height:12px"></div>
<a href="/Admin/moderate.php"><button>Moderate</button></a>
<a href="/Admin/gift.php"><button>Gift Items</button></a>
<a href="/Admin/upload.php"><button>Upload</button></a>
</div>
</div>
<?php }else { header("Location: /Login/"); } ?>
<?php } ?>