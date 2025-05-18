<?php
if(isset($_POST['tamilsubmit'])){



    // if (!isset($_COOKIE['user'])) {
    //     header('Location: /');
    //     exit();
    // }
    // SESSION_START();

    include('DbConnectivity.php');



    $result = true;

    $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . "/Public/Notice/";

    $file = $_FILES["tamnotice"]["name"];
    $imageFileType = strtolower(pathinfo($_FILES["tamnotice"]["name"], PATHINFO_EXTENSION));
    $targetFile = $targetDirectory . "tamilNotice" . "." . $imageFileType;
    if (move_uploaded_file($_FILES["tamnotice"]["tmp_name"], $targetFile)) {
            // echo "The file has been uploaded successfully as: " . basename($targetFile);

            $query = "UPDATE notice set tamil = '$targetFile' where ID = 2025";
            $res = mysqli_query($db, $query);

            $result = $res;
        } else {
            // deleteDirectory($targetDirectory);
            $_SESSION['message'] = "Failed to upload Image. Try again later!";
            $_SESSION['status'] = false;
            $_SESSION['fromAction'] = true;
            mysqli_close($db);
            echo json_encode([
            'status' => false,
            'message' => 'Failed to upload Image. Try again later!'
        ]);
            exit();
         
            return;
        }

    

    if($result){
        mysqli_close($db);
        $_SESSION['message'] = "Beneficiary Created successfully!";
        $_SESSION['status'] = true;
        $_SESSION['fromAction'] = true;
        echo json_encode([
            'status' => true,
            'message' => 'Notice Updated successfully!'
        ]);
        exit();
        // header('Location: /beneficent');

    }else {
        // mysqli_rollback($db);
        mysqli_close($db);
        $_SESSION['message'] = "Unable to create. Try Again Later!";
        $_SESSION['status'] = false;
        $_SESSION['fromAction'] = true;
        echo json_encode([
            'status' => false,
            'message' => 'Unable to update. Try Again Later!'
        ]);
        exit();
       
    }

}else if(isset($_POST['englishsubmit'])){



    // if (!isset($_COOKIE['user'])) {
    //     header('Location: /');
    //     exit();
    // }
    // SESSION_START();

    include('DbConnectivity.php');



    $result = true;

    $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . "/Public/Notice/";

    $file = $_FILES["engnotice"]["name"];
    $imageFileType = strtolower(pathinfo($_FILES["engnotice"]["name"], PATHINFO_EXTENSION));
    $targetFile = $targetDirectory . "englishNotice" . "." . $imageFileType;
    if (move_uploaded_file($_FILES["engnotice"]["tmp_name"], $targetFile)) {
            // echo "The file has been uploaded successfully as: " . basename($targetFile);

            $query = "UPDATE notice set eng = '$targetFile' where ID = 2025";
            $res = mysqli_query($db, $query);

            $result = $res;
        } else {
            // deleteDirectory($targetDirectory);
            $_SESSION['message'] = "Failed to upload Image. Try again later!";
            $_SESSION['status'] = false;
            $_SESSION['fromAction'] = true;
            mysqli_close($db);
            echo json_encode([
            'status' => false,
            'message' => 'Failed to upload Image. Try again later!'
        ]);
            exit();
         
            return;
        }

    

    if($result){
        mysqli_close($db);
        $_SESSION['message'] = "Beneficiary Created successfully!";
        $_SESSION['status'] = true;
        $_SESSION['fromAction'] = true;
        echo json_encode([
            'status' => true,
            'message' => 'Notice Updated successfully!'
        ]);
        exit();
        // header('Location: /beneficent');

    }else {
        // mysqli_rollback($db);
        mysqli_close($db);
        $_SESSION['message'] = "Unable to create. Try Again Later!";
        $_SESSION['status'] = false;
        $_SESSION['fromAction'] = true;
        echo json_encode([
            'status' => false,
            'message' => 'Unable to update. Try Again Later!'
        ]);
        exit();
       
    }

}
?>