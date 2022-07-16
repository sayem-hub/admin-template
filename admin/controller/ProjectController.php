<?php

require 'dbConfig.php';

// THIS IS CODE FOR CREATE BANNER
if (isset($_POST['saveProject'])) {

         $upload_status = false;
        if (isset($_FILES['projectImage'])) {
            $imgArray = $_FILES['projectImage'];
            $file_name = $imgArray['name'];
            $tmp_file_name = $imgArray['tmp_name'];

            $nameExtArr = explode('.', $file_name);
            $file_extension = strtolower(end($nameExtArr));
            $valid_extensions = array('jpg', 'png', 'jpeg');

            $random_file_name = time() . '.' . $file_extension;

            if (in_array($file_extension, $valid_extensions)) {
                move_uploaded_file($tmp_file_name, '../uploads/projectImage/' . $random_file_name);
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
                    move_uploaded_file($tmp_file_name, '../uploads/projectImage/' . $random_file_name);
                    $upload_status = true;
                } else {
                    $message = $file_extension . " is not Supported";
                    }
                } else {
                    $message = "File Not Found";
                }
                $category_id = $_POST['category_id'];
                $projectName = $_POST['projectName'];
                $projectLink = $_POST['projectLink'];

                if (empty($projectName) || empty($projectLink) || empty($random_file_name) ) {
                    $message = "All fields are required";
                } else {
                    $insertQry = "INSERT INTO ourprojects (category_id, projectName, projectLink,  project_image) VALUES ('{$category_id}','{$projectName}', '{$projectLink}', '$random_file_name')";
                    $isSubmit = mysqli_query($dbConnect, $insertQry);

                    if ($isSubmit == true) {
                        $message = "Project Inserted!";
                    } else {
                        $message = "Insertion Failed!";
                }
            }

            header("Location: ../projectCreate.php?msg={$message}");

        }

            // THIS IS CODE FOR UPDATE BANNER
            if (isset($_POST['updateProject'])) {
                $project_id = $_POST['project_id'];
                $category_id = $_POST['category_id'];
                $projectName = $_POST['projectName'];
                $projectLink = $_POST['projectLink'];


              if (empty($projectName) || empty($projectLink) )  {
                    $message = "All fields are required";
                } else {
                    $updateQry = "UPDATE ourprojects SET category_id='{$category_id}', projectName='{$projectName}',  projectLink='{$projectLink}' WHERE id='{$project_id}'";

                    $isSubmit = mysqli_query($dbConnect, $updateQry);

                    if ($isSubmit == true) {
                        $message = "Project Updated Succesfully";
                    } else {
                        $message = "Update Failed";
                    }
                
                }

                header("Location: ../projectUpdate.php?project_id={$project_id}&msg={$message}");

            }
        