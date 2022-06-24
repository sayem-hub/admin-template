<?php
require '../controller/dbConfig.php';

$banner_id = $_GET['banner_id'];
$updateQry = "UPDATE banners SET activeStatus=0 WHERE id='{$banner_id}'";

$isSubmit = mysqli_query($dbConnect, $updateQry);

if ($isSubmit == true) {
    $message = "Banner Deleted Succesfully!";
} else {
    $message = "Delete Failed";
}

header("Location: ../banner/bannerList.php?msg={$message}");
