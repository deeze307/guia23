<?php

if(!empty($_FILES)){
    $upload_dir = "../../media/uploaded/".$_SESSION['user_id']."/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $fileName = $_FILES['file']['name'];

    $uploaded_file = $upload_dir.$fileName;
    if(move_uploaded_file($_FILES['file']['tmp_name'],$uploaded_file)){
        if(isset($_SESSION["images"]))
        {
            Logger::write("test_files","[".date('d-m-Y h:i:s')."] ".$_FILES['file']['name']);
            Logger::write("advertsings_images","[".date('d-m-Y h:i:s')."] Imagenes importadas de usuario con id = ".$_SESSION['user_id']." |files : ".$fileName);
            $_SESSION["images"] = $_SESSION["images"].",".$_SESSION['user_id']."/".$fileName;
        }
        else
        {
            $_SESSION["images"] = $_SESSION['user_id']."/".$fileName;
        }
    }
}