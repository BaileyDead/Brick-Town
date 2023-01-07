<?php
 include 'MISC/trueconnect.php';
 include 'MISC/filter.php';
 include 'MISC/functions.php';
 $maintenance=0;
 if($maintenance=="1"){
 header("Location: /Maintenance/");
 }
?>
<?php
$banner = $conn->query("SELECT * FROM Banner");
$bannerfetch = $banner->fetch(PDO::FETCH_OBJ);

if ($myu->Banned == "1"){

header("Location: /Banned/");

}

if ($myu->admin=="true") {
$moderatecheck = $conn->prepare("SELECT * FROM Market WHERE approved=0");
$moderatecheck->execute();
$modcount = $moderatecheck->rowCount();
}

if ($user) {
$messagecheck = $conn->prepare("SELECT * FROM Messages WHERE (msgread,user) = (0, $myu->id)");
$messagecheck->execute();
$msgcheck = $messagecheck->rowCount();
}

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if($name) { ?>
    <title>BrickTown - <?php echo $name;?></title>
    <?php } ?>
    <link rel="stylesheet" href="/MISC/new.css?v=<?=rand(1,999999999)?>">
    
      <script src="/js/warning.js"></script>
    <meta name="description" content="Welcome to BrickTown!">
    <meta name="keywords" content="bricktown,BRICKTown,BrickTown">
    <meta name="author" content="BrickTown">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="/MISC/logo.png" />
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="/js/modals.js?v=<?=rand(1,999999999)?>"></script>
    
    <script src="https://kit.fontawesome.com/f70050f571.js" crossorigin="anonymous"></script>
  </head>
  <body>

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item" href="/">
        <img src="/MISC/logo.png" width="28" height="28">
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">

        <?php
        if ($user) {
        ?>
        <a href="/Dashboard" class="navbar-item">
          Dashboard
        </a>
        <?php } else { ?>
        <a href="/" class="navbar-item">
          Landing
        </a>
        <?php
        }              
        ?>

        <a href="/Users" class="navbar-item">
          Users
        </a>

        <a href="/Forum" class="navbar-item">
          Forum
        </a>

        <a href="/Market/index.php?page=1&type=hat" class="navbar-item">
          Market
        </a>
        <?php if($user) { ?>
        <a href="/Customize" class="navbar-item">
          Customize
        </a>

        <a href="/Messages" class="navbar-item">
          Messages <?php if ($msgcheck) { echo '(!)'; } ?>

        </a>


        <?php } ?>
        <?php if($myu->admin=="true") { ?>
        <a href="/Admin" class="navbar-item">
          Admin <?php if ($modcount) { echo '(!)'; } ?>
        </a>
        <?php } ?>


      </div>

      <div class="navbar-end">

        <?php
        if ($user) {
        ?>
        <a href="#" class="navbar-item">
          <i class="fa-solid fa-cube" style="padding-right: 5px;"></i> <?php echo $myu->cubes; ?>
        </a>
        <a href="/logout.php" class="navbar-item">
          <i class="fa-solid fa-right-from-bracket" style="padding-right: 5px;"></i> Log Out
        </a>
        <?php } else { ?>
        <div class="navbar-item">
          <div class="buttons">
            <a href="/Login/" class="button is-link">
              Log in
            </a>
            <a href="/Register/" class="button is-success">
              <strong>Sign up</strong>
            </a>
          </div>
        </div>
        <?php
        }              
        ?>
      </div>
    </div>


  </div>
</nav>
    
    <script>
    
      document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Add a click event on each of them
  $navbarBurgers.forEach( el => {
    el.addEventListener('click', () => {

      // Get the target from the "data-target" attribute
      const target = el.dataset.target;
      const $target = document.getElementById(target);

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      el.classList.toggle('is-active');
      $target.classList.toggle('is-active');

    });
  });

});
    
    </script>
<div style="margin-top: 2%;" class="container is-max-desktop">

<head>


<div style="color: white; text-align: center;" class="notification is-success">
  <b><?php echo htmlspecialchars("$bannerfetch->text"); ?></b>
</div>
