<?php
$name='Games';
include("../header.php");
?>

<?php
if (isset($_GET["page"])) {
  $page = $_GET['page'];
  if (!is_numeric($page)) {
    header("Location: /Games/");
  }
  if ($page <= 0) {
    $page = 1;
  }
} else {
  $page = 1;  
}
  $limit = 8;
  $offset = ($page - 1) * $limit;
  $statement = $conn->prepare("SELECT * FROM Games ORDER BY id DESC LIMIT :limit OFFSET :offset");
  $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
  $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
  $statement->execute();
  $games = $statement->fetchAll();
  if(!$games) {
  header('location: /Games/');
  exit();
}
?>

<div class="columns">
<?php
foreach($games as $gT) {
?>
    <div class="column is-one-quarter">
    <div class="card">
      <div class="card-image">
        <figure class="image is-4by4" style="padding:10px;">
           
          <img src="/CDN/ITEMS/awaiting.png" alt="Placeholder image">
                  </figure>
      </div>
      <div class="card-content">
        <div class="media">
          <div class="media-left">
            
          </div>
          <div class="media-content">
            <p class="title is-6"><?php echo htmlspecialchars($gT['name']); ?></p>
            <p class="subtitle is-6">By: <?php echo htmlspecialchars($gT['creator']); ?></p>
          </div>
        </div>
      </div>
    </div>
<?php
}
?>
  </div>
    
    
    
  </div>