<?php
if(!empty($_FILES)){
    $adv_controller = new AdvertsingsController();
    $category = $adv_controller->getCategoryName($_COOKIE["CATEGORIA"]);
    $upload_dir = "../../images/".$category->name."/".$_SESSION['user_id']."/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $fileName = $_FILES['file']['name'];

    $uploaded_file = $upload_dir.$fileName;
    if(move_uploaded_file($_FILES['file']['tmp_name'],$uploaded_file)){
        if(isset($_SESSION["images"]))
        {
            Logger::write("test_files","[".date('d-m-Y h:i:s')."] ".$_FILES['file']['name']);
            $_SESSION["images"] = $_SESSION["images"].",".$category->name."/".$_SESSION['user_id']."/".$fileName;
            Logger::write("advertsings_images","[".date('d-m-Y h:i:s')."] Imagenes importadas de usuario con id = ".$_SESSION['user_id']." | Categoria : ".$category->name." | files : ".$_SESSION["images"]);
        }
        else
        {
            $_SESSION["images"] = $category->name."/".$_SESSION['user_id']."/".$fileName;
        }
    }

    if(isset($_SESSION["images"]))
    {
    Logger::write("debug","[".date('d-m-Y h:i:s')."] imagenes importadas: ".$_SESSION["images"]);
    }

}