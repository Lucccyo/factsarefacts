<?php

if(isset($_POST['btnS']))
{
    // echo 'ok';
    // extract($_POST);
    $image = $_FILES['img']['name'];
    $upload = "imagePost/".$image;
    move_uploaded_file($_FILES['img']['tmp_name'], $upload);
}

?>