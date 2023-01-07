<?php
if (isset($_POST['pass'])) {
    $pass = ($_POST['pass']);
    $password = "BobTheBuilderCanUseeMeDADDY";
    if ($pass != $password) {
        echo "wrong password";
    } else {
        $code = "somepass";
        setcookie("maintenance", $code, time() + (3600 * 24), "/");
        header("Location: /");
    }   
}
?>

<form action="" method="POST">
    <input name="pass" type="password" id="pass" placeholder="key">
    <button type="submit">Submit</button>
</form>