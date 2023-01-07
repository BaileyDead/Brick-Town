<?php
$name = 'Register';
include("../header.php");
?>
<?php
include("../api/rapi.php");
?>

<?php
if (!$user) {
?>


<body>
<div class="card">
<div class="card-content has-text-centered">

  <form method="post">
    <p>Sign up to BrickTown!</p>
    <input type="email" name="email" class="input" placeholder="Email" />
    <div style="height:2px;"></div>
    <input type="text" name="username" class="input" placeholder="Username" />
    <div style="height:2px;"></div>
    <input type="password" name="password" class="input" placeholder="Password" />
    <div style="height:2px;"></div>
    <input type="password" name="confirmpassword" class="input" placeholder="Confirm Password" />
    <div style="height:2px;"></div>
    <div align="center" class="g-recaptcha brochure__form__captcha" style="margin:auto;" data-sitekey="6LfYkcMhAAAAALRRnevLdejPlX2ahGc5z0ImImQf"></div>
    <div style="height:2px;"></div>
    <input type="submit" name="submit" class="button is-link" value="Sign up!">  
  </form>

</div>
</div>
</body>

<? } ?>

<?php
include("../footer.php");
?>
