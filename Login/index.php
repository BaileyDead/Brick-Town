<?php
$name = 'Login';
include("../header.php");
?>
<?php
include("../api/lapi.php");
?>
<?php
if (!$user) {
?>

<body>
<div class="card">
<div class="card-content has-text-centered">

  <form method="post">
    <p>Login to your account!</p>
    <input type="text" name="username" class="input" placeholder="Username" />
    <div style="height:2px;"></div>
    <input type="password" name="password" class="input" placeholder="Password" />
    <div style="height:2px;"></div>
    <div class="has-text-centered">
    <div align="center" class="g-recaptcha brochure__form__captcha" style="margin:0 auto;" data-sitekey="6LfYkcMhAAAAALRRnevLdejPlX2ahGc5z0ImImQf"></div>
    </div>
    <div style="height:2px;"></div>
    <input type="submit" name="submit" class="button is-link" value="Login">  
  </form>
</div>
</div>
</body>

<? } ?>

<?php
include("../footer.php");
?>
