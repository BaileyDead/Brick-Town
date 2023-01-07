<?php
$name = 'Dashboard';
include("../header.php");

if(!$user) {
  die("LOL");
}

if(isset($_POST['Test'])){

  // Variables
  $status = $_POST['status'];

  if(!trim($status) == "") {

        $info = $conn->prepare("INSERT INTO Dashboard(title,user, timeago) VALUES (:title,:user, :time)");
        $info->bindParam(":title",$status,PDO::PARAM_STR);
        $info->bindParam(":time",time(),PDO::PARAM_INT);
        $info->bindParam(":user",$myu->id,PDO::PARAM_INT);
        $info->execute();

        $info2 = $conn->prepare("UPDATE Users SET status=:title WHERE id=:user");
        $info2->bindParam(":title",$status,PDO::PARAM_STR);
        $info2->bindParam(":user",$myu->id,PDO::PARAM_INT);
        $info2->execute();

        header("Location: /Dashboard/");
        exit();




    
  } else {
      echo '<div class="notification is-danger">
      You have not successfully filled out all fields. Please try again
    </div>';  
  }
}
?>
<h3 class="title is-4 mb-1"><b><?=htmlspecialchars( $myu->username )?></b></h3>
<div class="columns">
  <div class="column is-one-third">
    <div class="card">
      <div class="card-image">
        <figure class="image is-4by4">
          <img src="/avatar.php?id=<?php echo $myu->id; ?>" alt="Placeholder image">
        </figure>
      </div>
      <br>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <div class="card-content">
        <div class="content">
          <form style="padding: 0px; margin-bottom: 0px;" action="" method="POST">
            <div class="field has-addons">
              <div class="control" style="width: 100%;">
                <input name="status" id="status" class="input" type="text" placeholder="What's on your mind?">
              </div>
              <div class="control">
                <button type="submit" name="Test" style="border-radius: .25rem; border-top-left-radius:0px; border-bottom-left-radius:0px;" class="button is-info">
Post Status
</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <br>
    
<?php
$find = $conn->prepare("SELECT * FROM Dashboard");
$find->execute();

if($find->rowCount() > 0){ 
  ?>
<div class="columns is-multiline">
  <?php
  $find5 = $conn->prepare("SELECT * FROM Dashboard ORDER BY id DESC LIMIT 6");
  $find5->execute();

  $rows = $find5->fetchAll(PDO::FETCH_ASSOC);

  foreach($rows as $row){
    
    $user = $row['user'];
    
    $us = $conn->prepare('SELECT * FROM Users WHERE id = ?');
    $us->bindValue(1, $user, PDO::PARAM_INT);
    $us->execute();

    $my = $us->fetch(PDO::FETCH_OBJ);

?>
      <div class="column is-half">

<div class="card">
  <div class="card-content">
    <div class="media">
      <div class="media-left">
        <figure class="image is-48x48">
          <img src="/avatar.php?id=<?php echo $row['user']; ?>" alt="Placeholder image">
        </figure>
      </div>
      <div class="media-content">
        <p class="title is-5"><a style="color: white;" href="/Users/user.php?id=<?=$user?>"><?=htmlspecialchars($my->username)?></a></p>
        <p class="subtitle is-6"><?=htmlspecialchars($row['title'])?></p>
      </div>
    </div>
  </div>
</div>
        
      </div>
<?php
  }
  ?>
    </div>
  <?php
}
?>
    


  </div>
</div>


<?php
include("../footer.php");
?>
