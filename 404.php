<?php
$name = '404';
include("header.php");
?>

<script>
function goBack() {
window.history.back();
}
</script>


<div class="card">
<div class="card-content">
<div class="has-text-centered">
<h1 class="title is-3 mb-1">Error 404 Not Found!</h1>
<p>We hope that you find what you have been looking for.</p>
<p>
<a href="#" onclick="goBack()"> <button class="button is-link">Go back</button> </a>
<a href="/"> <button class="button is-link">Return to the Main Page!</button> </a>
</p>
</div>
</div>
</div>

<?php
include("footer.php");
?>
