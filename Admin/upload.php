<?php
$name = 'Upload';
include "../header.php";
?>

<?php
if ($myu->admin=="true") {
    function setNotif(string $itemName, string $descr){
        //https://discord.com/api/webhooks/1027683098978160824/gUEsCCpFY1IenRhXtPyntU29bvgmnQzmjtVyYsUGHhwlb68qzhxSnF8mi8tZ7V2r8c3t
        $message = "@everyone New Item! \n**".$itemName."**\n".$descr;
        $webhook= 'https://discord.com/api/webhooks/1027683098978160824/gUEsCCpFY1IenRhXtPyntU29bvgmnQzmjtVyYsUGHhwlb68qzhxSnF8mi8tZ7V2r8c3t'; //example https://discord.com/api/webhooks/818892216943509504/iaF6RJ2SA1eH4dyWq4iMWNNigAHCzzLGK6e_DBOzPCkh0C6-R0UQ8TWjW87vi51K30Ei

        $data = array('content' => $message);
        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
                )
        );

        file_get_contents($webhook, false, stream_context_create($options));
    }
?>

<?php
$name = ProfanityFilter($_POST['name']);
$desc = ProfanityFilter($_POST['desc']);
$type = $_POST['type'];
$generatedname = bin2hex(random_bytes(18));

// die($truename);
if(isset($_POST["submit"])) {
if($type==''){
header("Location: /Market/");
die();
}elseif($type!='Hat' && $type!='Accessory' && $type!='Tool' && $type!='Hair' && $type!='Mask' && $type!='Face'){
header("Location: /Market/");
die();
}elseif($type=='0'){
header("Location: /Market/");
die();
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

    if ($_FILES["fileToUpload"]["size"] > 22500) {
        echo "Sorry, your file is too large.";
	exit();
    }


    $target_dir = $_SERVER["DOCUMENT_ROOT"]."/CDN/ITEMS/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   	// move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $truename);
       if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $truenamedir)) {
        $hi = $conn->prepare("INSERT INTO Market (name, description, price, creator, creationdate, previewimg, renderimg, type, onsale, approved, limited, amount) VALUES (:name, :desc, :price, '$myu->username', $time, :filename, :filename, :type, :sale, 0, :limited, :amount)");
        $hi->bindParam(':name', $name, PDO::PARAM_STR);
        $hi->bindParam(':desc', $desc, PDO::PARAM_STR);
        $hi->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
        $hi->bindParam(':price', $_POST['price'], PDO::PARAM_INT);
        $hi->bindParam(':sale', $_POST['offsale'], PDO::PARAM_INT);
        $hi->bindParam(':amount', $_POST['amount'], PDO::PARAM_INT);
        $hi->bindParam(':limited', $_POST['limited'], PDO::PARAM_INT);
        $hi->bindParam(':filename', $truename, PDO::PARAM_STR);
        $hi->execute();
        
          $id = $conn->lastInsertId();
          $url = "https://discord.com/api/webhooks/1031242787053654146/vF4ut_1NoI-bW_bjCcN7bAEZfEDq4sqSS_i3tqmJI6Qn0LAON0-ThhtVCafxv-se4VK6";
          $headers = [ 'Content-Type: application/json; charset=utf-8' ];
          $POST = [ 'username' => 'Item Notifier', 'content' => '@here New Item: https://brick-town.ga/Market/item.php?id='.$id ];

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
          $response   = curl_exec($ch);
         
        print_r($hi->errorInfo()); 
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
     }
?>
<div class="card center">

<form method="post" enctype="multipart/form-data">
<h1>Upload your item!</h1>
<input type="text" class="center" name="name" id="name" placeholder="Name">
<div style="height:2px;"></div>
<textarea name="desc" class="center" rows="3" placeholder="Description"></textarea>
<div style="height:2px;"></div>
<input type="number" class="center" name="price" id="price" placeholder="Price">
<div style="height:2px;"></div>
<input type="number" class="center" name="offsale" id="offsale" placeholder="Sale type" value="1">
<div style="height:2px;"></div>
<input type="number" class="center" name="limited" id="limited" placeholder="Limited">
<div style="height:2px;"></div>
<input type="number" class="center" name="amount" id="amount" placeholder="Amount" value="-1">
<div style="height:2px;"></div>
<div style="height:2px;"></div>
<input type="file" class="center" name="fileToUpload" id="fileToUpload">
<div style="height:2px;"></div>
<select name="type" class="center">
<option name="hat" selected>Hat</option>
<option name="accessory" selected>Accessory</option>
<option name="tool" selected>Tool</option>
<option name="hair" selected>Hair</option>
<option name="mask" selected>Mask</option>
<option name="face" selected>Face</option>
</select>
<div style="height:2px;"></div>
<div style="height:2px;"></div>
<input class="formbutton center" type="submit" value="Upload!" style="width: 128px;height: 50px;" name="submit">
</form>

</div>


<?php
} else {
header('Location: /Register/');
}
?>