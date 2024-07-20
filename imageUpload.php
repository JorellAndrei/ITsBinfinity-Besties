<?php  
  
session_start();  
require('./assets/PHP/Database/config.php');  
  
if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['title'])){  
  
    $name = $_FILES['image']['name'];  
    list($txt, $ext) = explode(".", $name);  
    $image_name = time().".".$ext;  
    $tmp = $_FILES['image']['tmp_name'];  
  
    if(move_uploaded_file($tmp, 'uploads/'.$image_name)){  
  
        $sql = "INSERT INTO image_gallery (title, image) VALUES ('".$_POST['title']."', '".$image_name."')";  
        $link->query($sql);  
  
        $_SESSION['success'] = 'Uploading of image is successfully.';  
        header("Location: features.php");  
    }else{  
        $_SESSION['error'] = 'Uploading of image is failed';  
        header("Location: features.php");  
    }  
}else{  
    $_SESSION['error'] = 'Please Select Image or Write title';  
    header("Location: features.php");  
}  
  
