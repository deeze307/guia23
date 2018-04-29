<?php

if(!empty($_FILES)){
    $upload_dir = "../../media/uploaded/".$_SESSION['user_id']."/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $fileName = $_FILES['file']['name'];

    $uploaded_file = $upload_dir.$fileName;
    if(move_uploaded_file($_FILES['file']['tmp_name'],$uploaded_file)){
        if(isset($_COOKIE["images"]))
        {
            setcookie("images",$_COOKIE["images"].",".$_SESSION['user_id']."/".$fileName,time() + 3600,"/");;
        }
        else
        {
            setcookie("images",$_SESSION['user_id']."/".$fileName,time() + 3600,"/");
        }
    }
}