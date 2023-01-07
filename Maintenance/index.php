<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brick-Town</title>
    <link rel="stylesheet" href="style.css?v=<?=rand(1,99999999)?>">
  </head>
  <body>

<nav class="navbar" role="navigation" aria-label="main navigation">
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
      <a class="navbar-item">
        Landing
      </a>

      <a class="navbar-item">
        Users
      </a>

      <a class="navbar-item">
        Forum
      </a>
      
      <a class="navbar-item">
        Market
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-link">
            Log in
          </a>
          <a class="button is-success">
            <strong>Sign up</strong>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<div style="margin-top: 2%;" class="container is-max-desktop">

  <div class="columns">
    <div class="column is-one-third"><img src="avatar.png" style="width: 100%;"></div>
    <div class="column">
      <br>
      
<?php
if (isset($_POST['pass'])) {
    $pass = ($_POST['pass']);
    $password = "FuckingIdioticDawgLikelyPayedStaffToGetTheKeySoHeresTheNewONEjsbdfkisjwbedfjfkdejnhbrgfhjdkiwjenhbrfghjdkiswjehngfjdikswjehrfgbfjdsiwjhebfjdiew";
    if ($pass != $password) {
        echo "wrong password";
    } else {
        $code = "somepass";
        setcookie("maintenance222", $code, time() + (3600 * 24), "/");
        header("Location: /");
    }   
}
?>

      
      <div class="card">
        <div class="card-content">
            
            <div class="content">
              <form style="padding: 0px; margin-bottom: 0px;" action="" method="POST">
              <div class="field has-addons">
                <div class="control" style="width: 100%;">
                  <input name="pass" id="pass" class="input" type="password" placeholder="Enter the developer key">
                </div>
                <div class="control">
                  <button  type="submit" style="border-radius: .25rem; border-top-left-radius:0px; border-bottom-left-radius:0px;" class="button is-info">
Enter Key
</button>
                </div>
              </div>
              </form>
          </div>
        </div>
      </div>

    </div>
  </div>