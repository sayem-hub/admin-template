<?php
require '../controller/dbConfig.php';

$project_id = $_GET['project_id'];
$updateQry = "UPDATE projects SET activeStatus=0 WHERE id='{$project_id}'";

$isSubmit = mysqli_query($dbConnect, $updateQry);

if ($isSubmit == true) {
    $message = "Project Deleted Succesfully!";
} else {
    $message = "Delete Failed";
}

header("Location: ../project/projectList.php?msg={$message}");
