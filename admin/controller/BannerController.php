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

    if (empty($title) || empty($subTitle) || empty($details) || empty($random_file_name) ) {
        $message = "All fields are required";
    } else {
        $insertQry = "INSERT INTO banners (title, subTitle, details, image) VALUES ('{$title}', '{$subTitle}', '{$details}', '$random_file_name')";
        $isSubmit = mysqli_query($dbConnect, $insertQry);

        if ($isSubmit == true) {
            $message = "Banner Inserted!";
        } else {
            $message = "Insertion Failed!";
        }
    }

    header("Location: ../bannerCreate.php?msg={$message}");

}

// THIS CODE IS FOR UPDATE BANNER WITH PREVIEW
if (isset($_POST['updateBanner'])) {

        
        // GETTING THE IMAGE NAME
        $banner_id = $_POST['banner_id'];
        $getSingleDataQry = "SELECT * FROM banners WHERE id={$banner_id}";
        $getResult = mysqli_query($dbConnect, $getSingleDataQry);
        
        $oldImg = '';
        foreach ($getResult as $key => $banner) {
            $oldImg = $banner['image'];
        }
        // END OF GETTING THE IMAGE NAME


        $upload_status = false;
        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

            $imgArray = $_FILES['image'];
            $file_name = $imgArray['name'];
            $tmp_file_name = $imgArray['tmp_name'];

            $nameExtArr = explode('.', $file_name);
            $file_extension = strtolower(end($nameExtArr));
            $valid_extensions = array('jpg', 'png', 'jpeg');

            $random_file_name = time().'.'.$file_extension;

            if ($random_file_name != $oldImg) { //WHEN NEW IMAGE NAME DOES NOT MATCH WITH OLD IMAGE
                
                // FILE REMOVE
                $file = '../uploads/bannerImage/'.$oldImg;
                if (file_exists($file)) {
                    unlink($file);
                }
                // END FILE REMOVE

                // NEW FILE UPLOAD
                if (in_array($file_extension, $valid_extensions)) {
                    move_uploaded_file($tmp_file_name, '../uploads/bannerImage/'.$random_file_name);
                    $upload_status = true;
                } else {
                    $message = $file_extension." is not Supported";
                }

            }
        } else {
            $random_file_name = $oldImg;
        }

        $banner_id = $_POST['banner_id'];
        $title = $_POST['title'];
        $subTitle = $_POST['subTitle'];
        $details = $_POST['details'];

        // die($random_file_name);

        if (empty($title) || empty($subTitle) || empty($details)) {
                $message = "All fields are required";
            } else {
                $updateQry = "UPDATE banners SET title='{$title}', subTitle='{$subTitle}', details='{$details}', image='{$random_file_name}' WHERE id='{$banner_id}'";

                $isSubmit = mysqli_query($dbConnect, $updateQry);

                if ($isSubmit == true) {
                    $message = "Banner Update Succesfull";
                } else {
                    $message = "Update Failed";
                }
            }

        header("Location: ../bannerUpdate.php?banner_id={$banner_id}&msg={$message}");

}