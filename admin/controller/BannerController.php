<?php

require 'dbConfig.php';

// THIS IS CODE FOR CREATE BANNER
if (isset($_POST['saveBanner'])) {

    $upload_status = false;
    if (isset($_FILES['image'])) {
        $imgArray = $_FILES['image'];
        $file_name = $imgArray['name'];
        $tmp_file_name = $imgArray['tmp_name'];

        $nameExtArr = explode('.', $file_name);
        $file_extension = strtolower(end($nameExtArr));
        $valid_extensions = array('jpg', 'png', 'jpeg');

        $random_file_name = time() . '.' . $file_extension;

        if (in_array($file_extension, $valid_extensions)) {
            move_uploaded_file($tmp_file_name, '../uploads/bannerImage/' . $random_file_name);
            $upload_status = true;
        } else {
            $message = $file_extension . " is not Supported";
        }
    } else {
        $message = "File Not Found";
    }

    $title = $_POST['title'];
    $subTitle = $_POST['subTitle'];
    $details = $_POST['details'];

    if (empty($title) || empty($subTitle) || empty($details) ) {
        $message = "All fields are required";
    } else {
        $insertQry = "INSERT INTO banners (title, subTitle, details) VALUES ('{$title}', '{$subTitle}', '{$details}')";
        $isSubmit = mysqli_query($dbConnect, $insertQry);

        if ($isSubmit == true) {
            $message = "Banner Inserted!";
        } else {
            $message = "Insertion Failed!";
        }
    }

    header("Location: ../banner/bannerCreate.php?msg={$message}");

}

// THIS IS CODE FOR UPDATE BANNER
if (isset($_POST['updateBanner'])) {

    $banner_id = $_POST['banner_id'];
    $title = $_POST['title'];
    $subTitle = $_POST['subTitle'];
    $details = $_POST['details'];

    if (empty($title) || empty($subTitle) || empty($details)) {
        $message = "All fields are required";
    } else {
        $updateQry = "UPDATE banners SET title='{$title}', subTitle='{$subTitle}', details='{$details}' WHERE id='{$banner_id}'";

        $isSubmit = mysqli_query($dbConnect, $updateQry);

        if ($isSubmit == true) {
            $message = "Banner Updated Succesfully";
        } else {
            $message = "Update Failed";
        }
    }

    header("Location: ../banner/bannerUpdate.php?banner_id={$banner_id}&msg={$message}");

}


