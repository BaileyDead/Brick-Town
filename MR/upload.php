<?php
$name = 'Upload';
include "../header.php";
?>

<?php
if ($user) {
?>

<?php
$name = ProfanityFilter($_POST['name']);
$desc = ProfanityFilter($_POST['desc']);
$type = $_POST['type'];
$generatedname = bin2hex(random_bytes(18));
$price = $_POST['price'];

//die($_SERVER["DOCUMENT_ROOT"]."/CDN/ITEM/");
if(isset($_POST["submit"])) {
if($type==''){
header("Location: /Market/");
die();
}elseif($type!='Shirt' && $type!='Pants'){
header("Location: /Market/");
die();
}elseif($type=='0'){
header("Location: /Market/");
die();
}

if($price < -1) {
echo 'price too low';
exit();
}


    $target_dir = $_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $truename = $generatedname.".png";
    $truenamedir = $_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/".$truename;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

     if($imageFileType != "png" ) {
        echo "Sorry, only png files are allowed.";
        exit();
    }

    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
	exit();
    }


    $target_dir = $_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   	// move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $truename);
	$recaptcha = $_POST['g-recaptcha-response'];
	$res = reCaptcha($recaptcha);
	if($res['success']){

       if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $truenamedir)) {
            echo '<div class="alertgreen center"><p>Your item has been uploaded!</p></div>';
        $hi = $conn->prepare("INSERT INTO Market (name, description, price, creator, creationdate, previewimg, renderimg, type, onsale, approved, limited, amount) VALUES (:name, :desc, :price, '$myu->username', $time, :filename, :filename, :type, 1, 0, 0, -1)");
        $hi->bindParam(':name', $name, PDO::PARAM_STR);
        $hi->bindParam(':desc', $desc, PDO::PARAM_STR);
        $hi->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
        $hi->bindParam(':price', $_POST['price'], PDO::PARAM_INT);
        $hi->bindParam(':filename', $truename, PDO::PARAM_STR);
        $hi->execute();
         
        // print_r($hi->errorInfo()); 
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
	}
	}
?>
<div class="columns">
<div class="column">
<div class="card">
<div class="card-content">
<form method="post" enctype="multipart/form-data">
<h3 class="title is-4 mb-1">Upload your item!</h3>

<input type="text" class="input" name="name" id="name" placeholder="Name">
<div style="height:2px;"></div>
<textarea name="desc" class="textarea input" rows="3" placeholder="Description"></textarea>
<div style="height:2px;"></div>
<input type="number" class="input" name="price" id="price" placeholder="Price">
<div style="height:2px;"></div>
<input type="file" class="input" name="fileToUpload" id="fileToUpload">
<div style="height:2px;"></div>
<div class="select">
<select name="type" class="input" placeholder="Type">
<option name="shirt" selected>Shirt</option>
<option name="pants" selected>Pants</option>
</select>
</div>
<div style="height:2px;"></div>
<div class="center">
<div class="g-recaptcha brochure__form__captcha" data-sitekey="6LfYkcMhAAAAALRRnevLdejPlX2ahGc5z0ImImQf"></div>
</div>
<div style="height:2px;"></div>
<input class="button is-link" type="submit" value="Upload!" style="width: 128px;height: 50px;" name="submit">
</form>

</div>
</div>
</div>

<div class="column">
<div class="card">
<div class="card-content">
<p><h3 class="title is-4 mb-1">Templates</h3></p>
<img src="/CDN/ShirtTemplate.png">
<img src="/CDN/PantsTemplate.png">

</div>
</div>
</div>


</div>


<?php
} else {
header('Location: /Register/');
}
?>