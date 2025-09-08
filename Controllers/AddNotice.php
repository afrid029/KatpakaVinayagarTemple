<?php

 if (!isset($_COOKIE['user'])) {
    header('Location: /');
    echo "<script>window.location.pathname = '/'</script>";
    exit();
}

if(isset($_POST['tamilsubmit'])){

    include('DbConnectivity.php');
    $result = true;
    $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . "/Public/Notice/";

    $timestamp = time();
    $imageFileType = strtolower(pathinfo($_FILES["tamnotice"]["name"], PATHINFO_EXTENSION));
    $targetFile = $targetDirectory . $timestamp ."tam" . ".jpg";

     $fileTmp = $_FILES["tamnotice"]["tmp_name"];
   
        switch ($imageFileType) {
        case 'jpeg':
        case 'jpg':
            $image = imagecreatefromjpeg($fileTmp);
            break;
        case 'png':
            $image = imagecreatefrompng($fileTmp);
            break;
        case 'gif':
            $image = imagecreatefromgif($fileTmp);
            break;
        default:
            die("Unsupported file type.");
    }

    // Save compressed image (quality 70 out of 100)
    imagejpeg($image, $targetFile, 70);

    imagedestroy($image);

     $query = "INSERT INTO notices (title, lang, image) VALUES ('{$_POST['noticeTitle']}', '{$_POST['lang']}', '$targetFile')";
     $result = mysqli_query($db, $query);
    
        if($result){
        mysqli_close($db);
        // $_SESSION['message'] = "Beneficiary Created successfully!";
        // $_SESSION['status'] = true;
        // $_SESSION['fromAction'] = true;
        echo json_encode([
            'status' => true,
            'message' => 'Notice Updated successfully!'
        ]);
        exit();
        // header('Location: /beneficent');

    }else {
        // mysqli_rollback($db);
        mysqli_close($db);
        // $_SESSION['message'] = "Unable to create. Try Again Later!";
        // $_SESSION['status'] = false;
        // $_SESSION['fromAction'] = true;
        echo json_encode([
            'status' => false,
            'message' => 'Unable to update. Try Again Later!'
        ]);
        exit();
       
    }

}else if(isset($_POST['englishsubmit'])){

    include('DbConnectivity.php');

    $result = true;

    $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . "/Public/Notice/";
    $timestamp = time();
    $imageFileType = strtolower(pathinfo($_FILES["engnotice"]["name"], PATHINFO_EXTENSION));
    $targetFile = $targetDirectory .$timestamp. "eng" . ".jpg";

    $fileTmp = $_FILES["engnotice"]["tmp_name"];

        switch ($imageFileType) {
        case 'jpeg':
        case 'jpg':
            $image = imagecreatefromjpeg($fileTmp);
            break;
        case 'png':
            $image = imagecreatefrompng($fileTmp);
            break;
        case 'gif':
            $image = imagecreatefromgif($fileTmp);
            break;
        default:
            die("Unsupported file type.");
    }

    // Save compressed image (quality 70 out of 100)
    imagejpeg($image, $targetFile, 70);

    imagedestroy($image);

     $query = "INSERT INTO notices (title, lang, image) VALUES ('{$_POST['noticeTitle']}', '{$_POST['lang']}', '$targetFile')";
     $result = mysqli_query($db, $query);

    if($result){
        mysqli_close($db);
        // $_SESSION['message'] = "Beneficiary Created successfully!";
        // $_SESSION['status'] = true;
        // $_SESSION['fromAction'] = true;
        echo json_encode([
            'status' => true,
            'message' => 'Notice Updated successfully!'
        ]);
        exit();
        // header('Location: /beneficent');

    }else {
        // mysqli_rollback($db);
        mysqli_close($db);
        // $_SESSION['message'] = "Unable to create. Try Again Later!";
        // $_SESSION['status'] = false;
        // $_SESSION['fromAction'] = true;
        echo json_encode([
            'status' => false,
            'message' => 'Unable to update. Try Again Later!'
        ]);
        exit();
       
    }

} else if(isset($_POST['del-submit'])) {
    include('DbConnectivity.php');

    $ID = $_POST['ID'];

    mysqli_begin_transaction($db);

    $query = "SELECT * FROM notices WHERE ID = '$ID'";
    $fetchedata = mysqli_query($db, $query);

    $query = "DELETE from notices WHERE ID = '$ID'";
    $result = mysqli_query($db, $query);

    if($result) {
        mysqli_commit($db);
        while($row = mysqli_fetch_assoc($fetchedata)) {
            if(file_exists($row['image'])){
                unlink($row['image']);
            }
        }

        mysqli_close($db);
         echo json_encode([
            'status' => true,
            'message' => 'Notice Deleted!'
        ]);
        exit();

    } else {
        mysqli_rollback($db);
        mysqli_close($db);
         echo json_encode([
            'status' => false,
            'message' => 'Unable to delete Notice!'
        ]);
        exit();
    }
}
?>