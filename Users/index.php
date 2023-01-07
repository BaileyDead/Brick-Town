<?php
$name = 'Users';
include("../header.php");
?>

<?php
if (isset($_GET["page"])) {
  $page = $_GET['page'];
  if (!is_numeric($page)) {
    header("Location: /Users/");
  }
  if ($page <= 0) {
    $page = 1;
  }
} else {
  $page = 1;  
}
  $limit = 4;
  $offset = ($page - 1) * $limit;
  $statement = $conn->prepare("SELECT * FROM Users ORDER BY id ASC LIMIT :limit OFFSET :offset");
  $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
  $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
  $statement->execute();
  $users = $statement->fetchAll();
  if(!$users) {
  header('location: /Users/');
  exit();
  }


?>
<div class="columns is-multiline">
<?php
foreach($users as $iT){ ?>
  <div class="column is-half">
    <div class="card mb-2">
      <div class="card-content">
        <div class="media">
          <div class="media-left">
            <figure class="image is-64x64">
              <img src="/avatar.php?id=<?php echo $iT['id']; ?>" alt="Placeholder image">
            </figure>
          </div>
          <div class="media-content">
            <a href="/profile/<?php echo $iT['id']; ?>"><p class="title is-4"><?=htmlspecialchars($iT['username'])?></p></a>
            <p class="subtitle is-6"><i class="fa-solid fa-quote-left"></i> <?=htmlspecialchars($iT['status'])?> <i class="fa-solid fa-quote-right"></i></p>
          </div>
        </div>
      </div>
    </div>  
  </div>


<?php } ?>    
</div>

<nav class="pagination is-centered" role="navigation" aria-label="pagination">
  <a href="/Users/?page=<?php echo $page-1; ?>" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Previous</a>
  
    <a href="/Users/?page=<?php echo $page+1; ?>" class="pagination-previous is-current" style="
    background-color: #1E1E1E;
    border: 0px solid;
    border-radius: 5px;
    color: white;
">Next Page</a>
</nav>

<?php
include("../footer.php");
?>
