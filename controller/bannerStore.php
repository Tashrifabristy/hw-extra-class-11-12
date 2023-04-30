<?php
session_start();
require "../inc/env.php";
$title=$_REQUEST['title'];
$description=$_REQUEST['description'];
$cta=$_REQUEST['cta'];
$cta_url=$_REQUEST['cta_url'];
$video_url=$_REQUEST['video_url'];
$banner_img=$_FILES['bannerImage'];
$errors=[];
$extension = pathinfo($banner_img['name'], PATHINFO_EXTENSION);
$acceptedType=['jpg','png','webp'];
if ($banner_img['size'] == 0){
    $errors['banner_img_error'] = "please Enter a Image";
} else if($banner_img['size']>5000000){
    $errors['banner_img_error'] = "please Enter a Image bellow 100000 byte Image";
} else if(!in_array($extension, $acceptedType)){
    $errors['banner_img_error'] = "please Enter a Image that has a extension of jpg,png ,webp";
}
if(count($errors)>0){
    $_SESSION['errors']= $errors;
    header("Location:../backend/banner.php");
}else{
    //unique name
    $newName="Banner"."-".uniqid().".".$extension;
    $path="../uplodes";
    if(!file_exists($path)){
        mkdir($path);

    }
    //uplode
    $uplodedFile=move_uploaded_file($banner_img['tmp_name'],"../uplodes/$newName");

    if ($uplodedFile) {
        $query="INSERT INTO banners(title, detail, cta, cta_url, video_url, banner_img) VALUES ('$title','$description','$cta','$cta_url','$video_url','$newName')";
        $response=mysqli_query($conn,$query);
        header("Location:../backend/Allbanner.php");
    }
}


?>