<?php
$name = 'Landing';
include("header.php");
?>
<?php
if (!$user){
?>
<div class="card has-text-centered">

<div class="card-content">
<h1 class="title is-3 mb-1">Welcome to BrickTown!</h1>
<p>Let your creativity go wild!</p>
<br>
<p>
<a href="/Register/" class="button is-link">Register</a>
<a href="/Login/" class="button is-link">Login</a>
</p>
</div>
</div>
<?php
include("footer.php");
?>

<?php
}else{
header("Location: /Dashboard/");
}
?>


