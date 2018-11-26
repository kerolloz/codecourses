<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'):
    echo "<pre>";
    $destination = __DIR__ . '/';
    echo $destination;
    $res = move_uploaded_file($_FILES['my_file']['tmp_name'], $destination . $_FILES['my_file']['name']);
    print_r($_FILES['my_file']);

    if($res){
        // uploaded successfully
        echo "uploaded successfully";
        require "tester.php"; // go test the uploaded file

    }else{
        echo "problem moving the file";
    }
    echo "</pre>";
endif;


?>


<form class="" action="<?= $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">

    <input type="file" name="my_file" value="my_file">
    <br>
    <input type="submit" value="Test">
</form>
